<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Management</title>
    <base href="/public">
    <link rel="stylesheet" href="css/bootstrap.min.css">  
    <link rel="stylesheet" href="style.css"> 

    <link rel="stylesheet" href="fontawesome-free-6.1.1-web/css/all.css" />
</head>

<body>
    <nav class="navbar navbar-expand-lg py-3 sticky-top navbar-light bg-white">
        <div class="container">
            <a class="navbar-brand" href="#">
                <span class="fs-4 text-dark text-decoration-none fw-bold">Employee Management.</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Contact</a>
                    </li>
                    @auth  
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('index') }}">Dashboard</a>
                    </li>
                    @endauth
                    @if (!Auth::user())
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    @endif
                  
                    
                  
                    @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ auth()->user()->name }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ route('profile') }}">Profile</a></li>
                            
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                <button class="dropdown-item">Logout</button>
                                </form>
                            </li>

                        </ul>
                    </li>
                    @endauth
                   
            </div>
        </div>
    </nav>




    <div class="text-center">
        @if (session()->has('message'))
        <h6 class="alert alert-success">
        {{ session('message') }}
        </h6> 
            @endif
            @if (session()->has('error'))
            <h6 class="alert alert-danger">
            {{ session('error') }}
            </h6> 
                @endif
    </div>

    {{ $slot }}

    <footer class="footer bg-dark text-center p-4 mt-4">
        <div class="container">
            <p>© 2023 Employee Management. All rights reserved.</p>
        </div>
    </footer>

  
    <script src="js/bootstrap.min.js"  crossorigin="anonymous"></script>
</body>

</html>