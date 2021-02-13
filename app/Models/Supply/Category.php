<?php

namespace App\Models\Supply;

use App\Traits\Models\Relation\CategoryRelations;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use CategoryRelations;

    protected $guarded = ['id'];

    protected $appends = ['complete_category_title'];

    protected $fullTitle = '';

    public function getCompleteCategoryTitleAttribute()
    {
        $title = '';
        if( $this->parent && !$this->is_product )
            $title = $this->parent->complete_category_title;

        return $title .' - '. $this->category_title;
    }

    public function parent()
    {
       return  $this->belongsTo(Category::class,'category_parent_id','id');
    }

    public function storeDetails()
    {
        return $this->hasManyThrough(StoreDetail::class,RequestDetail::class,'category_id','request_detail_id','id','id');
    }

    public function warehouse()
    {
        $mrs = $this->storeDetails->where('type','=','MRS')->sum('amount');

        $miv = $this->storeDetails->where('type','=','MIV')->sum('amount');

        $mrv = $this->storeDetails->where('type','=','MRV')->sum('amount');

        return ($mrs + $mrv) - $miv;
    }
}
