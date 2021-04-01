<?php

namespace App\Grid\Supply;

use App\Services\Html\ManagementColumn;
use SrkGrid\GridView\BaseGrid;
use SrkGrid\GridView\GridView;

class EquipmentsGrid implements BaseGrid
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
        $equipment = trans('validation.attributes');
        /** @var ManagementColumn $managementColumn */
        $managementColumn = $parameters['managementColumn'];
        return $grid->headerColumns([
            ['head' => $equipment['equipment_title']],
            ['head' => $equipment['equipment_unit']],
            ['head' => $equipment['equipment_discipline']],
            ['head' => $equipment['category_title']],
            ['head' => $equipment['management-grid']],
        ])
            ->addColumns('equipment_title')
            ->addColumns(function ($query) {
                return optional($query->unit)->value;
            })
            ->addColumns(function ($query) {
                return optional($query->discipline)->value;
            })
            ->addColumns(function ($query) {
                return optional($query->category)->category_title;
            })
            ->addColumns(function ($query) use ($managementColumn) {
                return $managementColumn
                    ->customAction([
                        'class' => 'text-primary fa fa-pencil-alt pointer edit-equipment',
                        'title' => trans('button.edit'),
                        'data-url' => route('equipments.edit', $query->id)
                    ], '', 'edit-equipment')
                    ->customAction([
                        'class' => 'text-dark fa fa-sitemap pointer show-properties',
                        'title' => 'مشاهده ی ویژگی ها ',
                        'data-url' => route('equipmentproperties.index') . '?parent_id=' . $query->id . '&title=' . $query->equipment_title
                    ], '', 'list-equipment')
                    ->getAction();
            })
            ->renderGrid();
    }
}
