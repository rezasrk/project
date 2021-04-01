<?php

namespace App\Models;

use App\Traits\Models\Scope\PermissionsScope;
use Spatie\Permission\Models\Permission as Access;

class Permission extends Access
{
    use PermissionsScope;
}
