<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Model
{
    protected $guarded = ['id'];

    public function verifyEmail(): HasMany
    {
        return $this->hasMany(VerifyEmail::class, 'user_id')->latest('created_at');
    }
}
