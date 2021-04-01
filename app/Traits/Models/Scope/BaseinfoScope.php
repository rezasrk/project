<?php


namespace App\Traits\Models\Scope;


trait BaseinfoScope
{
    public function scopeType($query, $type)
    {
        return $query->where('type', '=', $type)
            ->where('parent_id', '<>', 0)
            ->latest('id')
            ->get()
            ->pluck('value', 'id')
            ->toArray();
    }
}
