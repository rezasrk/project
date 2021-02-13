<?php

namespace App\Grid\Supply;

use SrkGrid\GridView\BaseGrid;
use SrkGrid\GridView\GridView;

class FinancialGrid implements BaseGrid
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
        $financial = trans('validation.attributes');
        $column = $parameters['managementColumn'];
        return $grid->headerColumns([
            ['head'=>$financial['code']],
            ['head'=>$financial['category_title']],
            ['head'=>$financial['request_amount']],
            ['head'=>$financial['equipment_unit']],
            ['head'=>$financial['price']],
        ])
        ->addColumns(function ($query) {
            return $query->category->code;
        })
        ->addColumns(function ($query) {
            return $query->category->complete_category_title;
        })
        ->addColumns(function ($query) {
            return number_format($query->amount);
        })
        ->addColumns(function ($query) {
            return optional($query->category->unit)->value;
        })
        ->addColumns(function ($query) use ($column) {
            return $column->getRowHtml()->input(
                'text',
                [
                    'class'=>'form-control request-detail-price request-detail-price number-format',
                    'autocomplete'=>'off',
                    'data-request-detail-id'=>$query->id,
                    'value'=>number_format($query->price)
                ]
            )->getHtml();
        })
        ->renderGrid();
    }
}
