<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    public function index()
    {
        $messages = DB::table('contacts')
            ->latest()
            ->paginate(20);

        $msg = DB::table('contacts')->latest()->limit(20)->get();

        foreach ($msg as $m) {
            DB::table('contacts')
                ->where('id', $m->id)
                ->update(['read_at' => now()]);
        }

        return view('contacts.index', compact('messages'));
    }
}
