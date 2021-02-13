<?php


namespace App\Traits\Models\Scope;

use App\Models\Supply\Request;

trait RequestScope
{
    public function scopeStatus($query,$status)
    {
        return $query->where('status','=',$status);
    }
    public function scopeSupply($query)
    {
        return $query->where('type', '=', Request::TYPE['SP'])
                     ->where('status', '=', Request::STATUS['AC']);
    }

    public function scopeDeliver($query)
    {
        return $query->where('type', '=', Request::TYPE['DL'])
                     ->where('status', '=', Request::STATUS['AC']);
    }

    public function scopeInLocation($query)
    {
        return $query->where('type', '=', Request::TYPE['IN'])
                     ->where('status', '=', Request::STATUS['SN']);
    }

    public function scopeSupplier($query)
    {
        return $query->where('type', '=', Request::TYPE['SP'])
                     ->where('assign_id', '=', auth()->user()->id);
    }
}
