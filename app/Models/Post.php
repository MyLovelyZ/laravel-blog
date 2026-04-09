<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // public static function find($slug)
    // {
    //     // return Arr::first(static::all(), function ($post) use ($slug) {
    //     //     return $post['slug'] == $slug;
    //     // });

    //     // return Arr::first(static::all(), fn($post) => $post['slug'] == $slug) ?? abort(404);
    // }

    protected $fillable = ['title', 'author', 'slug', 'body'];
    protected $guarded = ['id'];
    use HasFactory;

    protected $with = ['author', 'category'];

    public function author()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}