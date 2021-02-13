<?php


namespace App\Traits\Models\Relation;

use App\Models\Project;
use App\Models\Role;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

trait UserRelation
{
    public function projects() : BelongsToMany
    {
        return $this->belongsToMany(Project::class,'user_projects','user_id','project_id');
    }
}
