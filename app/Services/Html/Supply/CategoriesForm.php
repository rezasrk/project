<?php


namespace App\Services\Html\Supply;

class CategoriesForm extends Html
{
    public function html($parameter)
    {
        return $this->rowHtml
            ->startForm(['action' => route('categories.store'), 'method' => 'post'])
            ->input('hidden', ['name' => 'category_parent_id', 'value' => $parameter['parent_id']])
            ->startDiv(['class' => 'row category-sample'])
            ->startDiv(['class' => 'col mt-4'])
            ->checkbox(['name' => 'is_product[]'])
            ->label($this->label['is_product'])
            ->endDiv()
            ->startDiv(['class' => 'col'])
            ->label($this->label['category_title'])
            ->input('text', ['name' => 'category_title[]', 'class' => 'form-control', 'autocomplete' => 'off'])
            ->endDiv()
            ->startDiv(['class' => 'col'])
            ->label($this->label['discipline'])
            ->select($parameter['discipline'], ['class' => 'form-control', 'name' => 'discipline_id[]'])
            ->endDiv()
            ->startDiv(['class' => 'col'])
            ->label($this->label['unit_id'])
            ->select($parameter['unit'], ['class' => 'form-control', 'name' => 'unit_id[]'])
            ->endDiv()
            ->endDiv()
            ->br()
            ->startDiv(['class' => 'row'])->startDiv(['class' => 'col'])
            ->button(['class' => 'btn btn-info request-ajax-form'], trans('button.store-category'))
            ->button(['class' => 'btn btn-warning add-form', 'type' => 'button'], trans('button.add-input'))
            ->button(['class' => 'btn btn-danger remove-form', 'type' => 'button'], trans('button.remove-input'))
            ->endDiv()
            ->endDiv()
            ->endForm()
            ->getHtml();
    }
}
