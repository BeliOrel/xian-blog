@extends('layouts.app')

@section('title', '| Edit Tag')

@section('content')
  <div class="row">
      <div class="col-md-8 offset-md-2">
          {{ Form::model($tag, ['route' => ['tags.update', $tag->id], 'method' => 'PUT']) }}
            <div class="form-group mt-3">
              {{ Form::label('name', "New Tag's Name:", ["class" => "font-weight-bold"]) }}
              {{ Form::text('name', null, ["class" => "form-control", "input-lg"]) }}
            </div>
            {{ Form::submit('Save Changes', ['class' => 'btn btn-success btn-block']) }}
          {{ Form::close() }}
      </div>     
  </div>
@endsection