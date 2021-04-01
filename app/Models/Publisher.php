<?php

namespace App\Models;

use App\Services\Morilog\Morilog;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Relations\BelongsTo;

class Publisher extends Model
{
    protected $guarded = ['id'];

    protected $appends = ['journal_status', 'created_date'];

    protected $casts = [
        'status' => 'bool'
    ];

    public function rankRequester(): BelongsTo
    {
        return $this->belongsTo(Baseinfo::class, 'rank_requester');
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'creator_id');
    }
public function journals()
{
    return $this->hasMany(Journal::class,'publisher_id');
}
    public function getCreatedDateAttribute(): string
    {
        /** @var Morilog $jdate */
        $jdate = app(Morilog::class);

        return $jdate->gregorianToJalali($this->attributes['created_at'],'( %A, %d %B %y ) H:i');
    }
}
