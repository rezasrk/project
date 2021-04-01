<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\JsonResponse;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function captcha()
    {
        if (request()->ajax()) {
            return captcha_img();
        }
    }


    public function projectSwitch(Request $request)
    {
        $project = DB::table('projects')
            ->selectRaw("projects.*")
            ->join('user_projects', 'user_projects.project_id', '=', 'projects.id')
            ->join('users', 'user_projects.user_id', '=', 'users.id')
            ->where('user_id', '=', auth()->user()->id)
            ->where('project_id', '=', $request->project_id)
            ->where('projects.is_active', 1)
            ->first();

        if ($project) {
            setProjectInf($project);
            return response()->json(['status' => JsonResponse::HTTP_OK, 'msg' => 'لطفا منتظر بمانید...']);
        } else {
            return response()->json(['status' => JsonResponse::HTTP_FORBIDDEN, 'msg' => 'شما دسترسی به این پروژه ندارید !']);
        }
    }
}
