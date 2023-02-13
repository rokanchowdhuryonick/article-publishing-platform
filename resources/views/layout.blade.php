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

            @if (Auth::user())
            <div class="col-4 d-flex justify-content-end align-items-center">
              <a class="btn btn-sm btn-outline-dark mx-3" href="#">Hello, {{Auth::user()->name}}</a>
              <a class="btn btn-sm btn-outline-danger" href="{{route('logout')}}">Logout</a>
            </div>
            @else
            <div class="col-4 d-flex justify-content-end align-items-center">
              <a class="btn btn-sm btn-outline-secondary mx-3" href="{{route('login')}}">Log In</a>
              <a class="btn btn-sm btn-outline-primary" href="{{route('register')}}">Register</a>
            </div>
            @endif

          </div>
        </header>
      
        <div class="nav-scroller py-1 mb-2">
          <nav class="nav d-flex justify-content-center">
            <a class="btn btn-dark m-1" href="{{route('home')}}">Home</a>
            @auth

            <a class="btn btn-dark m-1" href="{{route('post.list')}}">Posts</a>
            @if (Auth::user()->is_admin)
            <a class="btn btn-dark m-1" href="{{route('post.list')}}">Users</a>
            @else
            <a class="btn btn-dark m-1" href="{{route('subscription.change')}}">Upgrade/Downgrade</a>
            
            @endif
            
            @endauth
            {{-- <a class="btn btn-dark m-1" href="{{route('post.list')}}">Posts</a> --}}
          </nav>
        </div><hr>
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
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>