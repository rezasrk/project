<?php

namespace App\Traits\Models\Accessor;

use App\Services\Morilog\Morilog;

trait StoreDetailAccessor
{
    public function getDateAttribute($value)
    {
        if ($value) {
            return Morilog::morilog()->gregorianToJalali($value);
        } else {
            return "";
        }

    }

    public function getExtraValueAttribute()
    {
        if ($this->extra != "") {
            return json_decode($this->extra);
        }
        return (object)[];
    }
}
