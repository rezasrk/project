<?php

namespace App\Models\Supply;

use App\Traits\Models\Mutator\RelationDetailMutator;
use App\Traits\Models\Relation\RequestDetailRelation;
use Illuminate\Database\Eloquent\Model;

class RequestDetail extends Model
{
    use RequestDetailRelation,RelationDetailMutator;

    protected $guarded = ['id'];

    protected $table = 'request_details';

    protected static function booted()
    {
        self::updated(function ($req) {
            $totalPrice = self::query()->whereRequestId($req->request_id)->sum('price');
            Request::query()->find($req->request_id)->update(['total_price'=>$totalPrice]);
        });
    }
}
