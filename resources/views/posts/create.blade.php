@extends('main')

@section('title', '| Create New Post')
@section('content')
  <div class="row">
    <div class="col-md-8 offset-md-2">
      <h1 class="mt-4">Create New Post</h1>
      <hr>
      {!! Form::open(['route' => 'posts.store']) !!}
        {{ Form::label('title', 'Title:') }}
        {{ Form::text('title',  null, array('class' => 'form-control')) }}

        {{ Form::label('body', 'Post Body:', array('class' => 'mt-3')) }}
        {{ Form::textarea('body', null, array('class' => 'form-control')) }}

        {{ Form::submit('Create Post', array('class' => 'btn btn-success btn-lg btn-block mt-4')) }}
      {!! Form::close() !!}
    </div>
  </div>
@endsection