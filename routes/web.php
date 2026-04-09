<?php

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', ['title' => 'Home']);
});


Route::get('/posts', function () {
    // $posts = Post::with(['author', 'category'])->latest()->get();
    $posts = Post::all(); // ambil semua
    $posts = Post::latest()->get(); // ambil semua dengan urutan terbaru
    return view('posts', ['title' => 'Blog', 'posts' => $posts]);
});

Route::get('/posts/{post:slug}', function (Post $post) {
    return view('post', ['title' => $post->title . ' By ' . $post->author->name, 'post' => $post]);
});

Route::get('/about', function () {
    return view('about', ['title' => 'About']);
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact']);
});

Route::get('/authors/{user:username}', function (User $user) {
    // $posts = $user->posts()->get()->load('category', 'author');
    return view('posts', ['title' => count($user->posts) . ' Posts By ' . $user->name, 'posts' => $user->posts]);
});

Route::get('/categories/{category:slug}', function(Category $category) {
    // $posts = $category->posts()->get()->load('category', 'author');
    return view('posts', ['title' => 'Posts By Category : ' . $category->name, 'posts' => $category->posts]);
});

Route::get('/authors/{user:username}/category/{category:slug}', function(User $user, Category $category) {
    // $posts = $user->posts()->where('category_id', $category->id)->get()->load('category', 'author');
    return view('posts', ['title' => 'Posts By Author : ' . $user->name . ' In Category : ' . $category->name, 'posts' => $user->posts()->where('category_id', $category->id)->get()]);
})->withoutScopedBindings();