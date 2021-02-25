<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\Front\RegisterRequest;
use App\Mail\VerifyRegister;
use App\Models\User;
use App\Models\VerifyEmail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\JsonResponse;
use \Illuminate\Http\JsonResponse as Json;

class RegisterController extends Controller
{
    public function register(RegisterRequest $request): Json
    {
        DB::beginTransaction();

        /** @var User $user */
        $user = User::query()->create([
            'email' => $request->input('email'),
            'name' => $request->input('name'),
            'password' => bcrypt($request->input('password')),
        ]);

        $user->verifyEmail()->create(['token' => Str::random(190)]);

        DB::commit();

        Mail::to($user->email)->send(new VerifyRegister($user));

        return response()->json([
            'status' => JsonResponse::HTTP_OK,
            'msg' => trans('message.success-register')
        ]);
    }

    public function verify($token)
    {
        $verify = VerifyEmail::query()->where('token', '=', $token)->firstOrFail();

        if ((now()->timestamp - $verify->created_at->timestamp) / 60 < 60) {
            $verify->user()->update(['email_verified_at' => now()]);
            return redirect()->to('/');
        }
        return abort(404);
    }
}
