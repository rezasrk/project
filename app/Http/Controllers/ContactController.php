<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    public function index()
    {
        $messages = DB::table('contacts')->paginate(20);

        return view('contacts.index',compact('messages'));
    }
}
