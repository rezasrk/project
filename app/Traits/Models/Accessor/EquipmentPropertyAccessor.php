<?php


namespace App\Traits\Models\Accessor;

trait EquipmentPropertyAccessor
{
    public function getCompletedTitleAttribute()
    {
        if ($this->equipment->equipment_title == $this->attributes['equipment_property_title']) {
            return $this->attributes['equipment_property_title'];
        } else {
            return $this->equipment->equipment_title.' '.$this->attributes['equipment_property_title'];
        }
    }
}
