<?php

namespace App\Http\Controllers\Supply;

use App\Http\Controllers\Controller;
use App\Http\Requests\Supply\AttachmentRequest;
use App\Models\Attachment;
use App\Models\Baseinfo as Base;
use App\Models\RequestComment;
use App\Models\Supply\Request as RQ;
use App\Models\User;
use App\Services\BaseInfo;
use App\Services\Morilog\Morilog;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\JsonResponse;
use Illuminate\Http\JsonResponse as Json;

class RequestActionController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:upload-document-requests')->only(['attachment', 'attachmentForm']);
        $this->middleware('permission:assign-request')->only(['assign', 'getUser', 'assignForm']);
        $this->middleware('permission:show-request-file')->only(['getFile']);
        $this->middleware('permission:print_request')->only(['requestPrint']);
        $this->middleware('permission:assign-request')->only(['assignUser']);
    }

    public function action($id, BaseInfo $baseInfo, Request $request): Json
    {
        if ($request->has('ids') && is_array($request->ids)) {
            $permission = $baseInfo->getExtra($id)->permission;
            $this->middleware('permission:' . $permission);
            RQ::query()->whereIn('id', $request->ids)->update(['status' => $id]);
        }


        return response()->json([
            'status' => 200,
            'msg' => trans('message.success-store')
        ]);
    }

    public function assignUser(Request $request): Json
    {
        if ($request->has('ids') && is_array($request->ids)) {
            $req = RQ::query()->whereIn('id', $request->ids);
            $req->update([
                'assign_id' => $request->user,
                'status' => 94
            ]);
        }

        return response()->json([
            'status' => JsonResponse::HTTP_OK,
            'msg' => trans('message.success-store')
        ]);
    }

    public function attachmentShow(Request $request): Json
    {
        if ($request->filled('request_id')) {
            $types = Base::type('typeAttachment');

            $requestId = $request->request_id;

            $files = RQ::query()->findOrFail($requestId)
                ->attachments()
                ->orderBy('id', 'desc')
                ->get();

            $attach = null;
            if ($request->filled('file_id')) {
                $attach = Attachment::query()->findOrFail($request->file_id);
            }

            return response()->json([
                'status' => JsonResponse::HTTP_OK,
                'data' => view('supply.requests.partials.upload', compact(
                    'types', 'requestId', 'files', 'attach'
                ))->render()
            ]);
        }

    }


    public function attachment(AttachmentRequest $request): Json
    {
        $rq = RQ::query()->findOrFail($request->request_id);

        if ($request->file_id == 0 && $request->hasFile('attachment')) {
            $path = ($request->file('attachment')->store('supply'));
            $request->request->add(['path' => $path]);
        }


        $rq->attachments()->updateOrCreate(['id' => $request->file_id], $request->all());


        return response()->json(['status' => JsonResponse::HTTP_OK, 'msg' => trans('message.success-store')]);
    }


    public function assign(Request $request): Json
    {
        if (count($request->id)) {
            RQ::query()->whereIn('id', $request->id)
                ->where('status', '=', RQ::STATUS['AC'])
                ->update(['assign_id' => $request->user_id, 'status' => RQ::STATUS['IN']]);
        }


        return response()->json(['status' => JsonResponse::HTTP_OK, 'msg' => trans('message.request-assign-success')]);
    }

    public function getUser(Request $request): Json
    {
        $data = User::query()
            ->selectRaw("name as text,id")
            ->whereRaw("replace(name,' ','') like ? ", ['%' . str_replace(' ', '', $request->term) . '%'])
            ->get();

        return response()->json(['status' => JsonResponse::HTTP_OK, 'data' => $data]);
    }

    public function assignForm(): Json
    {
        $view = view('supply.requests.partials.assign');

        return response()->json(['status' => JsonResponse::HTTP_OK, 'data' => $view->render()]);
    }

    public function requestPrint(Request $request, Morilog $morilog): View
    {
        $rq = RQ::query()->with(['details.category', 'stat', 'typ'])->find($request->request_id);

        return view('supply.requests.print', compact('rq', 'morilog'));
    }

    public function commentForm(Request $request): Json
    {
        $requestId = $request->request_id;

        $rq = RQ::query()->with(['comments.creator'])->findOrFail($requestId);


        return response()->json([
            'status' => 200,
            'data' => view('supply.requests.partials.comment', compact('requestId', 'rq')
            )->render()]);
    }

    public function comment(Request $request)
    {
        $request->validate(['description' => 'required']);

        RequestComment::query()->create([
            'description' => $request->description,
            'creator_id' => auth()->user()->id,
            'request_id' => $request->request_id
        ]);

        return response()->json(['status' => JsonResponse::HTTP_OK, 'msg' => trans('message.success-store')]);
    }
}
