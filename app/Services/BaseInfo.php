<?php


namespace App\Services;

use \App\Models\Baseinfo as Base;

class BaseInfo
{
    public function getExtra($id)
    {
        $base = Base::query()->find($id);

        return json_decode($base->extra_value);
    }
}
