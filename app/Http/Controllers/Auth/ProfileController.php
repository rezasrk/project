<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChangeInformationProfileRequest;
use App\Http\Requests\ChangePasswordProfileRequest;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class ProfileController extends Controller
{
    /**
     * Show user profile
     */
    public function showProfile()
    {
        return view('auth.profile');
    }

    /**
     * @param ChangeInformationProfileRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function changeInformation(ChangeInformationProfileRequest $request)
    {
        auth()->user()->update([
            'name' => $request->name,
            'username' => $request->username,
        ]);

        return response()->json(['status' => JsonResponse::HTTP_OK, 'msg' => trans('message.success-change-information')]);
    }

    /**
     * @param ChangePasswordProfileRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function changePassword(ChangePasswordProfileRequest $request)
    {
        auth()->user()->update(['password' => bcrypt($request->password)]);

        return response()->json(['status' => JsonResponse::HTTP_OK, 'msg' => trans('message.success-change-information')]);
    }
}
