<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\Front\ContactRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    public function index()
    {
        $address = DB::table('settings')->where('key', 'address')->first();
        $phone = DB::table('settings')->where('key', 'phone')->first();
        $mobile = DB::table('settings')->where('key', 'mobile')->first();
        $post_code = DB::table('settings')->where('key', 'post_code')->first();
        $hours = DB::table('settings')->where('key', 'hours')->first();
        $email = DB::table('settings')->where('key', 'email')->first();

        return view('front.contact', compact('email', 'address', 'phone', 'mobile', 'post_code', 'hours'));
    }

    public function store(ContactRequest $request): JsonResponse
    {
        DB::table('contacts')->insert([
            'name' => $request->input('name'),
            'mobile' => $request->input('mobile'),
            'email' => $request->input('email'),
            'subject' => $request->input('subject'),
            'message' => $request->input('message'),
        ]);

        return response()->json([
            'status' => JsonResponse::HTTP_OK,
            'msg' => trans('message.success-store')
        ]);
    }
}
