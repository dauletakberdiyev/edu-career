<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Database\Factories\PostFactory;
use App\Models\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::factory()->count(100)->create();
    }
}
