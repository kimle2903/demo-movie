 @extends('master')
 @section('content')
    <div class="content-search-key">
        <div class="wrap-search-key">
            @if (isset($name))
                <h2>{{$name}} Movies and TV Shows</h2>
            @elseif(isset($nameCountry))
                <h2>{{$nameCountry}}</h2>
            @else
                <h2>Search results for "{{$keyword}}"</h2>
            @endif
            @if (count($data) > 0)
                <div class="latest-movies list-film">
                    <div class="film-list-wrap clearfix">
                        @foreach ($data as $movie)
                            <div class="film-item" title="{{$movie->name}}">
                            <div class="film-poster">
                                <span class="film-poster-quality">{{$movie->quality}}</span>
                                <a href="{{url('/')}}/{{$movie->slug_cate}}/{{$movie->slug_name}}/{{$movie->id}}" class="link-film">
                                    <img src="{{ asset('storage/'.$movie->image) }}" alt="" class="img-film">
                                    <span class="cricle"></span>
                                    <i class="fas fa-play icon-play"></i>
                                </a>

                            </div>
                            <div class="film-detail">
                                <a href="{{url('/')}}/{{$movie->slug_cate}}/{{$movie->slug_name}}/{{$movie->id}}" class="name-film" title="{{$movie->name}}">{{ strlen($movie->name) > 18 ? substr($movie->name, 0, 18) . '...':$movie->name }}</a>
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
        
            @endif 
        </div>
       
    </div>
@endsection