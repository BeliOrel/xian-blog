<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PagesController extends Controller
{
    /**
     * For handling home page (get request)
     *
     * Usual steps:
     * # process variable data or params
     * # talk to the model
     * # receive from the model
     * # compile or process data from the model if needed
     * # pass the data to the correct view
     */
    public function getIndex(){
        $posts = Post::orderBy('created_at', 'desc')->limit(4)->get();
        return view('pages.welcome')->withPosts($posts);
    }

    /**
     * For handling about page
     */
    public function getAbout(){
        $first = "Maru";
        $last = "Whatever";

        $full = $first." ".$last;
        $email = 'sokol@gmail.com';
        $data = [];
        $data['email'] = $email;
        $data['fullname'] = $full;
        // return view('pages.about')->with("fullname", $full);
        // same as
        // return view('pages.about')->withFullname($full); <- so you can use this data in the view
        // return view('pages.about')->withFullname($full)->withEmail($email);
        return view('pages.about')->withData($data);
    }

    /**
     * For handling contact page
     */
    public function getContact(){
        return view('pages.contact');
    }
}
