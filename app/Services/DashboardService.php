<?php


namespace App\Services;


use App\Models\Supply\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DashboardService
{
    public function projectRequestCount(int $projectId)
    {
        return DB::table('baseinfos')
            ->selectRaw('value,ifnull(countStatus,0) as countStatus')
            ->leftJoin(DB::raw("(
                    select count(*) as countStatus,status from requests
                    where requests.project_id = {$projectId}
                    group by requests.status
                ) condition_request
            "), "condition_request.status", "=", "baseinfos.id")
            ->where('baseinfos.type', '=', 'condition_request')
            ->where('parent_id', '<>', 0)
            ->get();

    }

    public function requestCount()
    {
        return DB::table('baseinfos')
            ->selectRaw('value,ifnull(countStatus,0) as countStatus')
            ->leftJoin(DB::raw("(
                    select count(*) as countStatus,status from requests
                    group by requests.status
                ) condition_request
            "), "condition_request.status", "=", "baseinfos.id")
            ->where('baseinfos.type', '=', 'condition_request')
            ->where('parent_id', '<>', 0)
            ->get();
    }
}
