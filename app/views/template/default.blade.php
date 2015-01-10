<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Stripe Payments</title>

        <link rel="stylesheet" href="{{ asset('css/custom.css') }}"/>
        <link rel="stylesheet" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}"/>


    </head>
    <body>

        @include('template.partials._notice')

        <div class="container">
            @yield('content')
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        @yield('scripts')
    </body>
</html>