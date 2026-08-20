#!/usr/bin/env python3
"""Deploy Mouchap to mouchap.a2spr.com (VPS A2S — same stack as EvoPro / YallahGo / BatiXpert)."""
import os
import sys
import tarfile
import tempfile
import time
from pathlib import Path

import paramiko

sys.stdout.reconfigure(encoding="utf-8", errors="replace")

HOST = "51.255.162.99"
USER = "ubuntu"
PW = os.environ.get("VPS_SSH_PASSWORD")
if not PW:
    raise SystemExit("Set VPS_SSH_PASSWORD before running deploy (same as YallahGo / EvoPro).")
FQDN = "mouchap.a2spr.com"
SLUG = "mouchap"
ROOT = f"/var/www/{FQDN}"
APP = ROOT
LOCAL = Path(__file__).resolve().parent

EXCLUDE_DIRS = {
    ".git",
    "node_modules",
    "vendor",
    ".cursor",
    "public/storage",
    "storage/logs",
    "storage/framework/cache",
    "storage/framework/sessions",
    "storage/framework/views",
}
EXCLUDE_FILES = {
    ".env",
    ".env.local",
    ".env.production",
    "database.sqlite",
    "database.sqlite-shm",
    "database.sqlite-wal",
    "_tmp_vps_deploy_mouchap.py",
    "deploy-mouchap.bat",
}
EXCLUDE_PREFIXES = ("_tmp_vps_", "_tmp_")


def should_exclude(path: Path, root: Path) -> bool:
    rel = path.relative_to(root)
    rel_posix = rel.as_posix()
    for d in EXCLUDE_DIRS:
        if rel_posix == d or rel_posix.startswith(d + "/"):
            return True
    if path.name in EXCLUDE_FILES:
        return True
    if any(path.name.startswith(p) for p in EXCLUDE_PREFIXES):
        return True
    return False


def make_tarball() -> Path:
    tmp = tempfile.NamedTemporaryFile(suffix=".tar.gz", delete=False)
    tmp.close()
    tar_path = Path(tmp.name)
    with tarfile.open(tar_path, "w:gz") as tar:
        for item in LOCAL.rglob("*"):
            if should_exclude(item, LOCAL):
                continue
            if item.is_file():
                tar.add(item, arcname=item.relative_to(LOCAL).as_posix())
    return tar_path


def run(
    client,
    cmd: str,
    t: int = 900,
    check: bool = True,
    redact_output: bool = False,
) -> tuple[int, str]:
    display_cmd = cmd.replace(PW, "***") if PW else cmd
    print(f"\n>>> {display_cmd[:280]}", flush=True)
    _stdin, stdout, stderr = client.exec_command(cmd, timeout=t, get_pty=True)
    out = stdout.read().decode("utf-8", "replace")
    err = stderr.read().decode("utf-8", "replace")
    code = stdout.channel.recv_exit_status()
    text = (out + "\n" + err).strip()
    if text:
        print("[redacted]" if redact_output else text[-6000:], flush=True)
    if check and code != 0:
        raise RuntimeError(f"Command failed ({code}): {cmd[:120]}")
    return code, text


def write_production_env(client) -> None:
    env = f"""APP_NAME=MOUCHAP
APP_ENV=production
APP_KEY=
APP_DEBUG=false
APP_URL=https://{FQDN}

APP_LOCALE=fr
APP_FALLBACK_LOCALE=fr
APP_FAKER_LOCALE=fr_FR

LOG_CHANNEL=stack
LOG_STACK=single
LOG_LEVEL=error

DB_CONNECTION=sqlite
DB_DATABASE={APP}/database/database.sqlite

SESSION_DRIVER=file
SESSION_LIFETIME=120
SESSION_ENCRYPT=false
CACHE_STORE=file
QUEUE_CONNECTION=sync

BROADCAST_CONNECTION=log
FILESYSTEM_DISK=local
"""
    run(
        client,
        f"cat > {APP}/.env <<'EOF'\n{env}\nEOF",
    )


