@extends('layouts.app')

@section('title', '| Create New Post')

@section('stylesheets')
  {!! Html::style('css/parsley.css') !!}    
@endsection

@section('content')
  <div class="row">
    <div class="col-md-8 offset-md-2">
      <h1 class="mt-4">Create New Post</h1>
      <hr>
      {!! Form::open(['route' => 'posts.store', 'data-parsley-validate' => '']) !!}
        {{ Form::label('title', 'Title:') }}
        {{ Form::text('title', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '191')) }}

        {{ Form::label('slug', 'Slug:', ['class' => 'mt-3']) }}
        {{ Form::text('slug', null, array('class' => 'form-control', 'required' => '', 'minlength' => '5', 'maxlength' => '191')) }}

        {{ Form::label('category_id', 'Category:', ['class' => 'mt-3']) }}
        <select name="category_id" class="form-control">
          @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
          @endforeach
        </select>

        {{ Form::label('body', 'Post Body:', array('class' => 'mt-3')) }}
        {{ Form::textarea('body', null, array('class' => 'form-control', 'required' => '')) }}

        {{ Form::submit('Create Post', array('class' => 'btn btn-success btn-lg btn-block btn-h1-spacing')) }}
      {!! Form::close() !!}
    </div>
  </div>
@endsection

@section('scripts')
  {!! Html::script('js/parsley.min.js') !!}
@endsection