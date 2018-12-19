@extends('layouts.app')

@section('title', "| $tag->name Tag")

@section('content')
  <div class="row my-3">
      <div class="col-md-8">
        <div class="row mx-1">
            <h1><span class="text-secondary">{{ $tag->name }}</span> Tag</h1> <h3 class="mt-2 pl-3"><span class="badge badge-light">{{ $tag->posts()->count() }} Post(s)</span></h3>
        </div>
      </div>
      <div class="col-md-2">
        <a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-primary mt-2 btn-block">Edit</a>
      </div>
      <div class="col-md-2">
        {{ Form::open(['route' => ['tags.destroy', $tag->id], 'method' => 'DELETE']) }}
          {{ Form::submit('Delete', ['class' => 'btn btn-danger mt-2 btn-block']) }}
        {{ Form::close() }}
      </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>Title</th>
            <th>All Post's Tags</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($tag->posts as $post)
            <tr>
              <th>{{ $post->id }}</th>
              <td>{{ $post->title }}</td>
              <td>
                @foreach ($post->tags as $tag)
                  <span class="badge badge-pill badge-secondary">{{ $tag->name }}</span>                    
                @endforeach
              </td>
              <td><a href="{{ route('posts.show', $post->id) }}" class="btn btn-outline-secondary btn-sm float-right">View</a></td>
            </tr>      
          @endforeach
        </tbody>
      </table>
    </div>
  </div>    
@endsection