<?php

namespace App\Traits\Models\Relation;

use App\Models\Baseinfo;
use App\Models\Supply\Category;
use App\Models\Supply\EquipmentProperty;
use App\Models\Supply\Store;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait StoreDetailRelation
{
    /**
     * Relation by Store
     *
     * @return BelongsTo
     */
    public function store()
    {
        return $this->belongsTo(Store::class, 'store_id');
    }
    /**
     * Relation by EquipmentProperty
     *
     * @return BelongsTo
     */
    public function equipmentProperty()
    {
        return $this->belongsTo(EquipmentProperty::class, 'request_id');
    }

    public function unit()
    {
        return $this->belongsTo(Baseinfo::class, 'unit_price');
    }

    /**
     * Relation by category
     *
     * @return BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
