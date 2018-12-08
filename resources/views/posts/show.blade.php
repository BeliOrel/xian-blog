@extends('main')

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