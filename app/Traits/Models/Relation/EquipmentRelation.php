<?php


namespace App\Traits\Models\Relation;


use App\Models\Baseinfo;
use App\Models\Supply\Category;
use App\Models\Supply\EquipmentProperty;

trait EquipmentRelation
{
    /**
     * Relation by Category
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Relation by Equipment Property
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function properties()
    {
        return $this->hasMany(EquipmentProperty::class);
    }

    /**
     * Relation by baseinfo equipment unit
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function unit()
    {
        return $this->belongsTo(Baseinfo::class, 'equipment_unit');
    }

    /**
     * Relation by baseinfo equipment discipline
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function discipline()
    {
        return $this->belongsTo(Baseinfo::class, 'equipment_discipline');
    }
}
