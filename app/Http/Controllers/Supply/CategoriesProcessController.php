<?php

namespace App\Http\Controllers\Supply;

use App\Http\Controllers\Controller;
use App\Models\Supply\Category;
use App\Repository\CategoriesSearchRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\JsonResponse;
use Illuminate\Http\JsonResponse as Json;

class CategoriesProcessController extends Controller
{
    public function __construct()
    {
        $this->middleware(['required_ajax_request']);
    }

    /*
     * This method use for select2 search ajax
     */
    public function search(Request $request, CategoriesSearchRepository $repository): Json
    {
        return response()->json([
            'status' => JsonResponse::HTTP_OK,
            'data' => $repository->type($request)
        ]);
    }


}
