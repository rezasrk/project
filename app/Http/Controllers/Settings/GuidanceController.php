<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Models\Guidance;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GuidanceController extends Controller
{
    public function index()
    {
        $guidances = Guidance::query()->get();

        return view('settings.guidance',compact('guidances'));
    }

    public function store(Request $request)
    {
        DB::beginTransaction();

        $guidance =  Guidance::query()->create([
                'subject'=>$request->input('subject'),
                'description'=>$request->input('description')
            ]);

        if($request->has('image')){
            $image = $request->file('image')->store('guidance','public');
            $guidance->update(['path'=>$image]);
        }

        DB::commit();

        return response()->json([
            'status'=>JsonResponse::HTTP_OK,
            'msg'=>trans('message.success-store')
        ]);
    }

    public function destroy($id)
    {
        Guidance::query()->findOrFail($id)->delete();

        return response()->json([
            'status'=>JsonResponse::HTTP_OK,
            'msg'=>trans('message.success-delete')
        ]);
    }
}
