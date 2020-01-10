<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Anizet') }}</title>
    <link rel="icon" href="{{ URL::asset('/css/icon-1.png') }}" type="image/x-icon"/>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="" id="loader">
        <div class="uk-position-center">
            <div class="uk-margin-bottom">
                <img src="{{ URL::asset('/css/icon-1.png') }}" alt="">
            </div>

            <div uk-spinner></div>
        </div>
    </div>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
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
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Нэвтрэх') }}</a>
                            </li>
                           <!-- @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif-->
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('poster')}}">
                                {{__('Төсөл нэмэх')}}
                              </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('vid.post')}}">
                                {{__('Анги нэмэх')}}
                              </a>
                            </li>

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->username }} <span class="caret"></span>
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
        var vid = document.getElementById("myVideo");
vid.ontimeupdate = function() {myFunction()};

function myFunction() {
     if(vid.currentTime < 20){
      document.getElementById('skip-intro').style.display = 'block';
     }else{
      document.getElementById('skip-intro').style.display = 'none';
     }
 }
    </script>

    <script>

 $(document).ready(function() {
                    $("#skip-intro").removeClass('uk-animation-reverse');
                    document.getElementById('myvideo').addEventListener("timeupdate",
                    function() {
                        if(this.currentTime > 20) {
                            $("#skip-intro").addClass('uk-animation-reverse');
                        }
                        else {
                            $("#skip-intro").removeClass('uk-animation-reverse');
                        }
                    });
                });


        $(document).ready(function(){
            $("#movie").owlCarousel({
                loop:false,
                margin:10,
                autoWidth:false,
                autoHeight:false,
                responsiveClass:true,
                responsive:{
                0:{
                    items:1,
                    nav:true
                },
                600:{
                    items:4,
                    nav:false,
                },
                1000:{
                items: 7,
                nav:true,

                    }
                }
            })

            $("#series").owlCarousel({
                loop:false,
                margin:10,
                autoWidth:false,
                autoHeight:false,
                responsiveClass:true,
                responsive:{
                    0:{
                        items:1,
                        nav:true
                    },
                    600:{
                        items:4,
                        nav:false,
                    },
                    1000:{
                        items:7,
                        nav:true,
                    }
                }
            });

            $("#manga").owlCarousel({
                loop:false,
                margin:10,
                autoWidth:false,
                autoHeight:false,
                responsiveClass:true,
                responsive:{
                    0:{
                        items:1,
                        nav:true
                    },
                    600:{
                        items:4,
                        nav:false,
                    },
                    1000:{
                        items:7,
                        nav:true,
                    }
                }
            });

            $("#music").owlCarousel({
                loop:false,
                margin:10,
                autoWidth:false,
                autoHeight:false,
                responsiveClass:false,
                responsive:{
                    0:{
                        items:1,
                        nav:true
                    },
                    600:{
                        items:4,
                        nav:false,
                    },
                    1000:{
                        items:7,
                        nav:true,
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
                        items:1,
                        nav:true
                    },
                    600:{
                        items:4,
                        nav:false,
                    },
                    1000:{
                        items:7,
                        nav:true,
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
