<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Baseinfo;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __invoke(Request $request)
    {
        $type = ($request->route()->parameter('type'));

        $data = $this->$type();

        return view('front.profile.profile', $data);
    }

    protected function user(): array
    {
        return [
            'type' => 'user',
            'info' => auth()->guard('front')->user(),
            'degree' => Baseinfo::type('degree'),
            'scientific_rank' => Baseinfo::type('scientific_rank')
        ];
    }

    protected function journals()
    {

    }


}
