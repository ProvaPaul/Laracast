<?php

namespace App\Models;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class Post
{
    // Fetch all post filenames
    public static function all()
    {
        return collect(File::files(resource_path("posts/")))
            ->map(fn($file) => File::get($file->getPathname())); // Read file contents
    }

    // Find a specific post by slug
    public static function find($slug){
        $path=resource_path("posts/{$slug}.html");

    if(!file_exists($path)){
        throw new ModelNotFoundException();
    }

    return cache()->remember("posts.{$slug}",3600,fn()=>file_get_contents($path));
    // If the post is requested again within an hour, Laravel retrieves the cached version instead of reading the file again.
    
    }
}
