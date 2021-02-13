<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use App\Services\Morilog\Morilog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SupplyReportController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:warehouse-report']);
    }
    public function warehouse(Request $request, Morilog $morilog)
    {
        $categories = null;
        if ($request->query('type') == 'MIV') {
            $categories = $this->miv($request, $morilog);
        } elseif ($request->query('type') == 'MRS') {
            $categories = $this->mrs($request, $morilog);
        }

        if ($request->query('print') == true && $request->query('type')) {
            return view('supply.reports.print.'.strtolower($request->query('type')), compact('categories'));
        }
        return view('supply.reports.warehouse', compact('categories'));
    }

    protected function miv($request, $morilog)
    {
        $projectId = projectInf()->id;

        $storeDetail = "
            select sum(store_details.amount) as cnt,category_id from store_details
            where store_details.type = 'MIV' and project_id = {$projectId}
        ";

        if ($request->filled('s_date')) {
            $storeDetail .= " and date >= " ."'". $morilog->jalaliToGregorian($request->s_date) ."'";
        }

        if ($request->filled('e_date')) {
            $storeDetail .= " and date <= "."'". $morilog->jalaliToGregorian($request->e_date)."'";
        }


        $categories = DB::table('categories')
        ->selectRaw("
            completeCategoryTitle(categories.id) as complete_category,cnt,
            code,unit.value as unit_value,discipline.value as discipline_value,
            discipline.id as discipline_id , unit.id as unit_id
        ")
        ->leftjoin('baseinfos as unit', 'unit.id', '=', 'unit_id')
        ->leftjoin('baseinfos as discipline', 'discipline.id', '=', 'discipline_id')
        ->join(
            DB::raw("(".$storeDetail." group by category_id ) as type"),
            'type.category_id',
            '=',
            'categories.id'
        )->get();

        return $categories;
    }

    protected function mrs($request, $morilog)
    {
        $categories = DB::table('store_details')
                ->selectRaw(
                    '
                            categories.code as code,completeCategoryTitle(categories.id) as complete_category,store_details.amount,
                            requests.code as request_code,unit.value as unit_value,discipline.value as discipline_value,
                            discipline.id as discipline_id , unit.id as unit_id
                            '
                )
                ->join('categories', 'categories.id', '=', 'store_details.category_id')
                ->join('request_details','request_details.id','=','store_details.request_detail_id')
                ->join('requests','requests.id','=','request_details.request_id')
                ->leftjoin('baseinfos as unit', 'unit.id', '=', 'unit_id')
                ->leftjoin('baseinfos as discipline', 'discipline.id', '=', 'discipline_id')
                ->where('store_details.project_id','=',projectInf()->id)
                ->where('store_details.type', '=', 'MRS')->orderBy('categories.id');

        if ($request->filled('s_date')) {
            $categories = $categories->where('store_details.date', '>=', $morilog->jalaliToGregorian($request->query('s_date')));
        }

        if ($request->filled('e_date')) {
            $categories = $categories->where('store_details.date', '<=', $morilog->jalaliToGregorian($request->query('e_date')));
        }

        return $categories->get();
    }
}
