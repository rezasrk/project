<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InformationController extends Controller
{
    public function index()
    {
        $address = DB::table('settings')->where('key', 'address')->first();
        $phone = DB::table('settings')->where('key', 'phone')->first();
        $mobile = DB::table('settings')->where('key', 'mobile')->first();
        $post_code = DB::table('settings')->where('key', 'post_code')->first();
        $hours = DB::table('settings')->where('key', 'hours')->first();
        $email = DB::table('settings')->where('key', 'email')->first();

        return view('settings.information',compact('email','address','phone','mobile','post_code','hours'));
    }

    public function store(Request $request): JsonResponse
    {
        DB::table('settings')->where('key', 'address')->update(['value' => $request->address]);
        DB::table('settings')->where('key', 'phone')->update(['value' => $request->phone]);
        DB::table('settings')->where('key', 'mobile')->update(['value' => $request->mobile]);
        DB::table('settings')->where('key', 'post_code')->update(['value' => $request->post_code]);
        DB::table('settings')->where('key', 'hours')->update(['value' => $request->hours]);
        DB::table('settings')->where('key', 'email')->update(['value' => $request->email]);

        return response()->json([
            'status' => JsonResponse::HTTP_OK,
            'msg' => trans('message.success-store')
        ]);
    }
}
