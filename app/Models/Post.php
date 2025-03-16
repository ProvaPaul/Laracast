<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable=['title', 'excerpt', 'body'];
    public function category()
    {
        //one,many,belongto,belongstomany
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        //one,many,belongto,belongstomany
        return $this->belongsTo(User::class);
    }
}
