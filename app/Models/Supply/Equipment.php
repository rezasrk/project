<?php

namespace App\Models\Supply;

use App\Traits\Models\Relation\EquipmentRelation;
use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    use EquipmentRelation;

    protected $table = 'equipments';

    protected $fillable = ['equipment_title', 'category_id', 'category_ids', 'equipment_unit', 'equipment_discipline'];

    protected static function boot()
    {
        parent::boot();
        self::updated(function ($equipment) {
            if ($equipment->isDirty('equipment_title')) {
                EquipmentProperty::query()->where('equipment_id', '=', $equipment->id)
                    ->orderBy('id')->limit(1)
                    ->update(['equipment_property_title' => $equipment->equipment_title]);
            }
        });
    }

}
