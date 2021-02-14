<?php


namespace App\Traits\Models\Relation;


use App\Models\Baseinfo;
use App\Models\RequestComment;
use App\Models\Supply\RequestDetail;
use App\Models\Admin;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait RequestRelation
{
    public function details(): HasMany
    {
        return $this->hasMany(RequestDetail::class, 'request_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(Admin::class, 'creator_id');
    }

    public function stat(): BelongsTo
    {
        return $this->belongsTo(Baseinfo::class, 'status');
    }

    public function typ(): BelongsTo
    {
        return $this->belongsTo(Baseinfo::class, 'type');
    }

    public function comments(): HasMany
    {
        return $this->hasMany(RequestComment::class);
    }
}

