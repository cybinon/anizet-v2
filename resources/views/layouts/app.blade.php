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
    <meta property="og:title"         content="ANIZET" />
    <meta property="og:description"   content="Хязгааргүй Төсөөлөл" />
    <meta property="og:image"         content="{{ URL::asset('/css/logo.png') }}" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="propeller" content="0bf167543ec8154358aa18408801c19a">
    <script>

    </script>
    <link rel="icon" href="{{ URL::asset('/images/shortcut.png') }}" type="image/x-icon"/>

    @if(View::hasSection('title'))
        @yield('title')
    @else
    <title>ANIZET | Хязгааргүй төсөөлөл</title>
    @endif


    @if(View::hasSection('head-script'))
        @yield('head-script')
    @else
    <!-- Default Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://unpkg.com/video.js@7/dist/video-js.min.css" rel="stylesheet">
    <link  href="https://unpkg.com/@videojs/themes@1/dist/forest/index.css"  rel="stylesheet"/>

    @endif
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
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@4.x/css/materialdesignicons.min.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.0/trix.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.0/trix.js"></script>

</head>


@if(View::hasSection('body'))
        @yield('body')
    @else
<body>
    @endif


<div class="" id="loader">
        <div class="uk-position-center text-center">
            <div class="uk-margin-bottom">
                <img src="{{ URL::asset('/images/loading.png') }}" style="max-width:200px;" alt="Anizet-loading">
            </div>
            <div uk-spinner></div>

        </div>
    </div>

    <div id="app">
        @yield('content')
    </div>







<script>
        $(document).ready(function() {
            $('#loader')
            .delay(200)
            .on(500)
            .fadeOut("slow");
        });
</script>

             <script src="https://kit.fontawesome.com/65a96d544f.js" crossorigin="anonymous"></script>


</body>
</html>

