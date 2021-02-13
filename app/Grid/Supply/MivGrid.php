<?php

namespace App\Grid\Supply;

use SrkGrid\GridView\BaseGrid;
use SrkGrid\GridView\GridView;

class MivGrid implements BaseGrid
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
        $morilog = $parameters['morilog'];

        $column = $parameters['column'];


        return $grid->headerColumns([
            ['head'=>'مقدار'],
            ['head'=>'شماره '],
            ['head'=>'تاریخ'],
            ['head'=>'مدیریت'],
        ])
        ->rowIndex()
        ->addColumns('amount')
        ->addColumns('request_detail_no')
        ->addColumns(function ($query) use ($morilog) {
            return  $morilog->gregorianToJalali($query->date);
        })
        ->addColumns(function ($query) use ($column) {
            return $column->customAction([
                    'class'=>'fa fa-pencil-alt pointer text-primary edit-miv',
                    'data-url'=>route('miv.edit', [$query->id,$query->category_id]),
                ])->getAction();
        })
        ->setParentPaginateAttribute(['class'=>'ajax-request-paginate'])
        ->renderGrid();
    }
}
