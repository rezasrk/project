<?php


namespace App\Traits\Models\Relation;

use App\Models\Baseinfo;

trait AttachmentRelation
{
    /**
     * Relation by Baseinfo
     *
     * @return BelongsTo
     */
    public function type()
    {
        return $this->belongsTo(Baseinfo::class, 'type');
    }
}
