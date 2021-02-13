<?php

namespace App\Traits\Models\Relation;

use App\Models\Supply\Category;
use App\Models\Supply\Request;
use App\Models\Supply\Store;
use App\Models\Supply\StoreDetail;

trait RequestDetailRelation
{
    public function request()
    {
        return $this->belongsTo(Request::class);
    }
    /**
     * Relation by category
     */
    public function category()
    {
        return   $this->belongsTo(Category::class, 'category_id');
    }
    /**
     * Relation by Store
     *
     * @return BelongsTo
     */
    public function store()
    {
        return $this->belongsTo(Store::class, 'equipment_property_id', 'equipment_property_id');
    }

    /**
     * Relation by store detail when type equal MRS
     *
     * @return BelongsTo
     */
    public function MRS()
    {
        return $this->hasMany(StoreDetail::class)->where('type', '=', 'MRS');
    }

    /**
    * Relation by store detail when type equal MIV
    *
    * @return BelongsTo
    */
    public function MIV()
    {
        return $this->hasMany(StoreDetail::class)->where('type', '=', 'MIV');
    }

    /**
     * Relation by store detail when type equal MRV
     *
     * @return BelongsTo
     */
    public function MRV()
    {
        return $this->hasMany(StoreDetail::class)->where('type', '=', 'MRV');
    }
}
