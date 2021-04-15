<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class CreatorController extends Controller
{
    public function index(Request $request)
    {
        $users = User::query()
            ->withCount(['articles as articleCount'])
            ->where('as_creator',1);

        if($request->query('sort')){
            $sort = explode('-',$request->query('sort'));
            $users->orderByRaw($sort[0].' '.$sort[1]);

        }

        if($request->query('title')){
            $users->where('name','like','%'.$request->query('title').'%');
        }

        $users = $users->paginate(20);

        $searchPlaceHolder = 'جستجو در پدید آورندگان';

        return view('front.creators.index',compact('users','searchPlaceHolder'));
    }
}
