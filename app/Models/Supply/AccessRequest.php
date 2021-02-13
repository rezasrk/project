<?php

namespace App\Models\Supply;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AccessRequest extends Model
{
    protected $table = 'access_requests';

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
