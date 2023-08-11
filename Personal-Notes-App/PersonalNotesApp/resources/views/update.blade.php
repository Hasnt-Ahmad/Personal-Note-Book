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
        <link href="/css/home.css" rel="stylesheet">
        <link href="/css/addnote.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
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
          

          <div class="container-fluid">
            <div class="row">
                <div class="col-2 side-bar">
                    <br>
                    <p style="font-weight: 600;font-size:18px">{{session("user_name")}}</p>
                    <br><br>
                    <form>
                        <div class="search-div">
                            <i class="bi bi-search"></i>
                            <input class="search-note" type="text" placeholder="Search Notes">
                        </div>
                    </form>
                    <br>
                    <br>
                    <form>
                        <ul>
                            <li><a href="#"><i class="bi bi-plus"></i><span>Add Note</span></li></a>
                        </ul>
                    </form>
                    <br>
                    <ul>
                        <li><a href="#">My Notes</a></li>
                        <br>
                        <li><a href="#">Todo List </a></li>
                        <br>
                        <li><a href="#">Projects </a></li>
                        <br>
                    </ul>
                </div>
                <div class="col-8">
                    <div class="add-note">
                        <h2>Edit Note</h2>
                        <form action="/update/{{$note->id}}" method="POST">
                            @csrf
                            <div class="form-content">
                                <label>Title:</label>
                                <textarea id="editor" name="title" >{{$note->title}}</textarea>
                            </div>
                            <br>
                            <div class="form-content">
                                <label>Content:</label>
                                <textarea id="editor1" name="content">{{$note->content}}</textarea>
                            </div>
                            <br>
                            <br><br>
                            <button>Update Note</button>
                        </form>
                        <br><br><br>
                    </div>
                </div>
            </div>
          </div>
         
        <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>

        <script>
            ClassicEditor
                .create( document.querySelector( '#editor' ) )
                .catch( error => {
                    console.error( error );
                } );
            ClassicEditor
                .create( document.querySelector( '#editor1' ) )
                .catch( error => {
                    console.error( error );
                } );
        </script>
  
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
    </body>
</html>