def main() -> None:
    print(f"Deploying Mouchap to {FQDN} ...", flush=True)
    if not (LOCAL / "public" / "build" / "manifest.json").exists():
        raise SystemExit("Missing public/build — run npm run build before deploy.")

    tar_path = make_tarball()
    remote_tar = f"/tmp/mouchap_deploy_{int(time.time())}.tar.gz"

    client = paramiko.SSHClient()
    client.set_missing_host_key_policy(paramiko.AutoAddPolicy())
    client.connect(HOST, username=USER, password=PW, timeout=30, allow_agent=False, look_for_keys=False)

    try:
        run(
            client,
            f"test -d {ROOT} && echo EXISTS || echo '{PW}' | sudo -S new-site {SLUG} php",
            check=False,
        )
        run(client, f"mkdir -p {APP}")
        run(
            client,
            f"echo '{PW}' | sudo -S chown -R ubuntu:www-data {ROOT} && "
            f"echo '{PW}' | sudo -S chmod -R g+w {ROOT}",
            check=False,
        )

        _, php_out = run(client, "php -r \"echo PHP_MAJOR_VERSION.'.'.PHP_MINOR_VERSION;\"", check=False)
        php_ver = php_out.strip().splitlines()[-1] if php_out.strip() else "?"
        print(f"\nServer PHP: {php_ver}", flush=True)
        try:
            major, minor = (int(x) for x in php_ver.split(".")[:2])
            if (major, minor) < (8, 3):
                print(
                    "WARNING: Mouchap needs PHP 8.3+ (Laravel 13). "
                    "composer will use --ignore-platform-reqs.",
                    flush=True,
                )
                composer_flags = "--ignore-platform-reqs"
            else:
                composer_flags = ""
        except ValueError:
            composer_flags = "--ignore-platform-reqs"

        sftp = client.open_sftp()
        print(f"Uploading archive -> {remote_tar}", flush=True)
        sftp.put(str(tar_path), remote_tar)
        sftp.close()

        _, probe = run(client, f"test -f {APP}/.env && echo HAS_ENV || echo NO_ENV", check=False)
        has_env = "HAS_ENV" in probe

        run(client, f"cp {APP}/.env /tmp/mouchap_env_backup 2>/dev/null || true", check=False)
        run(
            client,
            f"mkdir -p {APP}/storage/app/backups && "
            f"test ! -f {APP}/database/database.sqlite || "
            f"cp {APP}/database/database.sqlite "
            f"{APP}/storage/app/backups/database-before-deploy-$(date +%Y%m%d%H%M%S).sqlite",
            check=False,
        )
        run(client, f"cd {APP} && tar -xzf {remote_tar}")
        run(client, f"rm -f {remote_tar}")

        if has_env:
            run(client, f"cp /tmp/mouchap_env_backup {APP}/.env", check=False)
        else:
            write_production_env(client)

        run(
            client,
            f"mkdir -p {APP}/database {APP}/storage/framework/{{cache,sessions,views}} "
            f"{APP}/storage/logs {APP}/bootstrap/cache && "
            f"touch {APP}/database/database.sqlite",
        )
        run(
            client,
            f"cd {APP} && composer install --no-dev --optimize-autoloader "
            f"--no-interaction {composer_flags}".rstrip(),
            t=1200,
        )

        _, key_probe = run(
            client,
            f"grep '^APP_KEY=' {APP}/.env | cut -d= -f2-",
            check=False,
            redact_output=True,
        )
        if not key_probe.strip():
            run(client, f"cd {APP} && php artisan key:generate --force")
        run(client, f"cd {APP} && php artisan storage:link || true", check=False)
        run(client, f"cd {APP} && php artisan migrate --force")
        run(client, f"cd {APP} && php artisan db:seed --force", check=False)
        run(
            client,
            f"cd {APP} && php artisan config:cache && php artisan route:cache && php artisan view:cache",
            check=False,
        )
        run(
            client,
            f"echo '{PW}' | sudo -S chown -R ubuntu:www-data {APP} && "
            f"echo '{PW}' | sudo -S chmod -R ug+rwx {APP}/storage {APP}/bootstrap/cache {APP}/database",
        )
        run(
            client,
            f"echo '{PW}' | sudo -S certbot --nginx -d {FQDN} --non-interactive "
            f"--agree-tos -m admin@a2spr.com --redirect || echo CERTBOT_SKIP",
            check=False,
            t=300,
        )
        _, status = run(
            client,
            f"curl -s -o /dev/null -w '%{{http_code}}' https://{FQDN}/ || "
            f"curl -s -o /dev/null -w '%{{http_code}}' http://{FQDN}/",
            check=False,
        )
        print(f"\nHTTP(S) status: {status.strip()}", flush=True)
        print(f"\nDone: https://{FQDN}", flush=True)
    finally:
        client.close()
        try:
            tar_path.unlink(missing_ok=True)
        except OSError:
            pass


if __name__ == "__main__":
    main()
