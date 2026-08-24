<?php

namespace App\Support;

use App\Models\AffiliationRequest;
use App\Models\Affilie;
use App\Models\Fournisseur;
use App\Models\Message;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Str;

class MouchapCodes
{
    public static function nextAffiliationCode(): string
    {
        $year = (int) now()->format('Y');
        $highest = AffiliationRequest::query()
            ->where('code', 'like', $year.'/%')
            ->pluck('code')
            ->reduce(function (int $max, string $code) use ($year): int {
                return preg_match('/^'.$year.'\/(\d+)$/', $code, $m)
                    ? max($max, (int) $m[1])
                    : $max;
            }, 0);

        $fromAffilies = Affilie::query()
            ->where('code', 'like', $year.'/%')
            ->pluck('code')
            ->reduce(function (int $max, string $code) use ($year): int {
                return preg_match('/^'.$year.'\/(\d+)$/', $code, $m)
                    ? max($max, (int) $m[1])
                    : $max;
            }, $highest);

        return $year.'/'.str_pad((string) ($fromAffilies + 1), 5, '0', STR_PAD_LEFT);
    }

    public static function nextUserCode(): string
    {
        $highest = User::query()
            ->where('code', 'like', 'USR%')
            ->pluck('code')
            ->reduce(function (int $max, string $code): int {
                return preg_match('/^USR(\d+)$/i', $code, $m)
                    ? max($max, (int) $m[1])
                    : $max;
            }, 0);

        return 'USR'.str_pad((string) ($highest + 1), 4, '0', STR_PAD_LEFT);
    }

    public static function nextFournisseurCode(): string
    {
        $year = (int) now()->format('Y');
        $highest = Fournisseur::query()
            ->where('code', 'like', 'FRN-'.$year.'/%')
            ->pluck('code')
            ->reduce(function (int $max, string $code) use ($year): int {
                return preg_match('/^FRN-'.$year.'\/(\d+)$/', $code, $m)
                    ? max($max, (int) $m[1])
                    : $max;
            }, 0);

        return 'FRN-'.$year.'/'.str_pad((string) ($highest + 1), 5, '0', STR_PAD_LEFT);
    }

    public static function nextOrderCode(): string
    {
        do {
            $code = 'CMD-'.strtoupper(Str::random(5));
        } while (Order::query()->where('n_cmd', $code)->exists());

        return $code;
    }

    public static function nextMessageCode(): string
    {
        do {
            $code = 'MSG-'.strtoupper(Str::random(5));
        } while (Message::query()->where('n_msg', $code)->exists());

        return $code;
    }

    public static function slugLogin(string $name): string
    {
        $base = Str::of($name)
            ->ascii()
            ->lower()
            ->replaceMatches('/[^a-z0-9]+/', '.')
            ->trim('.')
            ->substr(0, 24)
            ->value() ?: 'affilie';

        $login = $base.'@mouchap.com';
        $i = 1;
        while (Affilie::query()->where('login', $login)->exists()) {
            $login = $base.$i.'@mouchap.com';
            $i++;
        }

        return $login;
    }

    public static function randomPassword(): string
    {
        return 'Mh'.Str::lower(Str::random(6));
    }

    public static function normalizeLogin(?string $value): string
    {
        $user = Str::of((string) $value)
            ->trim()
            ->lower()
            ->replaceMatches('/@mouchap\.com$/i', '')
            ->replaceMatches('/@.*$/', '')
            ->replaceMatches('/\s+/', '')
            ->value();

        return $user !== '' ? $user.'@mouchap.com' : '';
    }

    public static function normalizeCin(?string $value): string
    {
        return Str::upper(preg_replace('/\s+/', '', (string) $value) ?? '');
    }

    public static function findExistingAffilie(?string $cin, ?string $contact): ?Affilie
    {
        $cin = self::normalizeCin($cin);
        $contact = preg_replace('/\D+/', '', (string) $contact) ?: '';

        if ($cin === '' && $contact === '') {
            return null;
        }

        return Affilie::query()
            ->where(function ($query) use ($cin, $contact) {
                if ($cin !== '') {
                    $query->orWhereRaw("UPPER(REPLACE(cin, ' ', '')) = ?", [$cin]);
                }
                if ($contact !== '') {
                    $query->orWhere('contact', $contact);
                }
            })
            ->orderBy('id')
            ->first();
    }
}
