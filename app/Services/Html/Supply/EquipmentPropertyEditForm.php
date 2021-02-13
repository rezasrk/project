<?php


namespace App\Services\Html\Supply;

class EquipmentPropertyEditForm extends Html
{
    public function html($equipmentProperty)
    {
        return $this->rowHtml->startForm(['action' => route('equipmentproperties.update', $equipmentProperty->id)])
            ->patch()
            ->startDiv(['class' => 'row'])
            ->startDiv(['class' => 'col'])
            ->label(trans('validation.attributes.equipment_property_title'))
            ->input('text', ['name' => 'equipment_property_title', 'class' => 'form-control', 'value' => $equipmentProperty->equipment_property_title])
            ->endDiv()
            ->endDiv()
            ->br()
            ->startDiv(['class' => 'row'])
            ->startDiv(['class' => 'col'])
            ->button(['class' => 'btn btn-info request-ajax-form'], trans('button.edit-equipment-property'))
            ->button(['class' => 'btn btn-danger come-back', 'type' => 'button'], trans('button.come-back'))
            ->endDiv()
            ->endDiv()
            ->endForm()
            ->getHtml();
    }
}
