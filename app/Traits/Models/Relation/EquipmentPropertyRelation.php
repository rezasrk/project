<?php


namespace App\Traits\Models\Relation;


use App\Models\Supply\Equipment;
use App\Models\Supply\Store;

trait EquipmentPropertyRelation
{
    /**
     * Relation by Equipment
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function equipment()
    {
        return $this->belongsTo(Equipment::class);
    }

    /**
     * Relation by Store
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function store()
    {
        return $this->hasOne(Store::class, 'equipment_property_id');
    }
}
