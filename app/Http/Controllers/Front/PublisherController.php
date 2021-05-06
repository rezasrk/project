<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Publisher;
use Illuminate\Http\Request;

class PublisherController extends Controller
{
    public function index(Request $request)
    {
        $publishers = Publisher::query()
            ->withCount(['journals as journalCount','journalNumbers as nmCount','articles as articleCount'])
            ->where('status',1);

            if($request->query('sort')){
                $sort = explode('-',$request->query('sort'));
                $publishers->orderByRaw($sort[0].' '.$sort[1]);

            }

            if($request->query('title')){
                $publishers->where('publisher_title','like','%'.$request->query('title').'%');
            }

        $searchPlaceHolder = 'جستجو برای ناشران';
        $publishers = $publishers->paginate(20);
        return view('front.publishers.index',compact('searchPlaceHolder','publishers'));
    }
}
