<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable(['code', 'name', 'contact', 'statue', 'email', 'password', 'password_display'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function toAdminArray(): array
    {
        return [
            'uid' => (string) $this->id,
            'id' => $this->code,
            'nom_complet' => $this->name,
            'contact' => $this->contact ?? '',
            'statue' => $this->statue ?? 'gerant',
            'login' => $this->email,
            'password' => $this->password_display ?? '',
        ];
    }
}
