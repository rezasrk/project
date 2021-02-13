<?php


namespace App\Repository;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WarehouseRepository
{
    public function query()
    {
        $projectId = projectInf()->id;

        $warehouse = DB::table('categories')
            ->selectRaw("
            completeCategoryTitle(categories.id) as complete_title,ifnull(mrs,0) as mrs,ifnull(miv,0) as miv,
            ifnull(mrv,0) as mrv,categories.id as id,unit.value as unit_val,project_id,categories.id as categoryId,
            discipline.value as discipline_val,unit.id as unit_id,discipline.id as discipline_id,
            (ifnull(mrs,0) + ifnull(mrv,0)) - ifnull(miv,0) as exists_warehouse
        ")->join(DB::raw("(
            select sum(amount) as mrs,category_id from store_details
            where store_details.type = 'MRS' and store_details.request_detail_id in (select id from request_details)
            and project_id={$projectId}
            group by category_id
            ) as storMrs
            "), 'storMrs.category_id', '=', 'categories.id')
            ->leftJoin(DB::raw("(
            select sum(amount) as miv,category_id from store_details
            where store_details.type = 'MIV' and project_id={$projectId}
            group by category_id
            ) as storMiv
            "), 'storMiv.category_id', '=', 'categories.id')
            ->leftJoin(DB::raw("(
            select sum(amount) as mrv,category_id from store_details
            where store_details.type = 'MRV' and project_id={$projectId}
            group by category_id
            ) as storMrv
            "), 'storMrv.category_id', '=', 'categories.id')
            ->leftJoin('baseinfos as unit', 'unit.id', '=', 'categories.unit_id')
            ->leftJoin('baseinfos as discipline', 'discipline.id', '=', 'categories.discipline_id');

        return $warehouse;
    }


    public function filter(Request $request)
    {
        $warehouse = $this->query();

        if ($request->filled('category_title')) {
            $warehouse = $this->query()->whereRaw("replace(replace(completeCategoryTitle(categories.id),' ',''),'-','') like ?",
                ['%' . str_replace(' ', '', $request->category_title) . '%']
            );
        }

        if ($request->filled('category_id')) {
            $warehouse = $this->query()->where('categories.id', '=', $request->category_id);
        }

        return $warehouse;
    }
}
