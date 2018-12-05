<!-- look for a session with the keyword 'success' -->
@if (Session::has('success'))
  <div class="alert alert-success" role="alert">
    <strong>Success:</strong> {{ Session::get('success') }}
  </div>
@endif

<!-- check if there are some errors -> count objects in $errors -->
@if (count($errors) > 0)
  <div class="alert alert-danger" role="alert">
    <strong>Errors:</strong>
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>    
      @endforeach
    </ul>
  </div>  
@endif