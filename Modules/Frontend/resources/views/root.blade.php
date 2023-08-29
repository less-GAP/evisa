<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E VISA</title>
    <link rel="icon" href="/images/favicon.png" sizes="32x32">
    <link rel='stylesheet' id='lessGAP-theme-style-css' href='/static/style.css?ver=6.3' type='text/css' media='all'/>
    <link rel='stylesheet' id='lessGAP-font-NeueKabel-css'
          href='{{ asset('static/webfonts/NeueKabel/stylesheet.css') }}'
          type='text/css' media='all'/>
    <link rel='stylesheet' id='lessGAP-font-Fontspring-DEMO-css'
          href='{{ asset('static/webfonts/Fontspring-DEMO/stylesheet.css') }}'
          type='text/css' media='all'/>
    <link rel='stylesheet' id='lessGAP-fontawesome-css'
          href='{{ asset('static/css/all.min.css') }}'
          type='text/css' media='all'/>
    <link rel="canonical" href="https://evisa.usa-server.com/"/>
    <link rel='shortlink' href='https://evisa.usa-server.com/'/>

    <script src="https://www.paypal.com/sdk/js?client-id=AWcy7kkXjKzGK6JwvlI9AR0Tpq4UqL8Sm4KkaXpfqUI-xEl4j_JH_XUFr12mJKk4__xJwJt4ukyJZmQ2&components=buttons,funding-eligibility"></script>

    @vite(['resources/js/app.js'])
    @spladeHead
</head>

<body
    class="home page-template page-template-templates page-template-frontpage page-template-templates frontpage-php page page-id-5 lessGAP">

    @splade
</body>

</html>
