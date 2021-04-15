<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Journal;
use Illuminate\Http\Request;

class JournalController extends Controller
{
    public function index(Request $request)
    {
        $journals = Journal::query()
            ->with(['publish'=>function($query){
                $query->where('status',1);
            }])->withCount(['articles as articleCount']);

            if($request->query('sort')){
                $sort = explode('-',$request->query('sort'));
                $journals->orderByRaw($sort[0].' '.$sort[1]);

            }

            if($request->query('title')){
                $journals->where('journal_title','like','%'.$request->query('title').'%');
            }

        $journals = $journals->paginate(20);
        $searchPlaceHolder = 'جستجو برای مجله ها';
        return view('front.journals.index',compact('journals','searchPlaceHolder'));
    }
}
