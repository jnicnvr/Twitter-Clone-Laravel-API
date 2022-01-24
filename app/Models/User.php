<?php

namespace App\Models;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getJWTIdentifier()
    {
        //return primary key of user user-id
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        // return a key value of array, containing custom claims to be added in JWT
        return [];
    }
    public function ownsTopic(Topic $topic)
    {
        //check if the id is match with topic id
        return $this->id === $topic->user->id;
    }
}
