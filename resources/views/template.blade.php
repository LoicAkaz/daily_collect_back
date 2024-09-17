<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.scss', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <title>Daily_collect</title>
</head>
<body class="container">
    @if(Session::has('message'))
     toastr.success('{{Session::get('message')}}');
    @endif
    @if(Session::has('Error'))
     toastr.success('{{Session::get('Error')}}');
    @endif
    {{-- @if($Error)

        <div class="alert alert-danger" role="alert">
            {{ $Error }}
        </div>
@endif --}}
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Daily_Collect</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  User
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="/user.list">List</a></li>
                  <li><a class="dropdown-item" href="/user.add">Add</a></li>
                  {{-- <li><hr class="dropdown-divider"></li> --}}
                  {{-- <li><a class="dropdown-item" href="#">Something else here</a></li> --}}
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Client
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">List</a></li>
                  <li><a class="dropdown-item" href="#">Add</a></li>
                  {{-- <li><hr class="dropdown-divider"></li> --}}
                  {{-- <li><a class="dropdown-item" href="#">Something else here</a></li> --}}
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Transaction
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">List</a></li>
                  <li><a class="dropdown-item" href="#">Add</a></li>
                  {{-- <li><hr class="dropdown-divider"></li> --}}
                  {{-- <li><a class="dropdown-item" href="#">Something else here</a></li> --}}
                </ul>
              </li>
              {{-- <li class="nav-item">
                <a class="nav-link disabled" aria-disabled="true">Disabled</a>
              </li> --}}
            </ul>
            <form class="d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
          </div>
        </div>
      </nav>
      @yield('content')
      <div id="footer">
        <footer class="text-center">
            <p>&copy; Copyright 2023 Daily_Collect</p>
        </footer>
      </div>
</body>
</html>
