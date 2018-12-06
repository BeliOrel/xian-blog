@extends('main')

@section('title', '| Edit Blog Post')
    
@section('content')
  <!-- connect to the model (model, [where to go after successful submit]) -->
  {!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PUT']) !!}
  <div class="row">
    <div class="col-md-8">
      <div class="form-group mt-3">
        {{ Form::label('title', 'Title:', ["class" => "font-weight-bold"]) }}
        {{ Form::text('title', null, ["class" => ["form-control", "input-lg"]]) }}
      </div>
      <div class="form-group">
        {{ Form::label('body', 'Your Thoughts:', ["class" => "font-weight-bold"]) }}
        {{ Form::textarea('body', null, ["class" => ["form-control", "lead"]]) }}
      </div>
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
                  {!! Html::linkRoute('posts.show', 'Cancel', array($post->id), array('class' => 'btn btn-danger btn-block')) !!}
                </div>
                <div class="col-sm-6">
                  {{ Form::submit('Save Changes', ['class' => 'btn btn-success btn-block']) }}
                </div>
              </div>
          </div>
         </div>
      </div>
    </div> <!-- end of row (form) -->  
    {!! Form::close() !!}   
@stop