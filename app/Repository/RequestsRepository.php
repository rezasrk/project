<?php

namespace App\Repository;

use \App\Models\Supply\Request as RQ;
use App\Services\Morilog\Morilog;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class RequestsRepository
{
    private $morilog;

    public function __construct(Morilog $morilog)
    {
        $this->morilog = $morilog;
    }

    public function requestList($request): Builder
    {
        $data = RQ::query()
            ->with(['stat', 'typ', 'user'])
            ->where('project_id','=',projectInf()->id)
            ->latest();

        if ($request->filled('category_title')) {
            $data = $data->whereIn('id', $this->categoryNameFilter($request));
        }

        if ($request->filled('creator_name')) {
            $data = $data->where('creator_id', '=', $request->creator_name);
        }

        if ($request->filled('subject')) {
            $data = $data->where('subject', 'like', '%' . $request->subject . '%');
        }

        if ($request->filled('request_code')) {
            $data = $data->where('code', 'like', '%' . $request->request_code . '%');
        }

        if ($request->filled('start_date')) {
            $data = $data->where('created_at', '>=', $this->morilog->jalaliToGregorian($request->start_date));
        }

        if ($request->filled('end_date')) {
            $data = $data->where('created_at', '<=', $this->morilog->jalaliToGregorian($request->end_date));
        }

        return $data;
    }

    protected function categoryNameFilter($request): array
    {
        return DB::table('request_details')
            ->join('categories', 'categories.id', '=', 'request_details.category_id')
            ->whereRaw("
            replace(completeCategoryTitle(categories.id),'',' ') like ?
        ", ['%' . str_replace(' ', '', $request->category_title) . '%'])
            ->get()->pluck('request_id')->toArray();
    }
}
