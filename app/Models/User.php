<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use \Illuminate\Database\Eloquent\Relations\HasOne;

class User extends Authenticatable
{
    use Notifiable, HasRoles;

    protected $guarded = ['id'];

    public function verifyEmail(): HasMany
    {
        return $this->hasMany(VerifyEmail::class, 'user_id')->latest('created_at');
    }

    public function publisher(): HasMany
    {
        return $this->hasMany(Publisher::class, 'creator_id');
    }
}
