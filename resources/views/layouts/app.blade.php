<html>
    <head>
	    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="{{ asset('css/wodroller.css') }}">
        <title>World of Darkness Dice Roller</title>
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
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"></script>

    </body>
</html>