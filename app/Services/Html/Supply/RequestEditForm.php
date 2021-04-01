<?php


namespace App\Services\Html\Supply;

use App\Models\Supply\Request;

class RequestEditForm extends Html
{
    public function html(Request $rq, $parameter = [])
    {
        $sendRequest = $this->rowHtml->startForm(['action' => route('request.update', $rq->id)])
            ->patch()
            ->startDiv(['class' => 'row'])
            ->startDiv(['class' => 'col'])
            ->label($this->label['subject'])
            ->input('text', ['name' => 'subject', 'value' => $rq->subject])
            ->endDiv()
            ->startDiv(['class' => 'col'])
            ->label($this->label['applicant_name'])
            ->input('text', ['name' => 'applicant_name', 'autocomplete' => 'on', 'value' => $rq->applicant_name])
            ->endDiv();
        if ($parameter['showUnitRequester'] == 'true') {
            $sendRequest = $sendRequest->startDiv(['class' => 'col'])
                ->label($this->label['unit_requester_id'])
                ->select($parameter['unitRequester'], ['class' => 'form-control', 'name' => 'unit_requester_id'])
                ->endDiv();
        }
        $sendRequest->startDiv(['class' => 'col'])
            ->label($this->label['request_type'])
            ->select([
                Request::TYPE['DL'] => 'تحویل',
                Request::TYPE['SP'] => 'تامین',
                Request::TYPE['IN'] => 'تامین در محل',
            ], ['class' => 'form-control', 'name' => 'type'], $rq->type)
            ->endDiv()
            ->endDiv();

        collect($rq->details)->each(function ($request) use ($sendRequest) {
            $equipment = ($request->category()->get()->pluck('category_title', 'id')->toArray());
            $sendRequest->startDiv(['class' => 'row sample-send-request'])
                ->input('hidden', ['name' => 'request_detail_id[]', 'value' => $request->id])
                ->startDiv(['class' => 'col-md-4'])
                ->label($this->label['category_title'])
                ->select($equipment, ['class' => 'form-control select2', 'name' => 'category_id[]'], $request->category_id)
                ->endDiv()
                ->startDiv(['class' => 'col-md-3'])
                ->label($this->label['amount.*'])
                ->input('text', ['class' => 'form-control', 'name' => 'amount[]', 'value' => $request->amount])
                ->endDiv()
                ->startDiv(['class' => 'col-md-4'])
                ->label($this->label['description.*'])
                ->input('text', ['class' => 'form-control', 'name' => 'description[]', 'value' => $request->description])
                ->endDiv()
                ->endDiv();
        });


        return $sendRequest->br()
            ->startDiv(['class' => 'row'])
            ->startDiv(['class' => 'col'])
            ->button(['class' => 'btn btn-info request-ajax-form'], trans('button.edit-request'))
            ->button(['class' => 'btn btn-warning add-form', 'type' => 'button'], trans('button.add-input'))
            ->endDiv()
            ->endDiv()
            ->endForm()
            ->getHtml();
    }
}
