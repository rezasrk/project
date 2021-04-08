<?php

namespace App\Models;

use App\Traits\Models\Relation\CategoryRelations;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use CategoryRelations;

    protected $guarded = ['id'];

    public function childs()
    {
        return $this->hasMany(self::class,'id');
    }

    public function parent()
    {
        return $this->belongsTo(self::class,'parent_id');
    }

}
