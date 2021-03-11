<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Relations\BelongsTo;

class Journal extends Model
{
    protected $guarded = ['id'];

    public function publisherTitle(): BelongsTo
    {
        return $this->belongsTo(Baseinfo::class, 'publisher');
    }
}
