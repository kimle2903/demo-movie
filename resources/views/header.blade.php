 
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
<script>
    $(".search").keyup(function(event){
       if(event.keyCode == 13){
           $keyword = $('.search').val();
            location.href = "{{url('/')}}/page-search/" + $keyword.toLowerCase().replace(/ /g,'-').replace(/[^\w-]+/g,'') ;
       }
    })
</script>