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


        <div class="uk-overlay uk-overlay-primary f-height" style="width:70%; margin:auto">

                @yield('content')

        </div>

    </div>
    <script src="https://kit.fontawesome.com/65a96d544f.js" crossorigin="anonymous"></script>


    <script>



        $(document).ready(function(){
            $("#movie").owlCarousel({
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
                        items:2,
                        nav:true
                    },
                    700:{
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
                        items:2,
                        nav:true
                    },
                    700:{
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
                        items:2,
                        nav:true
                    },
                    700:{
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
                        items:2,
                        nav:true
                    },
                    700:{
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
