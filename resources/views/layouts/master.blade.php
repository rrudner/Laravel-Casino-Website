<html>

<head>
    <title>{{ config('app.name') }} - @yield('title')</title>
    <link rel="icon" href="{{ config('app.url') }}/resources/css/favicon.png" type="image/x-icon" />
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://unpkg.com/purecss@2.0.6/build/pure-min.css"
        integrity="sha384-Uu6IeWbM+gzNVXJcM9XV3SohHtmWE+3VGi496jvgX1jyvDTXfdK+rfZc8C1Aehk5" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="{{ config('app.url') }}/resources/css/app.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    @yield('coingame')
</head>

<body>
    <div class="bg">
        <div class="bganimation w3-display-container w3-animate-opacity w3-text-white">
            <div class="w3-display-topleft w3-padding-large w3-xlarge">
                <a style="text-decoration:none" href={{ route('home') }}>
                    <img src="{{ config('app.url') }}/resources/css/favicon.png" alt="Strona Główna" width="25"
                        height="25">
                    {{ config('app.name') }}</a>

            </div>

            @if (isset($loggedUser))

                <div class="w3-display-topright w3-padding">
                    <a href={{ route('account') }} class="pure-button pure-button-primary">{{ $loggedUser->name }}
                        {{ $loggedUser->surname }}</a>

                    <a href={{ route('logout') }} class="pure-button pure-button-primary">Wyloguj się</a>
                </div>

                <div class="w3-display-topmiddle w3-padding">
                    @if ($loggedRole == 'admin')
                        <a href={{ route('admin') }} class="pure-button pure-button-primary">Panel Administratora</a>
                    @else
                        <a style="text-decoration:none" href={{ route('payment') }}>Twój stan konta:
                            {{ $loggedUser->wallet }}</a>
                        <br>
                        <a href={{ route('payment') }} class="pure-button pure-button-primary">Doładuj</a>
                    @endif
                </div>

            @else

                <div class="w3-display-topright w3-padding">
                    <a href={{ route('login') }} class="pure-button pure-button-primary">zaloguj się</a>
                    <a href={{ route('register') }} class="pure-button pure-button-primary">zarejestruj się</a>
                </div>

            @endif

            <div class="w3-display-middle">
                <div animated-content>
                    <div class="w3-animate-top">
                        @yield('animated-content')
                    </div>
                </div>
                <div content>
                    @yield('content')
                </div>
                @if (session('status'))
                    <div class="alert alert-success">
                        {!! session('status') !!}
                    </div>
                @endif
            </div>

            <div class="w3-display-bottomleft w3-padding-large">
                Powered by <a href="https://bieda.it" target="_blank">bieda.it</a>
            </div>

            <div class="w3-display-bottomright w3-padding-large">
                Kontakt: <a href="mailto:radek.rud112@gmail.com">radek.rud112@gmail.com</a>
            </div>

        </div>
    </div>

</body>

</html>
