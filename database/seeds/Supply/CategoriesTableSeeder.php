<?php

use Illuminate\Database\Seeder;
use App\Models\Supply\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Category::class, 10)->create()->each(function ($factory) {
            $factory->child()->saveMany(factory(Category::class, 4)->create()->each(function ($factory) {
                $factory->child()->saveMany(factory(Category::class, 6)->create());
            }));
        });

        factory(Category::class, 10)->create()->each(function ($factory) {
            $factory->child()->saveMany(factory(Category::class, 4)->create());
        });
        factory(Category::class, 3)->create();

    }
}
