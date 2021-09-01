<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function posts()
    {
        $post = new Post();

        return view('posts.posts', [
            'posts' => $post->load('user')->latest()->paginate(5)
        ]);
    }

    public function post(Post $post)
    {
        return view('posts.post', [
            'post' => $post
        ]);
    }
}
