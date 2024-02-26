<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Your App Name')</title>


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">


    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">


    <!-- Custom CSS -->
    <style>
        body {
            padding-top: 5rem;
        }
        .starter-template {
            padding: 3rem 1.5rem;
            text-align: center;
        }
    </style>
</head>
<body>


<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="#">Photo Gallery</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>


    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/album">Album</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/signup">Signup</a>
            </li>
            <li class="nav-item">
                @if (Auth::check())
                    <form action="{{ route('auth.logout') }}" method="POST" style="display:none;" id="logout-form">
                        @csrf
                    </form>
                    <a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                @endif
            </li>
        </ul>
    </div>
</nav>


<main role="main" class="container">
    <div class="starter-template">
        @yield('content')
    </div>
</main>


<!-- jQuery and Bootstrap Bundle (includes Popper) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>


</body>
</html>
