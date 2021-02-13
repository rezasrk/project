<?php

namespace App\Models\Supply;

use App\Traits\Attach;
use App\Traits\Models\Accessor\RequestAccessor;
use App\Traits\Models\Relation\RequestRelation;
use App\Traits\Models\Scope\RequestScope;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    use RequestRelation,RequestAccessor,RequestScope,Attach;

    const STATUS = [
        'SN' => 'send',
        'RJ' => 'reject',
        'AC' => 'accept',
        'IN'=>'in supply',
        'SP'=>'supplied',
        'BL' => 'block'
    ];

    const TYPE = [
        'SP' => 'supply',
        'DL' => 'deliver',
        'IN'=>'in_location'
    ];

    protected $guarded = ['id'];

    protected $appends = ['request_status','request_type'];
}
