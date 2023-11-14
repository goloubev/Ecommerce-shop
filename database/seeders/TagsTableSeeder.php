<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    public function run(): void
    {
        Tag::factory(5)->create();
    }
}
