<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Category::factory(10)->create();
        Post::factory(40)->create();
        Comment::factory(30)->create();
        Tag::factory(10)->create();
        // \App\Models\User::factory(10)->create();
    }
}
