<?php

namespace App;
use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $fillable = [
        'title',
        'slug',
        'content'
    ];

    public static function slugGenerator($title){

        $slug = Str::slug($title, '-');
        $slug_new_post = $slug;
        $counter = 1;
        $same_post = Post::where('slug', $slug)->first();
        while($same_post){
            $slug = $slug_new_post.'-'.$counter;
            $same_post = Post::where('slug', $slug)->first();
            $counter ++;
        }
        return $slug;
    }


}
