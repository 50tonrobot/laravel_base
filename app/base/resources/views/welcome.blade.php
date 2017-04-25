<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 0;
                top: 0;
                width: 100%;
                background: #eee;
                line-height: 50px;
                border-bottom: 1px solid #d3e0e9;
            }

            .top-right a {
                float:right;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a, .links .container > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            #film_button_container {
              font-size: 200px;
              color: #bbb;
              text-shadow: 15px 15px 15px #000;
              text-decoration: none;
              -webkit-transition: text-shadow 2s; /* For Safari 3.1 to 6.0 */
              transition: text-shadow 2s;
            }

            #enter_button {
                font-size: 80px;
                display: block;
                font-family: Baskerville;
                color:lightgreen;
                position: relative;
                top: -35px;
            }

            #film_button, #enter_button {
              line-height:0;
            }

        </style>
        <link href="{{ asset('css/theme_override.css') }}" rel="stylesheet">
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                  <div class='container'>
                    @if (Auth::check())
                        <a href="{{ url('/movie') }}">My Movies</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                  </div>
                </div>
            @endif

            <div class="content">
                <a id='film_button_container' href='/movie'>
                  <i id='film_button' class="glyphicon glyphicon-film"></i>
                  <span id='enter_button'>ENTER</span>
                </a>
            </div>
        </div>
        <script src="{{ asset('js/app.js') }}"></script>
        <script>
          $('#film_button_container').on('mousedown',function(){
            $('#film_button_container').css('text-shadow','0px 0px 0px #000');
          });
          $('#film_button_container').on('mouseleave',function(){
            $('#film_button_container').css('text-shadow','15px 15px 15px #000');
          });
          $('#film_button_container').on('mouseenter',function(){
            $('#film_button_container').css('text-shadow','5px 5px 5px #000');
          });
        </script>
    </body>
</html>
