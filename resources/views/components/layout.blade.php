<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Management</title>
    <base href="/public">
    <link rel="stylesheet" href="css/bootstrap.min.css">  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>

<body>
   
    <header class="py-3 mb-4 border-bottom bg-light">
        <div class="d-flex flex-wrap justify-content-center container">
            <a href="todo.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
                <span class="fs-4">Employee Management</span>
            </a>
    
            <ul class="nav nav-pills">
                <li class="nav-item"><a href="" class="nav-link ms-4 " aria-current="page"></a></li>
                <li class="nav-item"><a href="{{ route('index') }}" class="nav-link active" aria-current="page">Home</a></li>
                <li class="nav-item"><a href="{{ route('show') }}" class="nav-link bg-primary text-white mx-4">Add Employee</a></li>
               
            </ul>
        </div>
    </header>
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

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</body>

</html>