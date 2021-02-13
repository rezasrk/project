<?php

namespace App\Grid\Supply;

use SrkGrid\GridView\BaseGrid;
use SrkGrid\GridView\GridView;

class WarehouseGrid implements BaseGrid
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
        $management = $parameters['management'];
        return $grid->headerColumns([
            ['head'=>'کالا'],
            ['head'=>'واحد'],
            ['head'=>'دیسیپلین'],
            ['head'=>'MRS'],
            ['head'=>'MIV'],
            ['head'=>'MRV'],
            ['head'=>'موجودی انبار'],
            ['head'=>'مدیریت']
        ])
        ->rowIndex()
        ->addColumns('complete_title')
        ->addColumns(function($query){
            if($query->unit_id == 46){
                return "";
            }
            return $query->unit_val;
        })
        ->addColumns(function($query){
            if($query->discipline_id == 46){
                return "";
            }
            return $query->discipline_val;
        })
        ->addColumns('mrs')
        ->addColumns('miv')
        ->addColumns('mrv')
        ->addColumns(function($query){
            return ($query->mrs + $query->mrv) - $query->miv;
        })
        ->addColumns(function ($query) use ($management) {
            return $management->customAction(
                [
                'class'=>'text-danger pointer miv',
                'data-url'=>route('warehouse.type', 'MIV').'?category_id='.$query->id
                ],
                'MIV',
                'create-miv'
            )
                ->getAction();
        })
        ->renderGrid();
    }
}
