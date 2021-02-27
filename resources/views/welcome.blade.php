<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Jangwook's Profile</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <script src="{{ secure_asset('js/app.js') }}" defer></script>
        <link rel="stylesheet" href="{{ secure_asset('css/app.css') }}">

        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://unpkg.com/purecss@2.0.5/build/pure-min.css" integrity="sha384-LTIDeidl25h2dPxrB2Ekgc9c7sEC3CWGM6HeFmuDNUjX76Ert4Z4IY714dhZHPLd" crossorigin="anonymous">
        <link rel="stylesheet" href="https://unpkg.com/purecss@2.0.5/build/grids-responsive-min.css" />
    </head>
    <body class="antialiased">
        @if (session('contact_result'))
            <div class="contact-result" onclick="this.remove()">{{ session('contact_result') }}</div>
        @endif

        @include('sections.mail-visual', [ 'name' => $name ])
        @include('sections.about')
        @include('sections.portfolio', [ 'portfolios' => $portfolios, 'carousel' => $carousel ])
        @include('sections.contacts', [ 'errors' => $errors ])

        <footer>
            <p>(c) copy right</p>
        </footer>


        <style>
            .carousel__item {
                -webkit-animation: carousel-animate-vertical <?= $carousel['count'] * $carousel['timing'] ?>s linear infinite;
                animation: carousel-animate-vertical <?= $carousel['count'] * $carousel['timing'] ?>s linear infinite;
            }
            @foreach ($portfolios as $idx => $p)
            .carousel__item:nth-child(<?= $idx + 1 ?>) {
                -webkit-animation-delay: calc(<?= $carousel['timing'] ?>s * <?= $idx - $carousel['count'] ?>);
                animation-delay: calc(<?= $carousel['timing'] ?>s * <?= $idx - $carousel['count'] ?>);
            }
            @endforeach

            @keyframes carousel-animate-vertical {
                0% {
                    transform: translateY(100%) scale(0.5);
                    opacity: 0;
                    visibility: hidden;
                }
                <?= $carousel['timing'] ?>%,
                <?= $carousel['stepFraction'] ?>% {
                    transform: translateY(100%) scale(0.7);
                    opacity: .4;
                    visibility: visible;
                }
                <?= $carousel['stepFraction'] + $carousel['timing'] ?>%,
                <?= $carousel['stepFraction'] * 2 ?>% {
                    transform: translateY(0) scale(1);
                    opacity: 1;
                    visibility: visible;
                }
                <?= $carousel['stepFraction'] * 2 + $carousel['timing'] ?>%,
                <?= $carousel['stepFraction'] * 3 ?>% {
                    transform: translateY(-100%) scale(0.7);
                    opacity: .4;
                    visibility: visible;
                }
                <?= $carousel['stepFraction'] * 3 + $carousel['timing'] ?>% {
                    transform: translateY(-100%) scale(0.5);
                    opacity: 0;
                    visibility: visible;
                }
                100% {
                    transform: translateY(-100%) scale(0.5);
                    opacity: 0;
                    visibility: hidden;
                }
            }
        </style>

    </body>
</html>
