@extends('layouts.app')

@section('title', '| Edit Blog Post')

@section('stylesheets')
  <!-- Select2 CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
@endsection
    
@section('content')
  <!-- connect to the model (model, [where to go after successful submit]) -->
  {!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PUT', 'files' => true]) !!}
    <div class="row">
      <!-- left side -->
      <div class="col-md-8">
        <div class="form-group mt-3">
          <label for="title" class="font-weight-bold">Title:</label>
          <input name="title" class="form-control" type="text" id="title" value="{{ $post->title }}">
        </div>
        <div class="form-group mt-3">
          <label for="slug" class="font-weight-bold">Slug:</label>
          <input name="slug" class="form-control" type="text" id="slug" value="{{ $post->slug }}">
        </div>
        <div class="form-group mt-3">
          <label for="category_id" class="font-weight-bold">Category:</label>
          {{ Form::select('category_id', $categories, null, ['class' => 'form-control']) }}
        </div>
        <div class="form-group mt-3">
          <label for="tags" class="font-weight-bold">Tags:</label>
          {{ Form::select('tags[]', $tags, null, ['class' => 'form-control select2-multiple', 'multiple' => 'multiple']) }}
        </div>
        <div class="form-group mt-3">
          {{ Form::label('featured_image', 'Update Featured Image:', array('class' => 'mt-3 font-weight-bold')) }}
          {{ Form::file('featured_image', ['class' => 'form-control-file']) }}
        </div>        
        <div class="form-group">
          <label for="body" class="font-weight-bold">Your Thoughts:</label>
          <textarea name="body" class="form-control" id="summernote" placeholder="Required example textarea" required>{{ $post->body }}</textarea>
        </div>
      </div>

      <!-- right side -->
      <div class="col-md-4">
        <div class="card mt-3">
          <div class="card-body">
            <dl class="row">
              <dt class="col-sm-5">Created At:</dt>
              <dd class="col-sm-7">{{ date('M j, Y G:i', strtotime($post->created_at)) }}</dd>
            
              <dt class="col-sm-5">Last Updated:</dt>
              <dd class="col-sm-7">{{ date('M j, Y G:i', strtotime($post->updated_at)) }}</dd>
            </dl>
            <hr>
            <div class="row">
              <div class="col-sm-6">
                <!-- linkRoute expects id of the post -> use array;
                withot variables -> you still need to pass an empty array;
                second array is for css classes -->
                <a class="btn btn-danger btn-block" href="{{ route('posts.show', $post->id) }}">Cancel</a>
              </div>
              <div class="col-sm-6">
                <button class="btn btn-success btn-block" type="submit">Save Changes</button>
              </div>
            </div>
          </div>
        </div>
      </div><!-- end of row (form) -->
    </div>
    {!! Form::close() !!} 
@stop

@section('scripts')
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