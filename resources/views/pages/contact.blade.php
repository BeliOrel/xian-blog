@extends('layouts.app')

@section('title', '| Contact')

@section('content')
  <div class="row d-flex align-items-center">
      <div class="col-md-12">
        <h1 class="my-3">Contact Me</h1>
        <form action="">
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
            <textarea id="message" name="message" class="form-control">Type your message here...</textarea>
          </div>

          <input type="submit" value="Send Message" class="btn btn-success">
        </form>
      </div>
  </div>
@endsection
