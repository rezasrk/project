<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\Front\InfoRequest;
use App\Http\Requests\JournalRequest;
use App\Models\Baseinfo;
use App\Models\Journal;
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

    public function journal()
    {
        $data = [
            'type' => 'journal',
            'journal' => Journal::query()->where('creator_id', auth()->id())->first(),
            'rank_requester' => Baseinfo::type('rank_requester'),
            'degree_journal' => Baseinfo::type('degree_journal'),
            'license_from' => Baseinfo::type('license_from'),
        ];
        return view('front.profile.profile', $data);
    }

    public function journalStore(JournalRequest $request): JsonResponse
    {
        $journal = Journal::query()->updateOrCreate([
            'id' => $request->journal_id,
            'creator_id' => auth()->id()
        ], [
            'journal_title' => $request->input('journal_title'),
            'owner_journal' => $request->input('owner_journal'),
            'requester' => $request->input('requester'),
            'rank_requester' => $request->input('rank_requester'),
            'degree_journal' => $request->input('degree_journal'),
            'license_from' => $request->input('license_from'),
            'journal_phone' => $request->input('journal_phone'),
            'journal_email' => $request->input('journal_email'),
            'journal_web_site' => $request->input('journal_web_site'),
            'creator_id' => auth('front')->id()
        ]);
        if ($request->has('journal_logo')) {
            $journal_logo_path = $request->file('journal_logo')->store('journal', 'public');
            $journal->update(['journal_logo' => $journal_logo_path]);
        }
        if ($request->has('journal_license_image')) {
            $journal_license_image_path = $request->file('journal_license_image')->store('journal', 'public');
            $journal->update(['journal_license_image' => $journal_license_image_path]);
        }
        if ($request->has('journal_letter')) {
            $journal_letter_path = $request->file('journal_letter')->store('journal', 'public');
            $journal->update(['journal_letter' => $journal_letter_path]);
        }

        return response()->json([
            'status' => JsonResponse::HTTP_OK,
            'msg' => trans('message.success-store')
        ]);
    }


}
