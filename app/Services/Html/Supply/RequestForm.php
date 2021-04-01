<?php


namespace App\Services\Html\Supply;

use App\Models\Supply\Request;

class RequestForm extends Html
{
    public function html($parameter = [])
    {
        $requestForm = $this->rowHtml->startForm(['action' => route('request.store')])
            ->startDiv(['class' => 'row'])
            ->startDiv(['class' => 'col'])
            ->label($this->label['subject'])
            ->input('text', ['name' => 'subject'])
            ->endDiv()
            ->startDiv(['class' => 'col'])
            ->label($this->label['applicant_name'])
            ->input('text', ['name' => 'applicant_name','autocomplete'=>'on'])
            ->endDiv();
        if ($parameter['showUnitRequester'] == 'true') {
            $requestForm = $requestForm->startDiv(['class' => 'col'])
                ->label($this->label['unit_requester_id'])
                ->select($parameter['unitRequester'], ['class' => 'form-control', 'name' => 'unit_requester_id'])
                ->endDiv();
        }

        $requestForm = $requestForm->startDiv(['class' => 'col'])
            ->label($this->label['request_type'])
            ->select([
                Request::TYPE['DL'] => 'تحویل',
                Request::TYPE['SP'] => 'تامین',
                Request::TYPE['IN'] => 'تامین در محل',
            ], ['class' => 'form-control', 'name' => 'type'])
            ->endDiv()
            ->endDiv()
            ->startDiv(['class' => 'row sample-send-request'])
            ->startDiv(['class' => 'col'])
            ->label($this->label['category_title'])
            ->select([], ['class' => 'form-control select2', 'name' => 'category_id[]'])
            ->endDiv()
            ->startDiv(['class' => 'col-md-2'])
            ->label($this->label['amount.*'])
            ->input('text', ['class' => 'form-control', 'name' => 'amount[]'])
            ->endDiv()
            ->startDiv(['class' => 'col-md-4'])
            ->label($this->label['description.*'])
            ->input('text', ['class' => 'form-control', 'name' => 'description[]'])
            ->endDiv()
            ->startDiv(['class' => 'col-md-1'])
            ->i(['class' => 'fa fa-trash text-danger mt-4 pointer remove-form'])
            ->endDiv()
            ->endDiv()
            ->br()
            ->startDiv(['class' => 'row'])
            ->startDiv(['class' => 'col'])
            ->button(['class' => 'btn btn-info request-ajax-form'], trans('button.create-request'))
            ->button(['class' => 'btn btn-warning add-form', 'type' => 'button'], trans('button.add-input'))
            ->endDiv()
            ->endDiv()
            ->endForm()
            ->getHtml();

        return $requestForm;
    }
}
