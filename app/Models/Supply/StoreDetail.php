<?php

namespace App\Models\Supply;

use App\Traits\Models\Accessor\StoreDetailAccessor;
use App\Traits\Models\Relation\StoreDetailRelation;
use Illuminate\Database\Eloquent\Model;

class StoreDetail extends Model
{
    use StoreDetailRelation, StoreDetailAccessor;

    protected $appends = ['extra_value'];

    protected $fillable = [
        'type',
        'amount',
        'store_id',
        'request_detail_no',
        'price',
        'unit_price',
        'category_id',
        'request_detail_id',
        'date',
        'project_id',
        'shop_id',
        'creator_id',
        'description',
        'extra',
    ];
}
