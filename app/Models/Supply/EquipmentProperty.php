<?php

namespace App\Models\Supply;

use App\Traits\Models\Accessor\EquipmentPropertyAccessor;
use App\Traits\Models\Relation\EquipmentPropertyRelation;
use App\Traits\Models\Scope\EquipmentPropertyScope;
use Illuminate\Database\Eloquent\Model;

class EquipmentProperty extends Model
{
    use EquipmentPropertyRelation, EquipmentPropertyScope,EquipmentPropertyAccessor;

    protected $table = 'equipment_properties';

    protected $guarded = ['id'];

    protected $appends = ['completed_title'];

    protected static function boot()
    {
        parent::boot();

        self::created(function ($equipment_detail) {
            Store::query()->create(['equipment_property_id' => $equipment_detail->id]);
        });
    }
}
