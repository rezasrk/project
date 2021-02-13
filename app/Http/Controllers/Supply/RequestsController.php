<?php

namespace App\Http\Controllers\Supply;

use App\Http\Controllers\Controller;
use App\Http\Requests\Supply\RequestsRequest;
use App\Models\Baseinfo as Base;
use App\Models\Setting;
use App\Repository\RequestsRepository;
use App\Services\BaseInfo;
use App\Services\CreateCode\RequestCode;
use App\Services\Morilog\Morilog;
use \App\Models\Supply\Request as RQ;
use App\Services\Html\Supply\RequestEditForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \Illuminate\Http\JsonResponse as Json;
use Symfony\Component\HttpFoundation\JsonResponse;

class RequestsController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:list-requests')->only('index');
        $this->middleware('permission:create-request')->only(['create', 'store']);
        $this->middleware('permission:edit-request')->only(['edit', 'update']);
        $this->middleware(['required_ajax_request'])->except('index', 'myRequest');
    }

    public function index(RequestsRepository $repository, Morilog $morilog, BaseInfo $baseInfo, Request $request)
    {
        $requests = $repository->requestList($request)->paginate(30);

        $conditionRequests = Base::type('condition_request');

        return view('supply.requests.index', compact(
                'requests', 'morilog', 'conditionRequests', 'baseInfo'
            )
        );
    }


    public function create(): Json
    {
        $unitRequesters = Base::type('unit_requester');
        $showUnitRequester = Setting::query()->where('key', '=', 'show_unit_requester')->first();
        $typeRequests = Base::type('type_request');


        return response()->json([
            'status' => JsonResponse::HTTP_OK,
            'data' => view('supply.requests.partials.create', compact(
                    'unitRequesters', 'showUnitRequester', 'typeRequests'
                )
            )->render()
        ]);
    }


    public function store(RequestsRequest $request, RequestDetailsController $requestDetailsController): Json
    {
        DB::beginTransaction();

        /** @var RQ $rq */
        $rq = RQ::query()->create([
            'subject' => $request->subject,
            'code' => resolve(RequestCode::class)->parameters($request->all())->code(),
            'project_id' => projectInf()->id,
            'unit_requester_id' => $request->unit_requester_id ? $request->unit_requester_id : 0,
            'applicant_name' => $request->applicant_name,
            'status' => 83,
            'type' => $request->type,
            'creator_id' => $request->user()->id,
        ]);

        $requestDetailsController->store($rq, $request);

        DB::commit();

        return response()->json([
            'status' => JsonResponse::HTTP_OK,
            'msg' => trans('message.success-store'),
            'url' => $request->headers->get('referer')
        ]);
    }

    public function edit(RequestEditForm $form, $id)
    {
        $rq = RQ::query()->findOrFail($id);
        $unitRequesters = Base::type('unit_requester');
        $showUnitRequester = Setting::query()->where('key', '=', 'show_unit_requester')->first();
        $typeRequests = Base::type('type_request');

        return response()->json([
            'status' => JsonResponse::HTTP_OK,
            'data' => view('supply.requests.partials.edit', compact(
                'rq', 'unitRequesters', 'showUnitRequester', 'typeRequests'
            ))->render()
        ]);
    }

    public function update(RequestsRequest $request, RequestDetailsController $requestDetailController, $id)
    {
        DB::beginTransaction();

        /** @var RQ $rq */
        $rq = RQ::query()->findOrFail($id);
        if ($rq->status == 83 || $rq->status == 88) {
            $rq->update([
                'subject' => $request->subject,
                'applicant_name' => $request->applicant_name,
                'status' => 83,
                'type' => $request->type,
                'is_supplier_receiver' => $request->has('is_supplier_receiver') ? 1 : 0,
                'creator_id' => $request->user()->id,
            ]);

            $requestDetailController->update($rq, $request);

            DB::commit();

            return response()->json([
                'status' => JsonResponse::HTTP_OK,
                'msg' => trans('message.success-update'),
                'url' => route('request.index')
            ]);
        }

        return response()->json([
            'status' => JsonResponse::HTTP_FORBIDDEN,
            'msg' => trans('message.request-edit-fail')
        ]);
    }

    public function myRequest(RequestsRepository $repository, Morilog $morilog, BaseInfo $baseInfo, Request $request)
    {
        $requests = $repository->requestList($request)
            ->whereIn('status', auth()->user()->status_req)
            ->whereIn('type', auth()->user()->type_req)
            ->orWhere('assign_id', '=', auth()->id())
            ->paginate(30);

        $conditionRequests = Base::type('condition_request');

        return view('supply.requests.index', compact(
                'requests', 'morilog', 'conditionRequests', 'baseInfo'
            )
        );
    }

}
