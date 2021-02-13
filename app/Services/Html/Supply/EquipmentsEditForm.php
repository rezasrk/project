<?php


namespace App\Services\Html\Supply;

use App\Models\Supply\Equipment;


class EquipmentsEditForm extends Html
{
    /**
     * @param Equipment $equipment
     * @param array $parameter
     * @return string
     */
    public function html(Equipment $equipment, array $parameter)
    {
        $equipments = trans('validation.attributes');
        return $this->rowHtml->startForm(['action' => route('equipments.update', $equipment->id), 'method' => 'post'])
            ->patch()
            ->startDiv(['class' => 'row'])
            ->startDiv(['class' => 'col'])
            ->label($equipments['equipment_category_id'])
            ->select($equipment->category->pluck('category_title','id')->toArray(), ['name' => 'equipment_category_id', 'class' => 'select2 form-control'],$equipment->category_id)
            ->endDiv()
            ->startDiv(['class' => 'col'])
            ->label($equipments['equipment_title'])
            ->input('text', ['name' => 'equipment_title', 'class' => 'form-control', 'value' => $equipment->equipment_title])
            ->endDiv()
            ->startDiv(['class' => 'col'])
            ->label($equipments['equipment_unit'])
            ->select($parameter['equipmentUnit'], ['class' => 'form-control', 'name' => 'equipment_unit'], $equipment->equipment_unit)
            ->endDiv()
            ->startDiv(['class' => 'col'])
            ->label($equipments['equipment_discipline'])
            ->select($parameter['equipmentDiscipline'], ['class' => 'form-control', 'name' => 'equipment_discipline'], $equipment->equipment_discipline)
            ->endDiv()
            ->endDiv()
            ->br()
            ->startDiv(['class' => 'row'])->startDiv(['class' => 'col'])
            ->button(['class' => 'btn btn-info request-ajax-form'], trans('button.create-equipment'))
            ->endDiv()->endDiv()
            ->endForm()->getHtml();
    }
}
