<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $with = ['category','author'];


    public function category()
    {
        //one,many,belongto,belongstomany
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        //one,many,belongto,belongstomany
        return $this->belongsTo(User::class,'user_id');
    }
}
