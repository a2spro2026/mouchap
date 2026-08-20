@echo off
cd /d "%~dp0"
if not defined VPS_SSH_PASSWORD (
  echo Set VPS_SSH_PASSWORD in your environment before deploying.
  echo Example: set VPS_SSH_PASSWORD=your-password
  pause
  exit /b 1
)
echo Building assets...
call npm run build
if errorlevel 1 exit /b 1
echo Deploying Mouchap to mouchap.a2spr.com ...
python _tmp_vps_deploy_mouchap.py
if errorlevel 1 exit /b 1
echo.
pause
