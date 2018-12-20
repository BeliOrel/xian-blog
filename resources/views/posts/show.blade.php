@extends('layouts.app')

@section('title', '| View Post')

@section('content')
  <!-- left column -->
  <div class="row">
    <div class="col-md-8">
        <h1 class="mt-3">{{ $post->title }}</h1>
        <p class="lead">{{ $post->body }}</p>
        <hr>
        <div class="tags">
          @foreach ($post->tags as $tag)
            <span class="badge badge-pill badge-secondary">{{ $tag->name }}</span>
          @endforeach
        </div>
        <div id="backend-comments">
          <h3>Comments <small class="font-weight-light">{{ $post->comments()->count() }} total</small></h3>

          <table class="table table-hover">
            <thead>
              <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Comment</th>
                <th width="90px"></th>
              </tr>
            </thead>
            <tbody>
              @foreach ($post->comments as $comment)
                <tr>
                  <td>{{ $comment->name }}</td>
                  <td>{{ $comment->email }}</td>
                  <td>{{ $comment->comment }}</td>
                  <td>
                    <a href="{{ route('comments.edit', $comment->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i></a>
                    <a href="{{ route('comments.delete', $comment->id) }}" class="btn btn-sm btn-danger"><i class="fa fa-trash-o"></i></a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>

        </div>
    </div>

    <!-- right column -->
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