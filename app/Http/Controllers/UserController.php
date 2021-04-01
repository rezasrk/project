<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::query();

        if ($request->filled('name')) {
            $users->where('name', 'like', '%' . $request->query('name') . '%');
        }

        if ($request->filled('email')) {
            $users->where('email', 'like', '%' . $request->query('email') . '%');
        }

        $users = $users->paginate(20);
        return view('users.index', compact('users'));
    }
}
