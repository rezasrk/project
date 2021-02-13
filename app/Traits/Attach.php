<?php

namespace App\Traits;

use App\Models\Attachment;

trait Attach
{
    public function attachments()
    {
        return $this->morphMany(Attachment::class, 'parent');
    }
}
