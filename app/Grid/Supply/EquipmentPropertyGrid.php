<?php

namespace App\Grid\Supply;

use App\Services\Html\ManagementColumn;
use SrkGrid\GridView\BaseGrid;
use SrkGrid\GridView\GridView;

class EquipmentPropertyGrid implements BaseGrid
{
    /**
     * Render method for get html view result
     *
     * @param GridView $grid
     * @param $data
     * @param $parameters
     * @return mixed
     */
    public function render($grid, $data, $parameters = null)
    {
        $equipmentProperties = trans('validation.attributes');
        /** @var ManagementColumn $managementColumn */
        $managementColumn = $parameters['managementColumn'];

        return $grid->headerColumns([
            ['head' => $equipmentProperties['equipment_property_title']],
            ['head' => $equipmentProperties['management-grid']],
        ])
            ->addColumns('equipment_property_title')
            ->addColumns(function ($query) use ($managementColumn) {
                $html = $managementColumn->customAction([
                        'class' => 'text-primary fa fa-pencil-alt pointer edit-equipment-property',
                        'title' => trans('button.edit'),
                        'data-url' => route('equipmentproperties.edit', $query->id)
                    ]);
                return $html->getAction();
            })->renderGrid();
    }
}
