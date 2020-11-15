<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
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
    	// truncate the table
    	Post::truncate();
    	// create 50 App\Models\Post instances
        Post::factory()->count(50)->create();
    }
}
