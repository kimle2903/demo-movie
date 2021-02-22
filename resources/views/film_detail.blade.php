 @extends('master')
 @section('content')
    <div class="content-detail">
        <div class="detail-page clearfix">
            <div class="image-detail" style="background-image: url('{{$filmDetail->image_poster}}' ); ">

            </div>
            <div class=" info-detail">
                <div class="prebreadcrumb">
                    <ul class="nav-breadcrumb">
                        <li>
                            <a href="/" class="link-breadcrumb">Home</a> /
                        </li>
                        <li>
                            <a href="" class="link-breadcrumb">{{$film->cate_type == 0? 'Movie': 'TV'}}</a> /
                        </li>
                        <li>
                            {{$film->name}}
                        </li>
                    </ul>
                </div>
                <div class="info-detail-movie clearfix ">
                    <div class="image-film ">
                        <img src="{{ asset('storage/'.$film->image) }}" alt=" ">
                        <div class="block-rating">
                            <div class="vote"><span>0.0</span>/ 0 voted</div>
                            <div class="progress">

                                <div class="progress-bar bg-success" role="progressbar" style="" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <button class="btn btn-focus btn-sm like"><i class="fas fa-thumbs-up icon-like"></i>Like</button>
                        <button class="btn btn-focus btn-sm dislike"><i class="fas fa-thumbs-up icon-dislike"></i>Dislike</button>


                    </div>
                    <div class="info-film ">
                        <div class="btn-control-wrap ">
                            <button class="btn-control watch-now "><i class="fas fa-caret-right icon-btn"></i>Watch now</button>
                            <button class="btn-control add-favorite "><i class="fas fa-plus icon-btn"></i>Add to favorite</button>
                        </div>
                        <h1 class="name-movie "> <a href="">{{$film->name}}</a></h1>
                        <div class="trailer-wrap ">
                            <button class="trailer "  data-toggle="modal" data-target="#trailer"><i class="fas fa-video icon-video "></i> Trailer</button>
                            <button class="quality-movie ">{{$film->quality}}</button>
                        </div>
                        <p class="desc ">{{$filmDetail->desciption}}</p>
                        <div class="element ">
                            <div class="row ">
                                <div class="col-lg-5 col-md-5  col-12 ">
                                    <p class="released "><span class="font-400">Released:</span> {{$filmDetail->released}}</p>
                                    <div class="genre-wrap ">
                                        <span class="font-400">Genre:</span>
                                        <!-- <ul class=" list-genre ">
                                            <li class="item-genre ">
                                                <a href=" " class="link-genre ">Crime</a>
                                            </li>
                                            <li class="item-genre ">
                                                <a href=" " class="link-genre ">Thriller</a>
                                            </li>
                                        </ul> -->
                                        {{strlen($filmDetail->genre)> 0? $filmDetail->genre: "N/A"}}
                                    </div>

                                    <div class="cast-wrap ">
                                        <span class="font-400">Casts:</span>
                                        <!-- <ul class=" list-cast ">
                                            <li class="item-cast ">
                                                <a href=" " class="link-cast ">Jack Topalian</a>
                                            </li>
                                            <li class="item-cast ">
                                                <a href=" " class="link-cast ">Natalie Morales</a>
                                            </li>
                                        </ul> -->
                                       {{strlen($filmDetail->cats)> 0 ?$filmDetail->cats: "N/A" }}
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6  col-12">
                                    <p class="time "> <span class="font-400">Duration:</span> {{ strlen($film->time)> 0 ? $film->time: "N/A"}}</p>
                                    <p class="country ">
                                        <span class="font-400">Country:</span><a href=" ">{{strlen($filmDetail->country)> 0 ? $filmDetail->country: "N/A"}}</a>
                                    </p>
                                    <p class="product ">
                                        <span class="font-400">Production:</span> {{strlen($filmDetail->product_name) > 0 ? $filmDetail->product_name: 'N/A'}}
                                    </p>
                                </div>
                            </div>


                        </div>
                    </div>

                    <!-- <div class="detail-tags ">
                        <h3 class="btn btn-sm btn-light btn-tag ">loren</h3>
                    </div> -->
                </div>
                <div class="list-tags mb-3">
                    @foreach ($tags as $tag)
                     <h2 class="btn btn-sm btn-light btn-tag">{{$tag}}</h2>
                    @endforeach
                   
                   
                </div>

                {{-- <div class="list-server-wrap">
                    <p class="notice">If current server doesn't work please try other servers below.</p>



                </div> --}}

            </div>

        </div>
        <div class="list-related ">
            <h3>You may also like</h3>
            <div class="film-list-wrap clearfix">
                @foreach ($filmRelated as $movie)
                    @if($movie->id != $filmDetail->film_id)
                        <div class="film-item" title="{{$movie->name}}">
                            <div class="film-poster">
                                <span class="film-poster-quality">{{$movie->quality}}</span>
                                <a href="/{{$movie->slug_cate}}/{{$movie->slug_name}}/{{$movie->id}}" class="link-film">
                                    <img src="{{ asset('storage/'.$movie->image) }}" alt="" class="img-film">
                                     <span class="cricle"></span>
                                    <i class="fas fa-play icon-play"></i>
                                </a>

                            </div>
                            <div class="film-detail">
                                <a href="/{{$movie->slug_cate}}/{{$movie->slug_name}}/{{$movie->id}}" class="name-film" title="{{$movie->name}}">{{strlen($movie->name)> 20? substr($movie->name, 0, 20).'...' : $movie->name}}</a>
                                <div class="film-info">
                                    <span class="film-year">{{$movie->year}}</span>
                                    <span class="dot"></span>
                                    <span class="film-time">{{$movie->time}} </span>
                                    <span class="film-type">{{$movie->cate_type == 0? 'Movie': 'TV'}}</span>
                                </div>
                            </div>
                        </div>
                    @endif
                  

                @endforeach
            </div>
        </div>
    </div>
    <div class="modal fade" id="trailer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="iframe-cus">
                        <iframe width="560" height="315" src="{{$filmDetail->trailer}}" frameborder="0" allow="accelerometer; autoplay;  encrypted-media" allowfullscreen></iframe>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            $('.trailer').click(function(){
                $('#trailer').modal('show');
            })
        })
    </script>
 @endsection

