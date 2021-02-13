<?php

namespace App\Grid\Settings;

use App\Services\Html\ManagementColumn;
use SrkGrid\GridView\BaseGrid;
use SrkGrid\GridView\GridView;

class RolesGrid implements BaseGrid
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
        $roles = trans('validation.attributes');
        /** @var ManagementColumn $managementColumn */
        $managementColumn = $parameters['managementColumn'];
        return $grid->headerColumns([
            ['head' => $roles['role_name']],
            ['head' => $roles['management-grid']]
        ])
            ->addColumns('name')
            ->addColumns(function ($query) use ($managementColumn) {
                return $managementColumn->edit(route('roles.edit', $query->id), 'edit-roles')->getAction();
            })
            ->renderGrid();
    }


}
