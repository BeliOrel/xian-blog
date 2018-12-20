@extends('layouts.app')

@section('title', '| Edit Comment')

@section('content')
  <div class="row mt-3">
      <div class="col-md-8 offset-md-2">
        <h1>Edit Comment</h1>
        {{ Form::model($comment, ['route' => ['comments.update', $comment->id], 'method' => 'PUT']) }}
        <div class="form-group mt-3">
          {{ Form::label('name', 'Name:', ["class" => "font-weight-bold"]) }}
          {{ Form::text('name', null, ['class' => 'form-control', 'disabled' => 'disabled']) }}
        </div>
        <div class="form-group mt-3">
          {{ Form::label('email', 'Email:', ["class" => "font-weight-bold"]) }}
          {{ Form::text('email', null, ['class' => 'form-control', 'disabled' => 'disabled']) }}
        </div>
        <div class="form-group mt-3">
          {{ Form::label('comment', 'Comment:', ["class" => "font-weight-bold"]) }}
          {{ Form::textarea('comment', null, ['class' => 'form-control']) }}
        </div>
        {{ Form::submit('Update Comment', ['class' => 'btn btn-block btn-success mt-3']) }}
        {{ Form::close() }}
      </div>
  </div>
@endsection