<?php

namespace App\Services\Html\Supply;

class MivForm extends Html
{
    public function html($parameters)
    {
        return $this->rowHtml->startForm(['action'=>route('miv.store'),'method'=>'post'])
                    ->input('hidden', ['name'=>'category_id','value'=>$parameters['category_id'],])
                    ->startDiv(['class'=>'row sample-miv'])
                    ->startDiv(['class'=>'col'])
                    ->label('مقدار')
                    ->input('text', ['class'=>'form-control','name'=>'amount[]','autocomplete'=>'off'])
                    ->endDiv()
                    ->startDiv(['class'=>'col'])
                    ->label('شماره')
                    ->input('text', ['class'=>'form-control','name'=>'request_detail_no[]','autocomplete'=>'off'])
                    ->endDiv()
                    ->startDiv(['class'=>'col'])
                    ->label('تاریخ')
                    ->input('text', ['class'=>'form-control datepicker','name'=>'date[]','autocomplete'=>'off'])
                    ->endDiv()
                    ->endDiv()
                    ->br()
                    ->startDiv(['class'=>'row'])
                    ->startDiv(['class'=>'col'])
                    ->button(['class'=>'btn btn-info request-ajax-form'], 'ثبت miv')
                    ->button(['class'=>'btn btn-warning add-form','type'=>'button'], trans('button.add-input'))
                    ->button(['class'=>'btn btn-danger remove-form','type'=>'button'], trans('button.remove-input'))
                    ->endDiv()
                    ->endDiv()
                    ->endForm()
                    ->br()
                    ->getHtml();
    }
}
