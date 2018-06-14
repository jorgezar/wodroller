<html>
    <head>
	    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
        <title>App Name - @yield('title')</title>
        <meta charset = "UTF-8">
    </head>
    <body>

        <div class="container">
            @yield('content')
        </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/diceroller.js') }}"></script>
	<script src="{{ asset('js/jquery.min.js') }}"></script>
    </body>
</html>