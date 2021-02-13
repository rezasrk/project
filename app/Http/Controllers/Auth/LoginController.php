<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use App\Http\Requests\Auth\LoginRequest;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;

class LoginController extends Controller
{
    public function loginForm()
    {
        if (auth()->check()) {
            return redirect()->route('dashboard');
        }

        $projects = Project::query()->get();

        return view('auth.login',compact('projects'));
    }

    public function login(LoginRequest $request): JsonResponse
    {
        return ($this->attempt($request)) ?
            response()->json(
                [
                    'status' => JsonResponse::HTTP_OK,
                    'msg' => trans('message.success-login'),
                    'url' => route('dashboard')
                ]
            ) :
            response()->json([
                'status' => JsonResponse::HTTP_UNAUTHORIZED,
                'msg' => trans('message.fail-login')
            ]);
    }


    public function logout(): RedirectResponse
    {
        Auth::logout();

        return redirect()->to('/');
    }

    /*
     * Attempt for login
     */
    private function attempt($request): bool
    {
        if (filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
            return $this->checkUser('email', $request->email, $request->password, $request->project_id);
        } else {
            return $this->checkUser('username', $request->email, $request->password, $request->project_id);
        }
    }

    /*
     * Check user exists
     */
    public function checkUser(string  $typeUser = "",string  $username = "",string  $password = "",string  $project = ""): bool
    {
        $user = User::query()->where($typeUser, '=', $username)->first();
        $projectInformation = null;
        if (Hash::check($password, $user->password)) {

            if ($projectInformation = $user->projects()->where('id', '=', $project)->first()) {
                Auth::loginUsingId($user->id);
                session(['projectInformation'=>$projectInformation]);
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}
