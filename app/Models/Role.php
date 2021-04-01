<?php

namespace App\Models;

use App\Traits\Models\Scope\RolesScope;
use Spatie\Permission\Models\Role as SpatieRole;

class Role extends SpatieRole
{
    use RolesScope;
}
