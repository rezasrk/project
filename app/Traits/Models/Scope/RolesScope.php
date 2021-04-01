<?php


namespace App\Traits\Models\Scope;


trait RolesScope
{
    public function scopeStatus($query, $status = 1)
    {
        return $query->where('status', '=', $status);
    }
}
