<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link href="/css/welcome.css" rel="stylesheet">
        <!-- Styles -->
       
    </head>
    <body class="antialiased">
        
        <nav class="navbar navbar-expand-lg navbar-light ">
            <div class="container-fluid">
              <Note class="navbar-brand" href="#">Notes App</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
              </div>
            </div>
          </nav>
          <br><br>

          <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="form">
                        <h2>Login Form</h2>
                        <form action="/auth" method="POST">
                            @csrf
                            @method("GET")
                            <input type="text" name="email" placeholder="Email">
                            @if(session("auth"))
                                <br><br>
                                <p style="color:red;font-size:12px">Email does not exist</p>
                                {{ session()->forget("auth") }}
                            @endif
                            <br><br>
                            <input type="password" name="pass" placeholder="Password">
                            @if(session("password"))
                                <br><br>
                                <p style="color:red;font-size:12px">Password is incorrect</p>
                                {{ session()->forget("password") }}
                            @endif
                            <br><br>
                            @if(session("empty"))
                                <p style="color:red">Fields are empty</p>
                                {{ session()->forget("empty") }}
                            @endif
                            <button>Login</button><span style="margin-left: 20px"><a style="text-decoration: none" href="/register-page">Register</a></span>
                            <br><br><br><br>
                        </form>
                    </div>
                </div>
            </div>
          </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>
