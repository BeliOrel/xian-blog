@extends('layouts.app')

<?php
  $titleTag = htmlspecialchars($post->title);
?>

@section('title', "| $titleTag")

@section('content')
    <div class="row">
      <div class="col-md-8 offset-md-2">
        <h1 class="mt-3">{{ $post->title }}</h1>
        <p>{{ $post->body }}</p>
        <hr>
        <p>Posted In: <strong>{{ $post->category->name }}</strong></p> 
      </div>
    </div>

    <div class="row mt-4">
      <div class="col-md-8 offset-md-2">
        <h4 class="comments-title"><i class="fa fa-comments-o"></i> {{ $post->comments()->count() }} Comment(s)</h4>
        @foreach ($post->comments as $comment)
            <div class="comment">
              <div class="author-info">
                <!-- Gravatar -->
                <img src="{{ "https://www.gravatar.com/avatar/".md5(strtolower(trim($comment->email)))."?s=50&d=identicon" }}" class="author-image">
                <div class="author-name">
                  <h4>{{ $comment->name }}</h4>
                  <p class="author-time">{{ date('M j, Y G:i', strtotime($comment->created_at)) }}</p>
                </div>
              </div>
              <div class="comment-content">
                {{ $comment->comment }}
              </div>
            </div>
        @endforeach
      </div>
    </div>

    <div class="row">
      <div id="comment-form" class="col-md-8 offset-md-2">
        <h4 class="my-3">New Comment</h4>
        {{ Form::open(['route' => ['comments.store', $post->id], 'method' => 'POST']) }}
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                {{ Form::label('name', 'Name:') }}
                {{ Form::text('name', null, ['class' => 'form-control']) }}
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                {{ Form::label('email', 'Email:') }}
                {{ Form::text('email', null, ['class' => 'form-control']) }}
              </div>
            </div>
          </div> <!-- end row -->
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                {{ Form::label('comment', 'Comment:') }}
                {{ Form::textarea('comment', null, ['class' => 'form-control']) }}
              </div>
              {{ Form::submit('Add Comment', ['class' => 'btn btn-success btn-block']) }}
            </div>
          </div><!-- end row -->
        {{ Form::close() }}
      </div>
    </div>
@endsection    
