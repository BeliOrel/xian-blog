@extends('layouts.app')

@section('title', '| View Post')

@section('content')
  <div class="row">
    <div class="col-md-8">
        <h1 class="mt-3">{{ $post->title }}</h1>
        <p class="lead">{{ $post->body }}</p>
    </div>
    <div class="col-md-4">
      <div class="card mt-3">
          <div class="card-body">
              <div class="mt-1">
                <label><strong>Url:</strong></label>
                <!-- two ways of doing URLs -> route() or url() -->
                <p class="text-muted mt-0"><a href="{{ route('blog.single', $post->slug) }}">{{ url('blog/' .$post->slug) }}</a></p>
              </div>

              <div class="mt-1">
                  <label><strong>Category:</strong></label>
                  <!-- two ways of doing URLs -> route() or url() -->
                  <p class="text-muted mt-0">{{ $post->category->name }}</p>
                </div>
              
              <div class="mt-1">
                <label><strong>Created At:</strong></label>
                <p class="text-muted mt-0">{{ date('M j, Y G:i', strtotime($post->created_at)) }}</p>
              </div>
              
              <div class="mt-1">
                <label><strong>Last Updated:</strong></label>
                <p class="text-muted mt-0">{{ date('M j, Y G:i', strtotime($post->updated_at)) }}</p>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-6">
                  <!-- linkRoute expects id of the post -> use array;
                  withot variables -> you still need to pass an empty array;
                  second array is for css classes -->
                  {!! Html::linkRoute('posts.edit', 'Edit', array($post->id), array('class' => 'btn btn-primary btn-block')) !!}
                </div>
                <div class="col-sm-6">
                  {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'DELETE']) !!}
                  {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}
                  {!! Form::close() !!}
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 mt-3"> 
                  {{ Html::linkRoute('posts.index', 'See All Posts', [], ['class' => 'btn btn-default btn-block btn-light']) }}
                </div>
              </div>
          </div>
         </div>
      </div>
    </div>
  </div>    
@endsection