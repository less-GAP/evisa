<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="light">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel='stylesheet' id='lessGAP-theme-style-css' href='/static/style.css?ver=6.3' type='text/css' media='all'/>
    <link rel="icon" type="image/png" sizes="32x32" href="{{url(settings('site_icon',''))}}">
    <link rel='stylesheet' id='lessGAP-font-NeueKabel-css'
          href='{{ asset('static/webfonts/NeueKabel/stylesheet.css') }}'
          type='text/css' media='all'/>
    <link rel='stylesheet' id='lessGAP-font-Fontspring-DEMO-css'
          href='{{ asset('static/webfonts/Fontspring-DEMO/stylesheet.css') }}'
          type='text/css' media='all'/>
    <link rel='stylesheet' id='lessGAP-fontawesome-css'
          href='{{ asset('static/css/all.min.css') }}'
          type='text/css' media='all'/>
    <link rel='shortlink' href='https://evisadirect.com/'/>
    <script src="{{ asset('static/js/jquery-3.7.1.min.js')}}"></script>
    @vite(['resources/js/app.js'])
    @spladeHead
</head>

<body
    class="home bg-[#f8f8f8] page-template page-template-templates page-template-frontpage page-template-templates frontpage-php page page-id-5 lessGAP">

@splade
</body>
<style>
    /*remove custom style*/
    .circles {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        overflow: hidden;
    }

    .circles li {
        position: absolute;
        display: block;
        list-style: none;
        width: 20px;
        height: 20px;
        background: rgba(255, 255, 255, 0.2);
        animation: animate 25s linear infinite;
        bottom: -150px;
    }

    .circles li:nth-child(1) {
        left: 25%;
        width: 80px;
        height: 80px;
        animation-delay: 0s;
    }


    .circles li:nth-child(2) {
        left: 10%;
        width: 20px;
        height: 20px;
        animation-delay: 2s;
        animation-duration: 12s;
    }

    .circles li:nth-child(3) {
        left: 70%;
        width: 20px;
        height: 20px;
        animation-delay: 4s;
    }

    .circles li:nth-child(4) {
        left: 40%;
        width: 60px;
        height: 60px;
        animation-delay: 0s;
        animation-duration: 18s;
    }

    .circles li:nth-child(5) {
        left: 65%;
        width: 20px;
        height: 20px;
        animation-delay: 0s;
    }

    .circles li:nth-child(6) {
        left: 75%;
        width: 110px;
        height: 110px;
        animation-delay: 3s;
    }

    .circles li:nth-child(7) {
        left: 35%;
        width: 150px;
        height: 150px;
        animation-delay: 7s;
    }

    .circles li:nth-child(8) {
        left: 50%;
        width: 25px;
        height: 25px;
        animation-delay: 15s;
        animation-duration: 45s;
    }

    .circles li:nth-child(9) {
        left: 20%;
        width: 15px;
        height: 15px;
        animation-delay: 2s;
        animation-duration: 35s;
    }

    .circles li:nth-child(10) {
        left: 85%;
        width: 150px;
        height: 150px;
        animation-delay: 0s;
        animation-duration: 11s;
    }

    @keyframes animate {

        0% {
            transform: translateY(0) rotate(0deg);
            opacity: 1;
            border-radius: 0;
        }

        100% {
            transform: translateY(-1000px) rotate(720deg);
            opacity: 0;
            border-radius: 50%;
        }

    }

    .triangle {
        border-top: 60rem solid #fff;
        border-left: 25rem solid transparent;
    }

    .fixed {
        position: fixed;
    }
    #primary{
        min-height: 80vh;
    }
    #site-main{
        padding-top: 15px;
    }

    #page-content table td, #page-content table th {
        border-width: thin;
        padding: 10px;
    }
</style>
</html>
