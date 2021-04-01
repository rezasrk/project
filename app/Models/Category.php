<?php

namespace App\Models;

use App\Traits\Models\Relation\CategoryRelations;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use CategoryRelations;

    protected $guarded = ['id'];

}
