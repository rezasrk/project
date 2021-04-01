<?php

namespace App\Grid\Settings;

use SrkGrid\GridView\BaseGrid;
use SrkGrid\GridView\GridView;

class UserGird implements BaseGrid
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
        $column = $parameters['column'];
        return $grid->headerColumns([
            ['head' =>'نام کاربری'],
            ['head' => 'کلمه ی عبور'],
            ['head' => 'ایمیل'],
            ['head'=>'مدیریت']
        ])
            ->addColumns('username')
            ->addColumns('name')
            ->addColumns('email')
            ->addColumns(function ($query) use ($column) {
                return $column->customAction([
                    'class'=>'fa fa-pencil-alt text-primary edit-user pointer',
                    'data-url'=>route('users.edit', $query->id)], '', '')->getAction();
            })
            ->renderGrid();
    }
}
