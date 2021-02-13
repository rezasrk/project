<?php


namespace App\Traits\Models\Relation;

use App\Models\Baseinfo;
use App\Models\Supply\Category;
use App\Models\Supply\Equipment;
use App\Models\Supply\StoreDetail;

trait CategoryRelations
{
    /**
     * Relation by Category
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function child()
    {
        return $this->hasMany(Category::class, 'category_parent_id', 'id');
    }

    /**
     * Relation by Baseinfo
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function unit()
    {
        return $this->belongsTo(Baseinfo::class, 'unit_id', 'id');
    }
    /**
     * Relation by discipline
     *
     * @return belongsTo
     */
    public function discipline()
    {
        return $this->belongsTo(Baseinfo::class, 'discipline_id', 'id');
    }
    /**
     * Relation by StoreDetail
     *
     * @return HasMany
     */
    public function storeDetails()
    {
        return $this->hasMany(StoreDetail::class, 'category_id');
    }
}
