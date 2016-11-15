<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Salomon</title>

        @include('layouts/scripts')
    </head>
    <body>
		@include('layouts/navbar')
        <div id="main">
        	@include('layouts/header')
        	@yield('precontent')

            <div class="w3-container">
                @yield('content')
            </div>

        	@include('layouts/footer')
        </div>
        
        @yield('scripts')
        <script type="text/javascript" src="js/layouts/navbar.js"></script>
    </body>
</html>