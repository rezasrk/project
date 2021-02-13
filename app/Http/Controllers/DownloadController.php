<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;

class DownloadController extends Controller
{
    public function simpleDownload(Request $request) : StreamedResponse
    {
        return Storage::disk('public')->download($request->path);
    }
}
