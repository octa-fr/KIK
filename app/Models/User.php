<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
    'name',
    'email',
    'password',
    'role',
    'mitra_verified',
    'mitra_reason'
    ];


    /* =====================
       HELPER ROLE login
    ===================== */

    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    public function isMitra()
    {
        return $this->role === 'mitra' && $this->mitra_verified;
    }

    public function isUser()
    {
        return $this->role === 'user';
    }

    /* =====================
       RELATION (NANTI)
    ===================== */

    public function postings()
    {
        return $this->hasMany(Posting::class);
    }

    public function lamarans()
    {
        return $this->hasMany(Lamaran::class);
    }
}
