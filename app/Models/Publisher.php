<?php

namespace App\Models;

use App\Services\Morilog\Morilog;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Relations\BelongsTo;
use \Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Publisher extends Model
{
    use SoftDeletes;

    protected $guarded = ['id'];

    protected $appends = ['journal_status', 'created_date'];

    protected $casts = [
        'status' => 'bool'
    ];


    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'creator_id');
    }

    public function journals(): HasMany
    {
        return $this->hasMany(Journal::class, 'publisher_id');
    }

    public function getCreatedDateAttribute(): string
    {
        /** @var Morilog $jdate */
        $jdate = app(Morilog::class);

        return $jdate->gregorianToJalali(
            $this->attributes['created_at'], '( %A, %d %B %Y ) H:i');
    }

    public function journalNumbers()
    {
        return $this->hasManyThrough(JournalNumber::class, Journal::class, 'publisher_id', 'journal_id', 'id', 'id');
    }

    public function articles()
    {
        return $this->hasManyThrough(Article::class, Journal::class, 'publisher_id', 'journal_id', 'id', 'id');
    }
}
