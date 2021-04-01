<?php

namespace App\Models;

use App\Traits\Models\Relation\AttachmentRelation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Attachment extends Model
{
    use AttachmentRelation, SoftDeletes;

    protected $fillable = ['path', 'type', 'title'];

    public function typeFile()
    {
        return $this->belongsTo(Baseinfo::class, 'type');
    }

}
