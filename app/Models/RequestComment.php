<?php

namespace App\Models;

use App\Services\Morilog\Morilog;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RequestComment extends Model
{
    protected $guarded = ['id'];

    protected $table = 'request_comment';

    protected $appends = ['create_at_jalali'];

    public function creator(): BelongsTo
    {
        return $this->belongsTo(Admin::class, 'creator_id');
    }

    public function getCreatedAtJalaliAttribute(): string
    {
        /** @var Morilog $morilog */
        $morilog = app(Morilog::class);

        return $morilog->gregorianToJalali($this->created_at,'H:i Y-m-d');
    }
}
