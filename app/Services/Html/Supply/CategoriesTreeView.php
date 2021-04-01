<?php


namespace App\Services\Html\Supply;

use Illuminate\Support\Facades\DB;

class CategoriesTreeView extends Html
{
    public function html($data,$select)
    {
        $category = $this->rowHtml->startUl();
        $canCreateCategories = auth()->user()->can('create-categories');
        $canEditCategories = auth()->user()->can('edit-categories');
        $canTransferCategory = auth()->user()->can('transfer-category');

        collect($data)->each(function ($top) use (&$category, $canCreateCategories, $canEditCategories, $canTransferCategory,$select) {
            $category = $category->startLi()->startA(['data-id' => $top->id]);
            if ($canCreateCategories) {
                $category->i([
                    'title' => 'اضافه کردن زیر کدینگ ',
                    'class' => 'fas fa-plus-circle add-categories text-success pointer',
                    'data-url-create' => route('categories.create') . '?parent_id=' . $top->id
                ]);
            }
            if ($canEditCategories) {
                $category = $category->i([
                    'title' => 'ویرایش کدینگ',
                    'class' => 'fa fa-pencil-alt edit-categories text-primary pointer',
                    'data-url-edit' => route('categories.edit', $top->id)
                ]);

            }
            $category->startSpan(['class' => 'open-tree-category pointer'])
                ->i(['class' => 'far fa fa-folder-open ic-w mx-1']);
            if ($canTransferCategory) {
                $category = $category->input('checkbox', ['class'=>'checkbox','value' => $top->id]);
            }

            $category->endSpan()
                ->startSpan(['class'=>in_array($top->id,$select) ? 'text-danger' : ''],$top->category_title)
                ->endSpan()
                ->i([
                    'title' => 'نمایش زیر کدینگ',
                    'class' => 'text-danger fas fa-angle-left right pointer show-child',
                    'data-url-index' => route('categories.index') . '?parent_id=' . $top->id
                ])
                ->endA()->endLi();
        });
        return $category->endUl()->getHtml();
    }

}
