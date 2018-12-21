@extends('layouts.app')

@section('title', '| Homepage')

@section('content')
    <div class="row d-flex align-items-center">
        <div class="col-md-12">
            <div class="jumbotron mt-3">
                <h1 class="display-4">Welcome to My Blog!</h1>
                <p class="lead">I'm happy to see you visiting my den of rumble. Feel free to explore.</p>
                <a class="btn btn-primary btn-lg" href="#" role="button">Popular Post</a>
            </div>
        </div>
    </div> <!-- end of jumbotron -->

    <div class="row">
        <div class="col-md-8">
            @foreach ($posts as $post)
                <div class="post my-2">
                    <h3>{{ $post->title }}</h3>
                    <!-- use strip_tags() if you want to get rid of HTML code
                        that's generated with WYSIWYG editor -->
                    <p>{{ substr(strip_tags($post->body), 0, 350) }}{{ strlen(strip_tags($post->body)) > 350 ? '...': '' }}</p>
                    <a href="{{ url('blog/' .$post->slug) }}" class="btn btn-primary">Read More</a>                  
                </div>    
                <hr>
            @endforeach
        </div>
        <div class="col-md-3 col-md-offset-1">
            <h2 class="my-2">Sidebar</h2>
        </div>
    </div>
@endsection
