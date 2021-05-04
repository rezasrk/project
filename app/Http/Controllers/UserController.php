<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::query();

        if ($request->query('name')) {
            $users->where('name', 'like', '%' . $request->query('name') . '%');
        }

        if ($request->query('email')) {
            $users->where('email', 'like', '%' . $request->query('email') . '%');
        }

        if($request->query('username')){
            $users->where('username','like','%'.$request->query('username').'%');
        }

        $users = $users->paginate(20);
        return view('users.index', compact('users'));
    }
}
