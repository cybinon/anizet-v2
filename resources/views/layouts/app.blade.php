<?php

class __AntiAdBlock_3136735
{
    private $token = 'a36ef7611496beac68a2be93ba8656d147f5e42a';
    private $zoneId = '3136735';
    ///// do not change anything below this point /////
    private $requestDomainName = 'go.transferzenad.com';
    private $requestTimeout = 1000;
    private $requestUserAgent = 'AntiAdBlock API Client';
    private $requestIsSSL = false;
    private $cacheTtl = 30; // minutes
    private $version = '1';
    private $routeGetTag = '/v3/getTag';
    private $selfSourceContent;

    private function getTimeout()
    {
        $value = ceil($this->requestTimeout / 1000);

        return $value == 0 ? 1 : $value;
    }

    private function getTimeoutMS()
    {
        return $this->requestTimeout;
    }

    private function ignoreCache()
    {
        $key = md5('PMy6vsrjIf-' . $this->zoneId);

        return array_key_exists($key, $_GET);
    }

    private function getCurl($url)
    {
        if ((!extension_loaded('curl')) || (!function_exists('curl_version'))) {
            return false;
        }
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_USERAGENT => $this->requestUserAgent . ' (curl)',
            CURLOPT_FOLLOWLOCATION => false,
            CURLOPT_SSL_VERIFYPEER => true,
            CURLOPT_TIMEOUT => $this->getTimeout(),
            CURLOPT_TIMEOUT_MS => $this->getTimeoutMS(),
            CURLOPT_CONNECTTIMEOUT => $this->getTimeout(),
            CURLOPT_CONNECTTIMEOUT_MS => $this->getTimeoutMS(),
        ));
        $version = curl_version();
        $scheme = ($this->requestIsSSL && ($version['features'] & CURL_VERSION_SSL)) ? 'https' : 'http';
        curl_setopt($curl, CURLOPT_URL, $scheme . '://' . $this->requestDomainName . $url);
        $result = curl_exec($curl);
        curl_close($curl);

        return $result;
    }

    private function getFileGetContents($url)
    {
        if (!function_exists('file_get_contents') || !ini_get('allow_url_fopen') ||
            ((function_exists('stream_get_wrappers')) && (!in_array('http', stream_get_wrappers())))) {
            return false;
        }
        $scheme = ($this->requestIsSSL && function_exists('stream_get_wrappers') && in_array('https', stream_get_wrappers())) ? 'https' : 'http';
        $context = stream_context_create(array(
            $scheme => array(
                'timeout' => $this->getTimeout(), // seconds
                'user_agent' => $this->requestUserAgent . ' (fgc)',
            ),
        ));

        return file_get_contents($scheme . '://' . $this->requestDomainName . $url, false, $context);
    }

    private function getFsockopen($url)
    {
        $fp = null;
        if (function_exists('stream_get_wrappers') && in_array('https', stream_get_wrappers())) {
            $fp = fsockopen('ssl://' . $this->requestDomainName, 443, $enum, $estr, $this->getTimeout());
        }
        if ((!$fp) && (!($fp = fsockopen('tcp://' . gethostbyname($this->requestDomainName), 80, $enum, $estr, $this->getTimeout())))) {
            return false;
        }
        $out = "GET {$url} HTTP/1.1\r\n";
        $out .= "Host: {$this->requestDomainName}\r\n";
        $out .= "User-Agent: {$this->requestUserAgent} (socket)\r\n";
        $out .= "Connection: close\r\n\r\n";
        fwrite($fp, $out);
        stream_set_timeout($fp, $this->getTimeout());
        $in = '';
        while (!feof($fp)) {
            $in .= fgets($fp, 2048);
        }
        fclose($fp);

        $parts = explode("\r\n\r\n", trim($in));

        return isset($parts[1]) ? $parts[1] : '';
    }

    private function getCacheFilePath($url, $suffix = '.js')
    {
        return sprintf('%s/pa-code-v%s-%s%s', $this->findTmpDir(), $this->version, md5($url), $suffix);
    }

    private function findTmpDir()
    {
        $dir = null;
        if (function_exists('sys_get_temp_dir')) {
            $dir = sys_get_temp_dir();
        } elseif (!empty($_ENV['TMP'])) {
            $dir = realpath($_ENV['TMP']);
        } elseif (!empty($_ENV['TMPDIR'])) {
            $dir = realpath($_ENV['TMPDIR']);
        } elseif (!empty($_ENV['TEMP'])) {
            $dir = realpath($_ENV['TEMP']);
        } else {
            $filename = tempnam(dirname(__FILE__), '');
            if (file_exists($filename)) {
                unlink($filename);
                $dir = realpath(dirname($filename));
            }
        }

        return $dir;
    }

    private function isActualCache($file)
    {
        if ($this->ignoreCache()) {
            return false;
        }

        return file_exists($file) && (time() - filemtime($file) < $this->cacheTtl * 60);
    }

    private function getCode($url)
    {
        $code = false;
        if (!$code) {
            $code = $this->getCurl($url);
        }
        if (!$code) {
            $code = $this->getFileGetContents($url);
        }
        if (!$code) {
            $code = $this->getFsockopen($url);
        }

        return $code;
    }

    private function getPHPVersion($major = true)
    {
        $version = explode('.', phpversion());
        if ($major) {
            return (int)$version[0];
        }
        return $version;
    }

    private function parseRaw($code)
    {
        $hash = substr($code, 0, 32);
        $dataRaw = substr($code, 32);
        if (md5($dataRaw) !== strtolower($hash)) {
            return null;
        }

        if ($this->getPHPVersion() >= 7) {
            $data = @unserialize($dataRaw, array(
                'allowed_classes' => false,
            ));
        } else {
            $data = @unserialize($dataRaw);
        }

        if ($data === false || !is_array($data)) {
            return null;
        }

        return $data;
    }

    private function getTag($code)
    {
        $data = $this->parseRaw($code);
        if ($data === null) {
            return '';
        }

        if (array_key_exists('code', $data)) {
            $this->selfUpdate($data['code']);
        }

        if (array_key_exists('tag', $data)) {
            return (string)$data['tag'];
        }

        return '';
    }

    public function get()
    {
        $e = error_reporting(0);
        $url = $this->routeGetTag . '?' . http_build_query(array(
                'token' => $this->token,
                'zoneId' => $this->zoneId,
                'version' => $this->version,
            ));
        $file = $this->getCacheFilePath($url);
        if ($this->isActualCache($file)) {
            error_reporting($e);

            return $this->getTag(file_get_contents($file));
        }
        if (!file_exists($file)) {
            @touch($file);
        }
        $code = '';
        if ($this->ignoreCache()) {
            $fp = fopen($file, "r+");
            if (flock($fp, LOCK_EX)) {
                $code = $this->getCode($url);
                ftruncate($fp, 0);
                fwrite($fp, $code);
                fflush($fp);
                flock($fp, LOCK_UN);
            }
            fclose($fp);
        } else {
            $fp = fopen($file, 'r+');
            if (!flock($fp, LOCK_EX | LOCK_NB)) {
                if (file_exists($file)) {
                    $code = file_get_contents($file);
                } else {
                    $code = "<!-- cache not found / file locked  -->";
                }
            } else {
                $code = $this->getCode($url);
                ftruncate($fp, 0);
                fwrite($fp, $code);
                fflush($fp);
                flock($fp, LOCK_UN);
            }
            fclose($fp);
        }
        error_reporting($e);

        return $this->getTag($code);
    }

    private function getSelfBackupFilename()
    {
        return $this->getCacheFilePath($this->version, '');
    }

    private function selfBackup()
    {
        $this->selfSourceContent = file_get_contents(__FILE__);
        if ($this->selfSourceContent !== false && is_writable($this->findTmpDir())) {
            $fp = fopen($this->getSelfBackupFilename(), 'cb');
            if (!flock($fp, LOCK_EX)) {
                fclose($fp);

                return false;
            }
            ftruncate($fp, 0);
            fwrite($fp, $this->selfSourceContent);
            fflush($fp);
            flock($fp, LOCK_UN);
            fclose($fp);

            return true;
        }

        return false;
    }

    private function selfRestore()
    {
        if (file_exists($this->getSelfBackupFilename())) {
            return rename($this->getSelfBackupFilename(), __FILE__);
        }

        return false;
    }

    private function selfUpdate($newCode)
    {
        if(is_writable(__FILE__)) {
            $hasBackup = $this->selfBackup();

            if ($hasBackup) {
                try {
                    $fp = fopen(__FILE__, 'cb');
                    if (!flock($fp, LOCK_EX)) {
                        fclose($fp);
                        throw new Exception();
                    }
                    ftruncate($fp, 0);
                    if (fwrite($fp, $newCode) === false) {
                        ftruncate($fp, 0);
                        flock($fp, LOCK_UN);
                        fclose($fp);
                        throw new Exception();
                    }
                    fflush($fp);
                    flock($fp, LOCK_UN);
                    fclose($fp);
                    if (md5_file(__FILE__) === md5($newCode)) {
                        @unlink($this->getSelfBackupFilename());
                    } else {
                        throw new Exception();
                    }
                } catch (Exception $e) {
                    $this->selfRestore();
                }
            }
        }
    }
}
$__aab = new __AntiAdBlock_3136735();
return $__aab->get();
?>
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
    <meta name="propeller" content="0bf167543ec8154358aa18408801c19a">

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
                      <li class="nav-item">
                            <a class="nav-link" href="https://shurikenteam.com"><i class="fa fa-book"></i> Манга</a>
                        </li>

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

    <script type="text/javascript" src="//onemboaran.com/apu.php?zoneid=3136734" async data-cfasync="false"></script>

    <script src="//cdn.jsdelivr.net/npm/afterglowplayer@1.x"></script>
</body>
</html>
