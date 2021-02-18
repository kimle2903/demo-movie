<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demo-movie</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/fonts/css/all.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/base.css">
    <link rel="stylesheet" href="./assets/css/style.css">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="./assets/fonts/js/all.min.js"></script>
    <script src="./assets/js/jquery.js"></script>
</head>

<body>
    <div id="app">
        <div class="container-fruid">
            <header id="header">
                <div class="content-header">
                    <div class="header-nav">
                        <div class="row">
                            <div class="col-2">
                                <div class="logo">
                                    <a href="" class="link-home"><img src="/assets/images/logo.png" alt="logo">KVMovies</a>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="menu-navbar">
                                    <ul class="navbar-list">
                                        <li class="navbar-item">
                                            <a href="" class="navbar-link" title="Home">HOME</a>
                                        </li>
                                        <li class="navbar-item">
                                            <a href="" class="navbar-link" title="Genre">GENRE</a>
                                            <ul class="navbar-list-sub">
                                                @foreach ($genre as $item)
                                                    <li class="navbar-item-sub" title="{{$item->name}}">
                                                        <a href="{{url('/')}}/genner/{{str_replace(" ", "-",strtolower($item->name))}}" class="navbar-link-sub">{{ strlen($item->name) > 20 ? substr($item->name, 0, 20) . '...':$item->name }}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        <li class="navbar-item">
                                            <a href="" class="navbar-link" title="Country">COUNTRY</a>
                                            <ul class="navbar-list-sub">
                                                @foreach ($country as $item)
                                                    <li class="navbar-item-sub" title="{{$item->name}}">
                                                        <a href="{{url('/')}}/country/{{str_replace(" ", "-",strtolower($item->name))}}" class="navbar-link-sub">{{ strlen($item->name) > 18 ? substr($item->name, 0, 18) . '...':$item->name }}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        <li class="navbar-item">
                                            <a href="" class="navbar-link" title="Movies">MOVIES</a>
                                        </li>
                                        <li class="navbar-item">
                                            <a href="" class="navbar-link" title="TV Show">TV SHOWS</a>
                                        </li>
                                        <li class="navbar-item">
                                            <a href="" class="navbar-link" title="Top IMDB">TOP IMDB</a>
                                        </li>
                                        <li class="navbar-item">
                                            <a href="" class="navbar-link" title="Android app">ANDROID APP</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-2 btn-login">
                                <button class="login"><i class="far fa-user icon-login"></i>Login</button>
                            </div>
                        </div>

                    </div>
                </div>
                <h2 class="title-header">Find Movies, TV shows and more</h2>
                <div id="search-home">
                    <div class="search">
                        <span class="wrap-icon-search"><i class="fas fa-search"></i></span>
                        <input type="text" placeholder="Enter keywords..." id="search-movie">
                        <p class="btn-search"><i class="fas fa-arrow-right icon-btn-search"></i></p>

                    </div>
                    <div class="content-search">

                    </div>
                </div>
            </header>
            <div id="content-app">
                <div class="content-wrap">
                    <div class="content-desc">
                        Hd movies online - watch new movies online free - Watch movies online for free and watch tv shows online free with HiMovies.to . We're a great alternative to putlocker tv. If you want to stream movies online free, just enter Himovies and you can enjoy
                        all the free hd movies instantly - tv shows online free, free streaming tv shows, watch free tv shows online, stream movies online free, hd movies online, watch tv series online. We have big collections of watch series stream for
                        free, you can find your favorite serie and begin to watch tv shows online in HD with English subtitle without having an account.

                    </div>

                    <div class="tranding">
                        <h3>Trending</h3>
                        <button class="movies trading-active"><i class="icon-tranding fas fa-play-circle"></i>Movies</button>
                        <button class="tv-show "><i class="icon-tranding fas fa-list"></i>TV Shows</button>

                    </div>
                    <div class="tab-content">
                        <!-- Show  movies -->
                        <div class="trending-movies list-film">
                            <div class="film-list-wrap clearfix">
                                @foreach ($newMovieFilm as $newFilm)
                                    <div class="film-item">
                                        <div class="film-poster" title="{{$newFilm->name}}">
                                            <span class="film-poster-quality">{{$newFilm->quality}}</span>
                                            <a href="{{$newFilm->slug_cate}}/{{$newFilm->slug_name}}/{{$newFilm->id}}" class="link-film">
                                                <img src="{{ asset('storage/'.$newFilm->image) }}" alt="" class="img-film">
                                                {{-- <i class="fas fa-play-circle icon-play"></i> --}}
                                                <span class="cricle"></span>
                                                <i class="fas fa-play icon-play"></i>
                                            </a>

                                        </div>
                                        <div class="film-detail">
                                            <a href="{{$newFilm->slug_cate}}/{{$newFilm->slug_name}}/{{$newFilm->id}}" class="name-film" title="{{$newFilm->name}}"> {{ strlen($newFilm->name) > 20 ? substr($newFilm->name, 0, 20) . '...':$newFilm->name }}</a>
                                            <div class="film-info">
                                                <span class="film-year">{{$newFilm->year}}</span>
                                                <span class="dot"></span>
                                                <span class="film-time">{{$newFilm->time}} </span>
                                                <span class="film-type">{{$newFilm->cate_type == 0? 'Movie': 'TV'}}</span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                


                            </div>
                        </div>

                        <!-- Show  tv-show -->
                        <!-- <div class="trending-tv-show list-film">
                            <div class="film-list-wrap clearfix">
                                <div class="film-item">
                                    <div class="film-poster">
                                        <span class="film-poster-quality">HD</span>
                                        <a href="#" class="link-film">
                                            <img src="https://img.himovies.to/resize/180x270/4c/2a/4c2a0566f1b3d186f5e6e30e50bcd26e/4c2a0566f1b3d186f5e6e30e50bcd26e.jpg" alt="" class="img-film">
                                            <i class="fas fa-play-circle icon-play"></i>
                                        </a>

                                    </div>
                                    <div class="film-detail">
                                        <a href="#" class="name-film">The Little Things</a>
                                        <div class="film-info">
                                            <span class="film-year">2020</span>
                                            <span class="dot">*</span>
                                            <span class="film-time">127m </span>
                                            <span class="film-type">Movie</span>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div> -->

                        <!-- Latest Movies -->
                        <div class="latest-movies list-film">
                            <h3>Action Movies</h3>
                            <div class="film-list-wrap clearfix">
                                @foreach ($actionMovie as $movie)
                                    <div class="film-item" title="{{$movie->name}}">
                                    <div class="film-poster">
                                        <span class="film-poster-quality">{{$movie->quality}}</span>
                                        <a href="{{$movie->slug_cate}}/{{$movie->slug_name}}/{{$movie->id}}" class="link-film">
                                            <img src="{{ asset('storage/'.$movie->image) }}" alt="" class="img-film">
                                            <span class="cricle"></span>
                                            <i class="fas fa-play icon-play"></i>
                                        </a>

                                    </div>
                                    <div class="film-detail">
                                        <a href="{{$movie->slug_cate}}/{{$movie->slug_name}}/{{$movie->id}}" class="name-film" title="{{$movie->name}}">{{ strlen($movie->name) > 20 ? substr($movie->name, 0, 20) . '...':$movie->name }}</a>
                                        <div class="film-info">
                                            <span class="film-year">{{$movie->year}}</span>
                                            <span class="dot"></span>
                                            <span class="film-time">{{$movie->time}}</span>
                                            <span class="film-type">{{$movie->cate_type == 0? 'Movie': 'TV'}}</span>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                
                            </div>

                        </div>

                        <!-- Latest TV Shows -->
                        <div class="latest-movies list-film">
                            <h3>Comedy Movies</h3>
                            <div class="film-list-wrap clearfix">
                                @foreach ($kidsMovie as $movie)
                                    <div class="film-item" title="{{$movie->name}}">
                                    <div class="film-poster">
                                        <span class="film-poster-quality">{{$movie->quality}}</span>
                                        <a href="{{$movie->slug_cate}}/{{$movie->slug_name}}/{{$movie->id}}" class="link-film">
                                            <img src="{{ asset('storage/'.$movie->image) }}" alt="" class="img-film">
                                            <span class="cricle"></span>
                                            <i class="fas fa-play icon-play"></i>
                                        </a>

                                    </div>
                                    <div class="film-detail">
                                        <a href="{{$movie->slug_cate}}/{{$movie->slug_name}}/{{$movie->id}}" class="name-film" title="{{$movie->name}}">{{strlen($movie->name)> 20? substr($movie->name, 0, 20).'...' : $movie->name}}</a>
                                        <div class="film-info">
                                            <span class="film-year">{{$movie->year}}</span>
                                            <span class="dot"></span>
                                            <span class="film-time">{{$movie->time}} </span>
                                            <span class="film-type">{{$movie->cate_type == 0? 'Movie': 'TV'}}</span>
                                        </div>
                                    </div>
                                </div>

                                @endforeach

                            </div>

                        </div>

                        <!-- Coming Soon -->
                        
                    </div>

                </div>

            </div>
          {{-- footer --}}
          @include('footer')
        </div>
    </div>
    <script>
        $(document).ready(function(){
            $('#search-movie').keyup(function(event){
                if(event.keyCode == 13){
                    $keyword = $('#search-movie').val();
                    location.href = "{{url('/')}}/page-search/" + $keyword.toLowerCase().replace(/ /g,'-').replace(/[^\w-]+/g,'') ;
                    // search($keyword);
                }
               
            })
            $(".btn-search").click(function(){
                $keyword = $('#search-movie').val();
                location.href = "{{url('/')}}/page-search/" + $keyword.toLowerCase().replace(/ /g,'-').replace(/[^\w-]+/g,'') ;
            })

            function search($keyword){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{url('/')}}/search", 
                    type: 'POST', 
                    data:{
                        _method             : "GET",
                        keyword: $keyword,
                    }, 
                    success:function($data){
                       alert($keyword);
                       location.href = "{{url('/')}}/page-search/" + $keyword
                    }
                })
            }
        })

        
        
    </script>
</body>

</html>

