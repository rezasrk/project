<?php


namespace App\Services\Html\Supply;


class CategoriesEditForm extends Html
{
    public function html($category, $parameter, $unit, $discipline)
    {
        return $this->rowHtml
            ->startForm(['action' => route('categories.update', $category->id), 'method' => 'post'])
            ->startDiv(['class' => 'row category-sample'])
            ->startDiv(['class' => 'col mt-4'])
            ->checkbox(['name' => 'is_product'], $category->is_product)
            ->label($this->label['is_product'])
            ->endDiv()
            ->startDiv(['class' => 'col'])
            ->label($this->label['category_title'])
            ->input('text', ['name' => 'category_title', 'value' => $category->category_title, 'class' => 'form-control', 'autocomplete' => 'off'])
            ->endDiv()
            ->startDiv(['class' => 'col'])
            ->label($this->label['discipline'])
            ->select($discipline, ['class' => 'form-control', 'name' => 'discipline_id'], $category->discipline_id)
            ->endDiv()
            ->startDiv(['class' => 'col'])
            ->label(trans('validation.attributes.unit_id'))
            ->select($unit, ['class' => 'form-control', 'name' => 'unit_id'], $category->unit_id)
            ->endDiv()
            ->endDiv()
            ->br()
            ->startDiv(['class' => 'row'])->startDiv(['class' => 'col'])
            ->button(['class' => 'btn btn-info request-ajax-form'], trans('button.edit-input'))
            ->button(['class' => 'btn btn-warning add-form', 'type' => 'button'], trans('button.add-input'))
            ->button(['class' => 'btn btn-danger remove-form', 'type' => 'button'], trans('button.remove-input'))
            ->patch()
            ->endDiv()
            ->endDiv()
            ->endForm()
            ->getHtml();
    }
}
