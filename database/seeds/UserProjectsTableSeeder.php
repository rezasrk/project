<?php

use Illuminate\Database\Seeder;
use \App\Models\User;
use \App\Models\Project;
class UserProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::query()->find(1);
        $projects = Project::query()->get()->pluck('id')->toArray();
        $user->projects()->sync($projects);
    }
}
