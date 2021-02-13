<?php


namespace App\Repository;


use App\Models\Supply\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class CategoriesSearchRepository
{
    public function type(Request $request): Collection
    {
        if ($request->last_title) {
            return $this->lastTitle($request);
        } elseif ($request->simple) {
            return $this->simple($request);
        }
        return $this->fullTitle($request);
    }

    protected function fullTitle(Request $request): Collection
    {
        return DB::table('categories')
            ->selectRaw("
                completeCategoryTitle(categories.id) as text,
                categories.id as id
                ")
            ->whereRaw("
                replace(completeCategoryTitle(categories.id),' ', '') like ?", [
                '%' . str_replace(' ', '', $request->term) . '%'
            ])->limit(30)
            ->get();
    }

    protected function lastTitle(Request $request): Collection
    {
        return DB::table('categories')
            ->selectRaw("
                categories.category_title as text,
                categories.id as id
                ")
            ->whereRaw("
                replace(completeCategoryTitle(categories.id),' ', '') like ?", [
                '%' . str_replace(' ', '', $request->term) . '%'
            ])->limit(30)
            ->get();
    }

    public function simple(Request $request): Collection
    {
        return Category::query()
            ->selectRaw('category_title as text , id ')
            ->where('category_title', 'like', '%' . $request->term . '%')
            ->get();
    }
}
