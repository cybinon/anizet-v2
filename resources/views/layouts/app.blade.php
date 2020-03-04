<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- SEO Optimize --}}
    <meta name="description" content="Хязгааргүй төсөөлөлд хөгжих орчуулагчдын бүлгэм.">
    <meta name="keywords" content="anizet, gintama, анимэ, манга, тоглоом, zetteam, anime, manga, анимэ үзэх, anime uzeh">
    {{-- Facebook Meta tag --}}
    <meta property="og:url"           content="https://www.anizet.net" />
    <meta property="og:type"          content="article" />
    <meta property="og:title"         content="AniZet" />
    <meta property="og:description"   content="Хязгааргүй Төсөөлөл" />
    <meta property="og:image"         content="{{ URL::asset('/css/logo.png') }}" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Anizet') }}</title>
    <link rel="icon" href="{{ URL::asset('/css/icon-1.png') }}" type="image/x-icon"/>

    <!-- Scripts -->

    <script src="{{ asset('js/app.js') }}"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-126866397-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-126866397-3');
</script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div class="" id="loader">
        <div class="uk-position-center text-center">
            <div class="uk-margin-bottom">
                <img src="{{ URL::asset('/css/logo.png') }}" style="width:100px;" alt="">
            </div>
            <div uk-spinner></div>

        </div>
    </div>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm" uk-sticky>
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{-- config('app.name', 'Laravel') --}}
                <img class="logo" src="{{URL::asset('css/logo.png')}}" alt="zet-logo">
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('list') }}"><i class="fa fa-list"></i> Жагсаалт</a>
                        </li>


                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}"><i class="fa fa-user"></i> {{ __('Нэвтрэх') }}</a>
                            </li>

                          @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">Бүртгүүлэх</a>
                                </li>
                            @endif
                        @else @if (Auth::user()->status == 1)
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('poster')}}">
                                {{__('Төсөл нэмэх')}}
                              </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('vidpost')}}">
                                {{__('Анги нэмэх')}}
                              </a>
                            </li>
                            @endif

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->username }} #{{Auth::user()->id}}<span class="caret"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ url('profile/'.Auth::user()->id) }}">
                                        {{ __('Миний хэсэг') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>


                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <div class="uk-overlay uk-overlay-primary f-height">
            @yield('content')
        </div>

    </div>
    <script src="https://kit.fontawesome.com/65a96d544f.js" crossorigin="anonymous"></script>


    <script>



        $(document).ready(function(){


            $("#series").owlCarousel({
                dots: true,
                autoplay:true,
                autoplayTimeout:5000,
                autoplayHoverPause:true,

                loop:false,
                margin:10,
                autoWidth:false,
                autoHeight:false,
                responsiveClass:true,
                responsive:{
                    0:{
                        items:2,
                        nav:false
                    },
                    700:{
                        items:4,
                        nav:false,
                    },
                    1000:{
                        items:7,
                        nav:false,
                    }
                }
            });

            $("#music").owlCarousel({
                dots: true,
                autoplay:true,
                autoplayTimeout:5000,
                autoplayHoverPause:true,

                loop:true,
                margin:10,
                autoWidth:false,
                autoHeight:false,
                responsiveClass:false,
                responsive:{
                    0:{
                        items:2,
                        nav:false,
                    },
                    700:{
                        items:4,
                        nav:false,
                    },
                    1000:{
                        items:7,
                        nav:false,
                    }
                }
            });
             $("#other").owlCarousel({
                dots: true,
                autoplay:true,
                autoplayTimeout:5000,
                autoplayHoverPause:true,

                loop:false,
                margin:10,
                autoWidth:false,
                autoHeight:false,
                responsiveClass:true,
                responsive:{
                0:{
                    items:2,
                    nav:true
                },
                700:{
                    items:4,
                    nav:false,
                },
                1000:{
                    items: 4,
                    nav:false,

                    }
                }
            });

            $("#season").owlCarousel({
                loop:false,
                margin:10,
                autoWidth:false,
                autoHeight:false,
                responsiveClass:false,
                responsive:{
                    0:{
                        items:2,
                        nav:false
                    },
                    700:{
                        items:4,
                        nav:false,
                    },
                    1000:{
                        items:3,
                        nav:false,
                    }
                }
            });

            });

            </script>



<script>
    $(document).ready(function() {
        var doUpdate = function() {
            $('#loader').addClass("uk-animation-slide-top-small uk-animation-reverse");
        };
        var doUpdate1 = function() {
            $('#loader').css("display", "none");
        };
        setInterval(doUpdate, 600);
        setInterval(doUpdate1, 1000);
    });

    </script>

    <script src="//cdn.jsdelivr.net/npm/afterglowplayer@1.x"></script>
</body>
</html>
