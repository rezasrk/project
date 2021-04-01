<?php


namespace App\Services\Html\Supply;

class AttachmentForm extends Html
{
    public function html($parameter)
    {
        return $this->rowHtml->startForm(['action'=>route('action.attachment'),'method'=>'post'])
        ->input('hidden', ['name'=>'request_id','value'=>request('request_id')])
        ->startDiv(['class'=>'row sample-upload-form'])
        ->startDiv(['class'=>'col'])
        ->label(trans('validation.attributes.type_attachment'))
        ->select($parameter['type'], ['name'=>'type[]','class'=>'form-control'])
        ->endDiv()
        ->startDiv(['class'=>'col'])
        ->label(trans('validation.attributes.attachment'))
        ->input('file', ['name'=>'attachment[]'])
        ->endDiv()
        ->endDiv()
        ->br()
        ->button(['class'=>'btn btn-info request-ajax-form'], trans('button.upload'))
        ->button(['class'=>'btn btn-warning add-upload-form','type'=>'button'], trans('button.add-input'))
        ->button(['class'=>'btn btn-danger remove-upload-form','type'=>'button'], trans('button.remove-input'))
        ->endForm()
        ->getHtml();
    }
}
