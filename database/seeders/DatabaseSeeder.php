<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::truncate();
        Category::truncate();
        Post::truncate();
        $user=User::factory()->create();

        $personal=Category::create([
            'name'=>'Personal',
            'slug'=>'personal'
        ]);
        $family=Category::create([
            'name'=>'Work',
            'slug'=>'work'
        ]);
        $work=Category::create([
            'name'=>'Hobbies',
            'slug'=>'hobbies'
        ]);

        Post::create([
            'user_id'=>$user->id,
            'category_id'=>$personal->id,
            'title'=>'My Personal Post',
            'slug'=>'my-personal-post',
            'excerpt'=>'<p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>',
            'body'=>'<p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>'
        ]);
        Post::create([
            'user_id'=>$user->id,
            'category_id'=>$family->id,
            'title'=>'My Family Post',
            'slug'=>'my-family-post',
            'excerpt'=>'<p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>',
            'body'=>'<p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>'
        ]);
        Post::create([
            'user_id'=>$user->id,
            'category_id'=>$work->id,
            'title'=>'My Work Post',
            'slug'=>'my-work-post',
            'excerpt'=>'<p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>',
            'body'=>'<p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>'
        ]);
    }
}
