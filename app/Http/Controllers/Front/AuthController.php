<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\Front\LoginRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(LoginRequest $request): JsonResponse
    {
        $attempt = Auth::guard('front')->attempt([
            'email' => $request->input('username'),
            'password' => $request->input('password')
        ]);

        if ($attempt) {
            return response()->json([
                'status' => JsonResponse::HTTP_OK,
                'msg' => 'اطلاعات وارد شده تایید شد لطفا منتظر بمانید .',
                'url' => route('front.profile')
            ]);
        }

        return response()->json([
            'status' => JsonResponse::HTTP_UNAUTHORIZED,
            'msg' => 'اطلاعات وارد شده صحیح نمی باشد ',
        ]);
    }

    public function logout(): \Illuminate\Http\RedirectResponse
    {
        Auth::guard('front')->logout();
        return redirect()->to('/');
    }
}
