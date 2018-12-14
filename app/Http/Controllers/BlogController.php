<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class BlogController extends Controller
{
    public function getIndex() {
        $posts = Post::paginate(10);
        return view('blog.index')->withPosts($posts);
    }

    public function getSingle($slug) {
        // fetch from DB based on slug
        // (get the first object -> we don't need a collection of objects
        // because slugs are unique 
        // and we can stop searching when we find the first and only one)
        $post = Post::where('slug', '=', $slug)->first();

        // return the view and pass in the post object
        return view('blog.single')->withPost($post);
    }
}
