<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Session;
use App\Category;
use App\Tag;
use Purifier;

class PostController extends Controller
{
    // Only LogIn users can access this controller
    public function __construct()
    {
        $this->middleware('auth');
    }

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
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.create')->withCategories($categories)->withTags($tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request); // for development -> stops app at this point
         // validate the data
        $this->validate($request, array(
            'title' => 'required|max:191',
            'slug' => 'required|alpha_dash|min:5|max:191|unique:posts,slug',
            'category_id' => 'required|integer',
            'body' => 'required'
        ));

        // store in the database
        $post = new Post;
        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->category_id = $request->category_id;
        // Purifier::clean() for securing data
        $post->body = Purifier::clean($request->body);

        $post->save();

        // we do tag binding after we store data to DB but before Session
        // false -> do not overwrite tags
        $post->tags()->sync($request->tags, false);

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
        $categories = Category::all(); // <- objects
        $tags = Tag::all();

        // we do this beacuse we're gonna fill in {{ Form::select() }} in view
        // which needs prepared data for every single category
        // in pairs 'key' => 'value' <- array
        $cats = [];
        foreach($categories as $category) {
            $cats[$category->id] = $category->name;
        }

        $tgs = [];
        foreach($tags as $tag) {
            $tgs[$tag->id] = $tag->name;
        }

        // return the view and pass in the variable
        // we previously created
        return view('posts.edit')->withPost($post)->withCategories($cats)->withTags($tgs);
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
        // check if slug changed, so there is no error,
        // because slug is unique
        if ($request->input('slug') == $post->slug) {
            $this->validate($request, array(
                'title' => 'required|max:191',
                'category_id' => 'required|integer',
                'body' => 'required'
            ));
        } 
        else {
            $this->validate($request, array(
                'title' => 'required|max:191',
                'slug' => 'required|alpha_dash|min:5|max:191|unique:posts,slug',
                'category_id' => 'required|integer',
                'body' => 'required'
            ));
        }

        // save the data to DB
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->slug = $request->input('slug');
        $post->category_id = $request->input('category_id');
        $post->body = Purifier::clean($request->body);
        $post->save();

        // we do binding with tags after we store data to DB but before Session
        // true -> overwrite old tags
        $post->tags()->sync($request->tags, true);

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

        // detach related tags
        $post->tags()->detach();
        $post->delete();

        Session::flash('success', 'The post was successfully deleted!');
        return redirect()->route('posts.index');
    }
}
