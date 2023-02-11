<!DOCTYPE html>
<html lang="{{config('app.locale')}}">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>@yield('title')</title>
  <!-- Bootstrap core CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <meta name="theme-color" content="#7952b3">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900&amp;display=swap" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{asset('assets/css/blog.css')}}" rel="stylesheet">


</head>
<body>
    <div class="container">
        <header class="blog-header py-3" id="header">
          <div class="row flex-nowrap justify-content-between align-items-center">
            {{-- <div class="col-4 pt-1">
              <a class="link-secondary" href="#">Subscribe</a>
            </div> --}}
            <div class="col-8 ">
              <span class="blog-header-logo text-dark" href="#">The R Blog</span>
            </div>
            <div class="col-4 d-flex justify-content-end align-items-center">
              
              <a class="btn btn-sm btn-outline-secondary" href="#">Sign In</a>
            </div>
          </div>
        </header>
      
        {{-- <div class="nav-scroller py-1 mb-2">
          <nav class="nav d-flex justify-content-between">
            <a class="p-2 link-secondary" href="#">World</a>
            <a class="p-2 link-secondary" href="#">U.S.</a>
            <a class="p-2 link-secondary" href="#">Technology</a>
            <a class="p-2 link-secondary" href="#">Design</a>
            <a class="p-2 link-secondary" href="#">Culture</a>
            <a class="p-2 link-secondary" href="#">Business</a>
            <a class="p-2 link-secondary" href="#">Politics</a>
            <a class="p-2 link-secondary" href="#">Opinion</a>
            <a class="p-2 link-secondary" href="#">Science</a>
            <a class="p-2 link-secondary" href="#">Health</a>
            <a class="p-2 link-secondary" href="#">Style</a>
            <a class="p-2 link-secondary" href="#">Travel</a>
          </nav>
        </div> --}}
      </div>

      <main class="container">
        @yield('content')
      </main>



      <footer class="blog-footer">
        <p>Copyright &copy; <a href="https://linkedin.com/in/rokanchowdhuryonick">Rokan Chowdhury Onick</a>.</p>
        <p>
          <a href="#header">Back to top</a>
        </p>
      </footer>

</body>

</html>