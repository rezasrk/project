<?php

namespace App\Models;

use App\Services\Morilog\Morilog;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Relations\BelongsTo;
use \Illuminate\Database\Eloquent\Relations\HasMany;

class Journal extends Model
{
    protected $guarded = ['id'];

    protected $casts = ['status' => 'bool'];

    protected $appends = ['create_date'];

    public function publisherTitle(): BelongsTo
    {
        return $this->belongsTo(Baseinfo::class, 'publisher');
    }

    public function publish(): BelongsTo
    {
        return $this->belongsTo(Publisher::class, 'publisher_id');
    }

    public function journalNumbers(): HasMany
    {
        return $this->hasMany(JournalNumber::class, 'journal_id');
    }

    public function getCreateDateAttribute(): string
    {
        /** @var Morilog $morilog */
        $morilog = app(Morilog::class);

        return $morilog->gregorianToJalali($this->attributes['created_at'], '( %A, %d %B %y ) H:i');
    }
}
