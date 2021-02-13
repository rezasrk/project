<?php

namespace App\Grid\Supply;

use App\Services\Html\ManagementColumn;
use SrkGrid\GridView\BaseGrid;
use SrkGrid\GridView\GridView;

class RequestDetailGrid implements BaseGrid
{
    protected $unitPrice;
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
        $detail = trans('validation.attributes');
        $column = $parameters['column'];
        $this->unitPrice = $parameters['unitPrice'];
        return $grid->headerColumns([
            ['head'=>$detail['equipment_title']],
            ['head'=>$detail['request_amount']],
            ['head'=> 'MRS'],
        ])
        ->addColumns(function ($query) {
            return $query->category->complete_category_title;
        })
        ->addColumns('amount')
        ->addColumns(function ($query) use ($column) {
            return $this->warehouseAction($column, $query, 'MRS');
        })
        ->setTrAttribute(['class'=>'request-detail-row'])
        ->renderGrid();
    }
    /**
     * Create warehouse action
     *
     * @param ManagementColumn $column
     * @param RequestDetail $request_detail_id
     * @param string $type
     * @return string
     */
    protected function warehouseAction(ManagementColumn $column, $query, $type)
    {
        $warehouseAction =  $column->getRowHtml()
        ->startTable(['class'=>'table table-bordered'])
        ->input('hidden', ['name'=>'type','value'=>$type])
        ->input('hidden', ['name'=>'request_detail_id','value'=>$query->id])
        ->startTr()
        ->startTd('مقدار')->endTd()
        ->startTd('شماره mrs')->endTd()
        ->startTd('تاریخ')->endTd()
        ->startTd('مبلغ')->endTd()
        ->startTd('واحد پول')->endTd()
        ->startTd()
        ->i(['class'=>'fa fa-plus text-primary pointer add-action-warehouse'])
        ->i(['class'=>'fa fa-minus text-danger pointer remove-action-warehouse'])
        ->endTd()
        ->endTr();

        $this->type($query, $type, $warehouseAction);

        $this->warehouseDetail($warehouseAction, $query);

        return $warehouseAction->endTr()
        ->endTable()
        ->getHtml();
    }

    protected function type($query, $type, $warehouseAction)
    {
        collect($query->$type)->each(function ($storeDetail) use ($warehouseAction, $query) {
            $this->warehouseDetail($warehouseAction, $query, $storeDetail);
        });
    }

    protected function warehouseDetail($warehouseAction, $query, $storeDetail = null)
    {

        $warehouseAction->startTr(['class'=>'sample-action-warehouse'])
        ->startTd()
        ->input('hidden', ['name'=>'category_id[]','value'=>$query->category->id])
        ->input('text', [
            'name'=>'amount[]',
            'value'=>optional($storeDetail)->amount,
            'class'=>'form-control blue-store','autocomplete'=>'off'])
        ->endTd()
        ->startTd()
        ->input('text', [
            'name'=>'request_detail_no[]',
            'value'=>optional($storeDetail)->request_detail_no,
            'class'=>'form-control blue-store','autocomplete'=>'off'])
        ->endTd()
        ->startTd()
        ->input('text', [
            'name'=>'date[]',
            'value'=>(optional($storeDetail)->date),
            'class'=>'form-control blue-store datepicker',
            'autocomplete'=>'off'])
        ->endTd()
        ->startTd()
        ->input('text', [
            'name'=>'price[]',
            'value'=>(number_format(optional($storeDetail)->price)),
            'class'=>'form-control blue-store number-format',
            'autocomplete'=>'off'])
        ->endTd()
        ->startTd()
        ->select($this->unitPrice, [
            'name'=>'unit_price[]',
            'class'=>'form-control blue-store number-format',
        ], isset($storeDetail->unit) ? optional($storeDetail->unit)->id : '')
        ->endTd()
        ->startTd()
        ->endTd();

    }
}
