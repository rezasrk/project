<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\Front\InfoRequest;
use App\Http\Requests\Front\PublisherRequest;
use App\Models\Baseinfo;
use App\Models\Publisher;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:front', 'verify_email']);
    }

    public function info()
    {
        $data = [
            'type' => 'info',
            'info' => auth()->guard('front')->user(),
            'degree' => Baseinfo::type('degree'),
            'scientific_rank' => Baseinfo::type('scientific_rank')
        ];

        return view('front.profile.profile', $data);
    }


    protected function infoStore(InfoRequest $request): JsonResponse
    {
        auth()->user()->update([
            'name' => $request->input('name'),
            'degree' => $request->input('degree'),
            'website' => $request->input('website'),
            'email' => $request->input('email'),
        ]);

        if ($request->has('image')) {
            $imagePath = $request->file('image')->store('profile', 'public');
            auth()->user()->update(['image' => $imagePath]);
        }


        return response()->json([
            'status' => JsonResponse::HTTP_OK,
            'msg' => trans('message.success-store'),
        ]);
    }

    public function publisher()
    {
        $data = [
            'type' => 'publisher',
            'publisher' => Publisher::query()->where('creator_id', auth()->id())->first(),
            'rank_requester' => Baseinfo::type('rank_requester'),
            'degree_publisher' => Baseinfo::type('degree_publisher'),
            'license_from' => Baseinfo::type('license_from'),
        ];
        return view('front.profile.profile', $data);
    }

    public function publisherStore(PublisherRequest $request): JsonResponse
    {
        $publisher = Publisher::query()->updateOrCreate([
            'id' => $request->publisher_id,
            'creator_id' => auth()->id()
        ], [
            'publisher_title' => $request->input('publisher_title'),
            'owner_publisher' => $request->input('owner_publisher'),
            'requester' => $request->input('requester'),
            'rank_requester' => $request->input('rank_requester'),
            'degree_publisher' => $request->input('degree_publisher'),
            'license_from' => $request->input('license_from'),
            'publisher_phone' => $request->input('publisher_phone'),
            'publisher_email' => $request->input('publisher_email'),
            'publisher_web_site' => $request->input('publisher_web_site'),
            'creator_id' => auth('front')->id()
        ]);
        if ($request->has('publisher_logo')) {
            $publisher_logo_path = $request->file('publisher_logo')->store('publisher', 'public');
            $publisher->update(['publisher_logo' => $publisher_logo_path]);
        }
        if ($request->has('publisher_license_image')) {
            $publisher_license_image_path = $request->file('publisher_license_image')->store('publisher', 'public');
            $publisher->update(['publisher_license_image' => $publisher_license_image_path]);
        }
        if ($request->has('publisher_letter')) {
            $publisher_letter_path = $request->file('publisher_letter')->store('publisher', 'public');
            $publisher->update(['publisher_letter' => $publisher_letter_path]);
        }

        return response()->json([
            'status' => JsonResponse::HTTP_OK,
            'msg' => trans('message.success-store')
        ]);
    }


}
