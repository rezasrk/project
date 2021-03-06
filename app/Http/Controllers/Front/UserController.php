<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function update(Request $request): JsonResponse
    {
        auth()->user()->update([
            'name'=>$request->input('name'),
            'degree'=>$request->input('degree'),
            'scientific_rank'=>$request->input('scientific_rank'),
            'email'=>$request->input('email'),
            'web_site'=>$request->input('web_site'),
        ]);

        return response()->json([
            'status'=>JsonResponse::HTTP_OK,
            'msg'=>trans('message.success-update')
        ]);
    }
}
