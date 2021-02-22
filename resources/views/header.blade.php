 
 <div id="header-detail">
    <div class="nav-header">
        <div class="logo">
            <a href="" class="link-home"><img src="/assets/images/logo.png" alt="logo">KVMovies</a>
        </div>

        <div class="menu-navbar">
            <ul class="navbar-list">
                <li class="navbar-item">
                    <a href="/" class="navbar-link" title="Home">HOME</a>
                </li>
                <li class="navbar-item">
                    <a href="" class="navbar-link" title="Genre">GENRE</a>
                    <ul class="navbar-list-sub">
                        @foreach ($genre as $item)
                            <li class="navbar-item-sub" title="{{$item->name}}">
                                <a href="{{url('/')}}/genner/{{str_replace(" ", "-",strtolower($item->name))}}" class="navbar-link-sub">{{ strlen($item->name) > 18 ? substr($item->name, 0, 18) . '...':$item->name }}</a>
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
        <div class="search-login">
            <div class="search-wrap">
                <div class="input-search">
                    <input type="search" name="" class="search" placeholder="Enter keywords...">
                    <span class="wrap-icon-search"><i class="fas fa-search"></i></span>
                </div>

            </div>

            <button class="login"><i class="far fa-user icon-login"></i>Login</button>

        </div>
    </div>
</div>
<header id="header-mobile">
    <div class="content-header-mobile">
        <div class="header-nav-mobile">
            <label for="nav-mobile-input" class="menu-mobile">
                <i class="fas fa-bars menu-bar" ></i>
                
            </label>
            <div class="logo"><a href="" class="link-home"><img src="/assets/images/logo.png" alt="logo"></a></div>
            <div class="btn-login-log">
                    <button class="login"><i class="far fa-user icon-login"></i></button>
            </div>
        </div>
            <div class="menu-mobile-list">
                    <label for="nav-mobile-input" class="close-menu"><i class="fas fa-angle-left"></i> Close menu</label>
                    <ul class="list-item-menu">
                        <li class="item-menu">
                            <a href="/" class="item-menu-link">Home</a>
                        </li>
                            <li class="item-menu">
                            <a href="#" class="item-menu-link"> 
                                <span>Genre</span>
                                <span class="link-icon"><i class="fas fa-plus-square icon-plus icon"></i></span>
                                
                            </a>
                            
                            <ul class="sub-list-item clearfix">
                                @foreach ($genre as $item)
                                    <li class="sub-item-menu">
                                        <a href="{{url('/')}}/country/{{str_replace(" ", "-",strtolower($item->name))}}" class="sub-link-item-menu">{{ strlen($item->name) > 18 ? substr($item->name, 0, 18) . '...':$item->name }}</a>
                                        
                                    </li>
                                @endforeach
                                
                            </ul>
                            
                        </li>
                            <li class="item-menu">
                            <a href="#" class="item-menu-link"> <span> Country</span>
                                    <span class="link-icon"><i class="fas fa-plus-square icon-plus icon"></i></span>
                            </a>
                                <ul class="sub-list-item clearfix">
                                @foreach ($country as $item)
                                    <li class="sub-item-menu">
                                        <a href="{{url('/')}}/country/{{str_replace(" ", "-",strtolower($item->name))}}" class="sub-link-item-menu">{{$item->name}}</a>
                                    </li>
                                @endforeach
                                
                            </ul>
                        </li>
                            <li class="item-menu">
                            <a href="" class="item-menu-link">Movies</a>
                        </li>
                            <li class="item-menu">
                            <a href="" class="item-menu-link">TV shows</a>
                        </li>
                            <li class="item-menu">
                            <a href="" class="item-menu-link">Top IMDB</a>
                        </li>
                            <li class="item-menu">
                            <a href="" class="item-menu-link">Android App</a>
                        </li>

                    </ul>
                </div>
        <div class="search-mobile">
            <span class="wrap-icon-search"><i class="fas fa-search"></i></span>
            <input type="text" name="search" id="search-mobile" placeholder="Enter keywords">
        </div>
    </div>
</header>
<input type="checkbox" name="nav-input" id="nav-mobile-input" hidden />
<label for="nav-mobile-input" class="nav-overplay"> </label>
<script>
     $(".menu-mobile").click(function(){

        if($('#nav-mobile-input').prop("checked")){
            $(".menu-mobile-list").css('transform', 'translate(-100%)');
            $(".menu-bar").css('display', 'inline-block');
        }else{
            $(".menu-mobile-list").css('transform', 'translate(0)');
            $(".menu-mobile-list").css('opacity', '1');
        }
    })
    $(".nav-overplay").click(function(){
        if($('#nav-mobile-input').prop("checked")){
            $(".menu-mobile-list").css('transform', 'translate(-100%)');
            $(".menu-bar").css('display', 'inline-block');
        }

    })
    $(".close-menu").click(function(){
        $(".menu-mobile-list").css('transform', 'translate(-100%)');
        $(".menu-bar").css('display', 'inline-block');
    })
    
    $('span.link-icon').click(function(){
        $(this).parent().parent().find($('.sub-list-item')).slideToggle('slow');
        $(this).find($(".icon")).toggleClass('fa-plus-square fa-minus-square');
    })
    $(".search").keyup(function(event){
       if(event.keyCode == 13){
           $keyword = $('.search').val();
            location.href = "{{url('/')}}/page-search/" + $keyword.toLowerCase().replace(/ /g,'-').replace(/[^\w-]+/g,'') ;
       }
    })
     $('#search-mobile').keyup(function(event){
        if(event.keyCode == 13){
            $keyword = $('#search-mobile').val();
            location.href = "{{url('/')}}/page-search/" + $keyword.toLowerCase().replace(/ /g,'-').replace(/[^\w-]+/g,'') ;
            // search($keyword);
        }
        
    })

</script>