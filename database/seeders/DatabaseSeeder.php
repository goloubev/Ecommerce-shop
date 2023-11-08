<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

/*
php artisan migrate:fresh --seed
*/
class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(CategoriesTableSeeder::class);
        $this->call(TagsTableSeeder::class);
        $this->call(ColorsTableSeeder::class);
    }
}
