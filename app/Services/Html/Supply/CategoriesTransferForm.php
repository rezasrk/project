<?php


namespace App\Services\Html\Supply;

class CategoriesTransferForm extends Html
{
    public function html()
    {
        return $this->rowHtml
            ->startDiv(['class' => 'row'])->startDiv(['class' => 'col'])
            ->label(trans('validation.attributes.category_parent_id'))
            ->select([], ['class' => 'form-control select2'])
            ->endDiv()->endDiv()
            ->br()
            ->startDiv(['class' => 'row'])->startDiv(['class' => 'col'])
            ->button(['type' => 'button', 'class' => 'btn btn-info ajax-transfer-categories'], trans('button.transfer-categories'))
            ->endDiv()->endDiv()->getHtml();
    }
}
