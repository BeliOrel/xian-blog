<!doctype html>
<html lang="en">
  <head>
    <!-- header -->
    @include('partials._head')
  </head>
  <body>
    <!-- navigation bar -->
    @include('partials._nav')    

    <!-- container -->
    <div class="container">
      @include('partials._messages')
      @yield('content')

      <!-- footer -->
      @include('partials._footer')
    </div>

    @include('partials._javascript')

    @yield('scripts')
  </body>
</html>