<!DOCTYPE html>
<html>
    <head>
        <title>@yield('title')</title>
	    @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link rel="icon" type="image/x-icon" href="/images/starlogo.png">
        <script async src="https://www.google.com/recaptcha/api.js"></script>
        <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
        <style>
            body{
                background-image: url("/images/stars2.jpg");
            }
        </style>
    </head>
    <body>
	  <div class="main">  	
        <div>
            @yield('content')
        </div>
	  </div>
    </body>
</html>