<?php

namespace App\Models;

use App\Traits\Models\Relation\UserRelation;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable, HasRoles, UserRelation;

    protected $appends = [
        'status_req', 'type_req'
    ];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'username', 'is_admin', 'email_verified_at', 'password', 'name', 'access_request'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getStatusReqAttribute(): array
    {
        $status = json_decode($this->access_request, true);
        if (is_array($status) && count($status) > 0) {
            return $status['status'];
        }
        return [];
    }

    public function getTypeReqAttribute(): array
    {
        $type = json_decode($this->access_request, true);
        if (is_array($type) && count($type) > 0) {
            return $type['type'];
        }
        return [];
    }

}
