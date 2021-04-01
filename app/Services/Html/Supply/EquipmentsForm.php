<?php


namespace App\Services\Html\Supply;

class EquipmentsForm extends Html
{
    public function html($parameter)
    {
        $equipment = trans('validation.attributes');
        return $this->rowHtml->startForm(['action' => route('equipments.store'), 'method' => 'post'])
            ->startDiv(['class' => 'row'])
            ->startDiv(['class' => 'col'])
            ->label($equipment['equipment_category_id'])
            ->select([], ['name' => 'equipment_category_id', 'class' => 'select2 form-control'])
            ->endDiv()
            ->startDiv(['class' => 'col'])
            ->label($equipment['equipment_title'])
            ->input('text', ['name' => 'equipment_title', 'class' => 'form-control'])
            ->endDiv()
            ->startDiv(['class' => 'col'])
            ->label($equipment['equipment_unit'])
            ->select($parameter['equipmentUnit'], ['class' => 'form-control','name'=>'equipment_unit'])
            ->endDiv()
            ->startDiv(['class' => 'col'])
            ->label($equipment['equipment_discipline'])
            ->select($parameter['equipmentDiscipline'], ['class' => 'form-control','name'=>'equipment_discipline'])
            ->endDiv()
            ->endDiv()
            ->br()
            ->startDiv(['class' => 'row equipment-property-sample'])->startDiv(['class' => 'col'])
            ->label(trans('validation.attributes.equipment_property_title'))
            ->input('text', ['name' => 'equipment_property_title[]', 'class' => 'form-control'])
            ->endDiv()->endDiv()
            ->startDiv(['class'])
            ->br()
            ->startDiv(['class' => 'row'])->startDiv(['class' => 'col'])
            ->button(['class' => 'btn btn-info request-ajax-form'], trans('button.create-equipment'))
            ->button(['class' => 'btn btn-warning add-equipment-property', 'type' => 'button'], trans('button.add-input'))
            ->button(['class' => 'btn btn-danger remove-form', 'type' => 'button'], trans('button.remove-input'))
            ->endDiv()->endDiv()
            ->endForm()->getHtml();
    }
}
