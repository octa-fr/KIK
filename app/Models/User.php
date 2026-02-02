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
       HELPER ROLE
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
       RELATION
    ===================== */

    // posting magang milik mitra
    public function posts()
    {
        return $this->hasMany(Post::class, 'mitra_id');
    }

    // lamaran magang milik user
    public function internshipRequests()
    {
        return $this->hasMany(InternshipRequest::class);
    }
}
