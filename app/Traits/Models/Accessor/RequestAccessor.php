<?php

namespace App\Traits\Models\Accessor;

trait RequestAccessor
{
    /**
     * Translate request status
     *
     * @return string
     */
    public function getRequestStatusAttribute()
    {
            return trans('request_status.'.$this->attributes['status'].'.title');
    }
/**
 * Translate request type
 *
 * @return string
 */
    public function getRequestTypeAttribute()
    {
        return trans('request_type.'.$this->attributes['type'].'.title');
    }
}
