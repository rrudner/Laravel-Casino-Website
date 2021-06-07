<html>

<head>
    <title>{{ config('app.name') }} - @yield('title')</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://unpkg.com/purecss@2.0.6/build/pure-min.css"
        integrity="sha384-Uu6IeWbM+gzNVXJcM9XV3SohHtmWE+3VGi496jvgX1jyvDTXfdK+rfZc8C1Aehk5" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="{{ config('app.url') }}/resources/css/app.css">
</head>

<body>
    <div class="bg">
        <div class="bganimation w3-display-container w3-animate-opacity w3-text-white">
            <div class="w3-display-topleft w3-padding-large w3-xlarge">
                {{ config('app.name') }}
            </div>
            <div class="w3-display-middle">
                <div animated-content>
                    <div class="w3-animate-top">
                        @yield('animated-content')
                    </div>
                </div>
                <div content>
                    @yield('content')
                </div>
            </div>
            <div class="w3-display-bottomleft w3-padding-large">
                Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a>
            </div>
        </div>
    </div>

</body>

</html>
