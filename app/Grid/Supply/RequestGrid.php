<?php

namespace App\Grid\Supply;

use App\Services\Html\ManagementColumn;
use App\Services\Morilog\Morilog;
use SrkGrid\GridView\BaseGrid;
use SrkGrid\GridView\GridView;

class RequestGrid implements BaseGrid
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
        $request = trans('validation.attributes');

        $morilog = $parameters['morilog'];

        $management = $parameters['managementColumn'];
        return $grid->headerColumns([
            ['head' => $request['select']],
            ['head' => $request['code']],
            ['head' => $request['subject']],
            ['head' => $request['request_status']],
            ['head' => $request['request_type']],
            ['head' => $request['applicant_name']],
            ['head' => $request['creator']],
            ['head' => $request['created_at']],
            ['head' => $request['management-grid']],
        ])
            ->rowIndex()
            ->addColumns(function ($query) use ($management) {
                return $management->getRowHtml()->input('checkbox', ['class' => 'select-action', 'value' => $query->id])->getHtml();
            })
            ->addColumns('code')
            ->addColumns('subject')
            ->addColumns(function ($query) use ($management) {
                return $management->getRowHtml()->startSpan(['style' => 'color:' . trans('request_status.' . $query->status . '.color')], $query->request_status)->endSpan()->getHtml();
            })
            ->addColumns(function ($query) {
                return $query->request_type;
            })
            ->addColumns('applicant_name')
            ->addColumns(function ($query) {
                return optional($query->user)->name;
            })
            ->addColumns(function ($query) use ($morilog) {
                return $morilog->gregorianToJalali($query->created_at);
            })
            ->addColumns(function ($query) use ($management) {
                $management
                    ->customAction([
                            'class' => 'fa fa-pencil-alt  edit-request pointer',
                        'data-url' => route('request.edit', $query->id),
                        'title' => 'ویرایش'
                    ], '', 'edit-request')
                    ->customAction([
                        'class' => 'text-info pointer warehouse',
                        'data-url' => route('supply.detail.index') . '?request_id=' . $query->id,
                        'title' => 'انبار'
                    ], 'MRS', 'action-warehouse-requests')
                    ->customAction([
                        'class' => 'fa fa-upload  pointer attachment',
                        'data-url' => route('action.attachmentform') . '?request_id=' . $query->id,
                        'title' => 'آپلود فایل'
                    ], '', 'upload-document-requests')
                    ->customAction([
                        'class' => 'fa fa-print text-dark pointer',
                        'href' => route('action.requestPrint') . '?request_id=' . $query->id,
                        'title' => 'چاپ درخواست'
                    ], '', 'print_request')
                    ->customAction([
                        'class' => 'fa fa-comment request-comment text-dark pointer',
                        'data-url' => route('action.requestCommentForm') . '?request_id=' . $query->id,
                        'title' => 'یادداشت'
                    ]);

                return $management->getAction();
            })
            ->renderGrid();
    }
}
