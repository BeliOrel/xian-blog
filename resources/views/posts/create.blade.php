@extends('layouts.app')

@section('title', '| Create New Post')

@section('stylesheets')
  {!! Html::style('css/parsley.css') !!}

  <!-- Select2 CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" /> 
@endsection

@section('content')
  <div class="row">
    <div class="col-md-8 offset-md-2">
      <h1 class="mt-4">Create New Post</h1>
      <hr>
      {!! Form::open(['route' => 'posts.store', 'data-parsley-validate' => '']) !!}
        {{ Form::label('title', 'Title:', ['class' => 'mt-3 font-weight-bold']) }}
        {{ Form::text('title', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '191')) }}

        {{ Form::label('slug', 'Slug:', ['class' => 'mt-3 font-weight-bold']) }}
        {{ Form::text('slug', null, array('class' => 'form-control', 'required' => '', 'minlength' => '5', 'maxlength' => '191')) }}

        {{ Form::label('category_id', 'Category:', ['class' => 'mt-3 font-weight-bold']) }}
        <select name="category_id" class="form-control">
          @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
          @endforeach
        </select>

        {{ Form::label('tags', 'Tags:', ['class' => 'mt-3 font-weight-bold']) }}
        <select name="tags[]" class="form-control select2-multiple" multiple="multiple">
          @foreach ($tags as $tag)
            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
          @endforeach
        </select>

        {{ Form::label('body', 'Post Body:', array('class' => 'mt-3 font-weight-bold')) }}
        {{ Form::textarea('body', null, array('id' => 'summernote', 'class' => 'form-control', 'required' => '')) }}

        {{ Form::submit('Create Post', array('class' => 'btn btn-success btn-lg btn-block btn-h1-spacing')) }}
      {!! Form::close() !!}
    </div>
  </div>
@endsection

@section('scripts')
  {!! Html::script('js/parsley.min.js') !!}

  <!-- Select2 JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
  {!! Html::script('js/select2-m.js') !!}
    <!-- summernote -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-bs4.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-bs4.js"></script>

  <script>
    $('#summernote').summernote({
      placeholder: 'Write something',
      tabsize: 2,
      height: 400
    });
  </script>
@endsection