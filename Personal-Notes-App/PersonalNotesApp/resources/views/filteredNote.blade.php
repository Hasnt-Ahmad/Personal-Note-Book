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
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
        <!-- Styles -->
       
    </head>
    <body class="antialiased">
        
        <nav class="navbar navbar-expand-lg navbar-light ">
            <div class="container-fluid">
                <a href="/home">Notes App</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
              </div>
            </div>
          </nav>
          
          <br><br>
          <div class="container-fluid">
            <div class="row">
                <div class="col-2 side-bar">
                    <br>
                    <p style="font-weight: 600;font-size:18px">{{session("user_name")}}</p>
                    <hr style="color: rgb(147, 147, 147)">
                    <br><br>
                    <form action="/home" method="POST">
                        @csrf
                        @method("GET")
                        <div class="search-div">
                            <i class="bi bi-search"></i>
                            <input class="search-note" type="text" placeholder="Search Notes" name="search">
                        </div>
                    </form>
                    <br>
                    <hr style="color: rgb(147, 147, 147)">
                    <form>
                        <ul>
                            <li><a href="/add-note"><i class="bi bi-plus"></i><span>Add Note</span></li></a>
                        </ul>
                    </form>
                    <hr style="color: rgb(147, 147, 147)">
                    <ul>
                        <p style="color: grey">Your Notes</p>
                        
                        @foreach ($tags as $tag)
                            <li><a href="/filtered/{{$tag->tag_name}}">{{$tag->tag_name}}</a></li>
                                <br>
                        @endforeach
                    </ul>
                </div>
                <div class="col-10">
                    <div class="row note-row">
                        @foreach ($tags as $tag)
                            <div class="col-md-4">
                                <div class="row">
                                    <h4 style="font-weight:500;background-color: white;width:170px;padding:12px;border:1px solid rgb(220, 220, 220);border-radius:10px;">{{ $tag->tag_name }}</h4>
                                </div>
                                <br><br>
                            @foreach ($notes as $note)
                            
                                <div class="row note-container" style="background-color:white;padding:15px;width:250px;border-radius:10px;border:1px solid rgb(220, 220, 220)">
                                    <a href="/editnote/{{$note->note_id}}" style="text-decoration:none;color:black">
                                        <h6 style="color: rgb(46, 46, 46);font-weight:700">{!! $note->title !!}</h6>
                                        <p style="color: rgb(207, 207, 207)!important ;font-size:13px;width:200px;">{!! $note->content !!}</p>
                                        <p style="color: rgb(197, 197, 197) !important;font-size:12px;width:200px;">Updated at {{$note->updated_at}}</p>
                                    </a>
                                    <a href="/deletenote/{{$note->note_id}}" class="delete-button"><i class="bi bi-trash3-fill"></i></a>
                                </div>
                                <br><br>
                            @endforeach
                        @endforeach
                    </div>
                </div>
            </div>
          </div>
          

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>
