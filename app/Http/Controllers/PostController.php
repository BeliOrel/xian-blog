<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Session;
// use Session;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // create a variable
        // and store all the blog posts in it from the DB
        // $posts = Post::all();

        // With pagination -> 10 items per page
        // we also want to show the most recent posts at the start
        $posts = Post::orderBy('id', 'desc')->paginate(10);

        // return a view and pass in the above variable
        return view('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate the data
        $this->validate($request, array(
            'title' => 'required|max:191',
            'slug' => 'required|alpha_dash|min:5|max:191|unique:posts,slug',
            'body' => 'required'
        ));

        // store in the database
        $post = new Post;
        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->body = $request->body;

        $post->save();

        // creating a message
        // flash -> only exists for one page request <- temporary
        // for the one that exists for the whole session you better use Session::put
        Session::flash('success','This blog post was successfully saved!');

        // redirect to another page
        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->with('post', $post);
        // another way:
        // return view('posts.show')->withPost($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // find the post in the DB and save as a variable
        $post = Post::find($id);

        // return the view and pass in the variable
        // we previously created
        return view('posts.edit')->withPost($post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // find post so we can check the post's slug latter
        $post = Post::find($id); 

        // validate the data
        if ($request->input('slug') == $post->slug) {
            $this->validate($request, array(
                'title' => 'required|max:191',
                'body' => 'required'
            ));
        } 
        else {
            $this->validate($request, array(
                'title' => 'required|max:191',
                'slug' => 'required|alpha_dash|min:5|max:191|unique:posts,slug',
                'body' => 'required'
            ));
        }

        // save the data to DB
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->slug = $request->input('slug');
        $post->body = $request->input('body');
        $post->save();

        // set flash data with success message
        Session::flash('success', 'This post was successfully saved!');

        // redirect with flash data to posts.show
        return redirect()->route('posts.show', $post->id); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();

        Session::flash('success', 'The post was successfully deleted!');
        return redirect()->route('posts.index');
    }
}
