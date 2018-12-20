@extends('layouts.app')

@section('title', '| Contact')

@section('content')
  <div class="row d-flex align-items-center">
      <div class="col-md-8 offset-md-2">
        <h1 class="my-3">Contact Us</h1>
      <form action="{{ url('contact') }}" method="POST">
        {{ csrf_field() }}
          <div class="form-group">
            <label for="" name="email">Email:</label>
            <input type="text" id="email" name="email" class="form-control">
          </div>

          <div class="form-group">
            <label for="" name="subject">Subject:</label>
            <input type="text" id="subject" name="subject" class="form-control">
          </div>

          <div class="form-group">
            <label for="" name="message">Message:</label>
            <textarea id="message" name="message" class="form-control" rows="5" placeholder="Type your message here..."></textarea>
          </div>

          <input type="submit" value="Send Message" class="btn btn-success btn-block">
        </form>
      </div>
  </div>
@endsection
