<!DOCTYPE html>
<html lang="en">
  <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="../../favicon.ico">

        <title>Blog Template for Bootstrap</title>

        <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        
        <!-- Magic animation -->
        <link rel="stylesheet" href="{{ asset('css/magic.min.css') }}">

        <!-- Custom styles for this template -->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">

  </head>

  <body class="bg-light">
        <!-- Navbar --> 
        @include('layouts.nav')

        <!-- blog Header -->
        <div class="blog-header">
          <div class="container">
            <h1 class="blog-title">The Bootstrap Blog</h1>
            <p class="lead blog-description">An example blog template built with Bootstrap.</p>
          </div>
        </div>

        <div class="container">

          <div class="row">

               @yield('content')
               
              <!-- SideBar -->
              @include('layouts.sidebar')
          </div><!--/.row -->

        </div><!-- /.container -->

    <footer class="blog-footer">
      <p>Blog template built for <a href="https://getbootstrap.com">Bootstrap</a> by <a href="https://twitter.com/mdo">@mdo</a>.</p>
      <p>
        <a href="#">Back to top</a>
      </p>
    </footer>


    <!-- Include Footer -->
    @include('layouts.footer')
    
    @yield('extraJS')
  </body>
</html>
