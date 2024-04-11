<!doctype html>
<html
        lang="en"
        xmlns:th="http://www.thymeleaf.org"
        th:fragment="layout(content)"
>

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.9.0/dist/full.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
          integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font@7.4.47/css/materialdesignicons.min.css">


    <!--  Splide  -->
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css">
    <!--  End Splide  -->


    <!--  JQuery  -->
    <script src="https://code.jquery.com/jquery-3.7.1.js"
            integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

    <!--  JQuery Magnify JS  -->
    <script src="{{ asset('assets/simple-jquery-zoom-image-on-hover/js/jquery.zoom.js') }}"></script>

    <!--  JQuery Magnify CSS -->
    <link rel="stylesheet" href="{{ asset('assets/simple-jquery-zoom-image-on-hover/css/style.css') }}">


    <!--  Slick Slider  -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <!--  End Slick Slider  -->

    <style>
        .html {
            height: 100%;
        }
        .slick-container {
            height: 70%;
            border-radius: 0;
        }
        .slick-slider, .slick-list, .slick-track {
            height: 100%;
            border-radius: 0;
        }

        .slick-slide {
            height:450px;
            border-radius: 0;
        }

        .slick-slide img {
            height:450px;
            border-radius: 0;
        }
        .slick-active, .slick-track {
            border-radius: 0;
        }
        .splide__arrow {
            background: transparent;
            width: 2em!important;
            height: 2em!important;
        }
        .splide__arrow svg {
            width: 2em!important;
            height: 2em!important;
        }

             /* Default color for the marquee */
         #marquee {
             background: linear-gradient(to right, red, orange, yellow, green, blue, indigo, violet);
             -webkit-background-clip: text;
             color: white;
         }

        .gemini {
            background: radial-gradient(circle,blue,white);
            background-clip: text;
            color: transparent;
            animation: gemini 15s linear infinite;
            background-size: 200% 200%;
        }
        @keyframes gemini {
            0% {
                background-position: 0% 0%;
            }
            50% {
                background-position: 100% 100%;
            }
            100%{
                background-position: 0% 0%;
            }
        }

        .gemini-2 {
            background: radial-gradient(circle,blue,white);
            background-clip: text;
            color: transparent;
            animation: gemini-2 10s linear infinite;
            background-size: 200% 200%;
        }
        @keyframes gemini-2 {
            0% {
                background-position: 0% 0%;
            }
            50% {
                background-position: 100% 100%;
            }
            100%{
                background-position: 0% 0%;
            }
        }
        .gemini-3 {
            background: radial-gradient(circle,blue,red);
            background-clip: text;
            color: transparent;
            animation: gemini-3 15s linear infinite;
            background-size: 200% 200%;
        }
        @keyframes gemini-3 {
            0% {
                background-position: 0% 0%;
            }
            50% {
                background-position: 100% 100%;
            }
            100%{
                background-position: 0% 0%;
            }
        }
    </style>


    @yield("styles")

    <title>Property Market</title>
</head>
<body class="bg-gray-300">

<button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar" aria-controls="default-sidebar"
        type="button"
        class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
    <span class="sr-only">Open sidebar</span>
    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path clip-rule="evenodd" fill-rule="evenodd"
              d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
    </svg>
</button>


@include("layout.marquebar")
@include("layout.topbar")
{{--@include("layout.sidebar")--}}


<!--  Main Content  -->
<div>
    @yield("main")
</div>
<!-- End Main Content  -->


</body>
</html>
