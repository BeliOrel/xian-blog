@extends('layouts.app')

@section('title', '| All Posts')

@section('content')
  <div class="row">
    <div class="col-md-10">
      <h1 class="mt-3">All Posts</h1>
    </div>
    <div class="col-md-2">
    <a href="{{ route('posts.create') }}" class="mt-3 btn btn-lg btn-block btn-primary btn-h1-spacing">Create Post</a>
    </div>
  </div> <!-- end of row -->
  <div class="row">
    <div class="col-md-12">
      <table class="table mt-3">
        <thead>
          <th>#</th>
          <th>Title</th>
          <th>Body</th>
          <th>Created At</th>
          <th></th>
        </thead>
        <tbody>
          @foreach ($posts as $post)
            <tr>
              <td>{{ $post->id }}</td>
              <td>{{ substr($post->title, 0, 30) }}{{ strlen($post->title) > 30 ? '...': '' }}</td>
              <td>
                {{ substr($post->body, 0, 50) }}{{ strlen($post->body) > 50 ? '...': '' }}
              </td>
              <td>{{ date('M j, Y G:i', strtotime($post->created_at)) }}</td>
              <td>
              <a href="{{ route('posts.show', $post->id) }}" class="btn btn-outline-secondary btn-sm">View</a> 
                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-outline-secondary btn-sm">Edit</a>
              </td>
            </tr>              
          @endforeach
        </tbody>
      </table>
      <!-- pagination -->
      <div class="pagination justify-content-center">
        {!! $posts->links() !!}
      </div>
    </div>
  </div>
@stop     