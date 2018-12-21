@extends('layouts.app')

@section('title', '| Blog')

@section('content')
    <div class="row">
      <div class="col-md-8 offset-md-2">
        <h1 class="mt-3">Blog</h1>
        <hr>
      </div>
    </div>

    @foreach ($posts as $post)
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <h2 class="mt-4">{{ $post->title }}</h2>
          <h5><strong>Published: </strong>{{ date('M j, Y G:i', strtotime($post->created_at)) }}</h5>
          <p>{{ substr(strip_tags($post->body), 0, 250) }}{{ strlen(strip_tags($post->body)) > 250 ? '...': '' }}</p>
          <a href="{{ route('blog.single', $post->slug) }}" class="btn btn-primary">Read More</a>
        </div>
      </div>
    @endforeach

    <!-- pagination -->
    <div class="row mt-3">
      <div class="col-md-12">
        <div class="pagination justify-content-center">
          {!! $posts->links() !!}
        </div>
      </div>
    </div>
@endsection