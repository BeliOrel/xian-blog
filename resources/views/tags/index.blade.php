@extends('layouts.app')

@section('title', '| All Tags')

@section('content')
  <div class="row">
    <div class="col-md-8">
      <h1 class="mt-3">Tags</h1>
      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>Name</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($tags as $tag)
            <tr>
              <td><strong>{{ $tag->id }}</strong></td>
            <td><a href="{{ route('tags.show', $tag->id) }}">{{ $tag->name }}</a></td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div><!-- end of col-md-8 -->
    <div class="col-md-4">
      <div class="card mt-3">
        <div class="card-header">New Tag</div>
        <div class="card-body">
            {!! Form::open(['route' => 'tags.store', 'method' => 'POST']) !!}
              <div class="form-group">
                  {{ Form::label('name', 'Name:') }}
                  {{ Form::text('name', null, ['class' => 'form-control', 'required']) }}
              </div>
              {{ Form::submit('Create New Tag', ['class' => 'btn btn-primary btn-block btn-h1-spacing']) }}
            {!! Form::close() !!}
        </div>
      </div>
    </div><!-- end of col-md-4 -->
  </div>
@endsection