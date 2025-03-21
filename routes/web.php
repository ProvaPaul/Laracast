<?php

use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Route;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use Illuminate\Support\Facades\File;
use App\Models\User;

Route::get('/', function () {
    $posts=Post::latest()->get();
    return view('posts', ['posts' => $posts,
    'categories'=>Category::all(),
]);
})->name('home');

Route::get('posts/{post:slug}', function (Post $post) {
    return view('post', ['post' => $post]);
});

Route::get('categories/{category:slug}',function(Category $category){
    return view('posts',[
        'posts'=>$category->posts,
        'currentCategory'=>$category,
        'categories'=>Category::all(),
    ]);
})->name('category');

Route::get('authors/{author:username}',function(User $author){
    return view('posts',[
        'posts'=>$author->posts,
        'categories'=>Category::all(),
    ]);
});