<?php

use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Route;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use Illuminate\Support\Facades\File;

Route::get('/', function () {
    $posts=Post::all();

    return view('posts', ['posts' => $posts]);
});

Route::get('posts/{post:slug}', function (Post $post) {

    return view('post', ['post' => $post]);
});

Route::get('categories/{category:slug}',function(Category $category){
    return view('posts',[
        'posts'=>$category->posts
    ]);
});