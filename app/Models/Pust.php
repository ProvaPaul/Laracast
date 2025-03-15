<?php

namespace App\Models;

use Spatie\YamlFrontMatter\YamlFrontMatter;
use Illuminate\Support\Facades\File;

class Pust
{
    public $title;
    public $excerpt;
    public $date;
    public $body;
    public $slug;

    public function __construct($title, $excerpt, $date, $body, $slug)
    {
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->body = $body;
        $this->slug = $slug;
    }

    public static function all()
    {
        return cache()->rememberForever('posts.all', function () {
            return collect(File::files(resource_path('posts')))
                ->map(function ($file) {
                    $document = YamlFrontMatter::parseFile($file);

                    return new Pust(
                        $document->title,
                        $document->excerpt,
                        $document->date,
                        $document->body(),
                        $document->slug
                    );
                })->sortByDesc('date');
        });
        
    }

    public static function find($slug)
    {
        $filePath = resource_path("posts/{$slug}.html");

        if (!file_exists($filePath)) {
            return null;
        }

        $document = YamlFrontMatter::parseFile($filePath);
        return new self(
            $document->title,
            $document->excerpt,
            $document->date,
            $document->body(),
            $document->$slug
        );
    }
}
