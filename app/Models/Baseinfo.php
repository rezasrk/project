<?php

namespace App\Models;

use App\Traits\Models\Scope\BaseinfoScope;
use Illuminate\Database\Eloquent\Model;

/**
 *
 * @method type(string $type)
 */
class Baseinfo extends Model
{
    use BaseinfoScope;
}
