<?php

namespace App\Grid\Settings;

use SrkGrid\GridView\BaseGrid;
use SrkGrid\GridView\GridView;

class PermissionsGrid implements BaseGrid
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
        $permission = trans('validation.attributes');
        return $grid->headerColumns([
            ['head' => $permission['prm_label']],
            ['head' => $permission['select']],

        ])
            ->setTerminateGet()
            ->addColumns('title')
            ->addColumns(function ($query) use ($parameters) {
                $checked = '';
                if (isset($parameters['permissionsRole']) && in_array($query->id, $parameters['permissionsRole'])) {
                    $checked = 'checked';
                }
                return "<input {$checked} name='permission[]' value='{$query->id}' type='checkbox'>";
            })
            ->anyRowAttribute(function ($query) {
                if ($query->is_parent == 1) {
                    return ['class' => 'table-warning'];
                }
            })
            ->renderGrid();
    }
}
