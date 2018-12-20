@extends('layouts.app')

@section('title', '| Delete Comment')

@section('content')
  <div class="row mt-3">
    <div class="col-md-8 offset-md-2">
      <h1 class="mt-3">DELETE THIS COMMENT?</h1>
      <p class="my-3">
      <strong>Name: </strong>{{ $comment->name }}<br>
      <strong>Email: </strong>{{ $comment->email }}<br>    
      <strong>Comment: </strong>{{ $comment->comment }}
      </p>
      {{ Form::open(['route' => ['comments.destroy', $comment->id], 'method' => 'DELETE']) }}
        {{ Form::submit('DELETE THIS COMMENT', ['class' => 'btn btn-danger btn-block mt-3']) }}
      {{ Form::close() }}
    </div>
  </div>
@endsection