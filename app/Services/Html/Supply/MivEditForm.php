<?php

namespace App\Services\Html\Supply;

class MivEditForm extends Html
{
    public function html($parameters)
    {
        $storeDetail = $parameters['storeDetail'];
        
        return $this->rowHtml->startForm(['action'=>route('miv.update', $storeDetail->id),'method'=>'post'])
                    ->startDiv(['class'=>'row sample-miv'])
                    ->startDiv(['class'=>'col'])
                    ->label('مقدار')
                    ->input('text', [
                            'value'=>$storeDetail->amount,
                            'class'=>'form-control',
                            'name'=>'amount','autocomplete'=>'off'
                        ])
                    ->endDiv()
                    ->startDiv(['class'=>'col'])
                    ->label('شماره')
                    ->input('text', [
                            'value'=>$storeDetail->request_detail_no,
                            'class'=>'form-control',
                            'name'=>'request_detail_no',
                            'autocomplete'=>'off'
                        ])
                    ->endDiv()
                    ->startDiv(['class'=>'col'])
                    ->label('تاریخ')
                    ->input('text', [
                            'class'=>'form-control datepicker',
                            'name'=>'date','autocomplete'=>'off',
                            'value'=>$storeDetail->date
                        ])
                    ->endDiv()
                    ->endDiv()
                    ->br()
                    ->startDiv(['class'=>'row'])
                    ->startDiv(['class'=>'col'])
                    ->button(['class'=>'btn btn-info request-ajax-form'], 'ویرایش miv')
                    ->endDiv()
                    ->endDiv()
                    ->endForm()
                    ->br()
                    ->getHtml();
    }
}
