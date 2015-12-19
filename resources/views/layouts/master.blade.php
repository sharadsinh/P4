<!doctype html>
<html>
    <head>
        <title>
            {{-- Yield the title if it exists, otherwise default to 'P4' --}}
            @yield('title','P4')
        </title>

        <meta charset='utf-8'>

        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link href='https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css' rel='stylesheet'>
        <link href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css' rel='stylesheet'>
        <link href='https://maxcdn.bootstrapcdn.com/bootswatch/3.3.5/lumen/bootstrap.min.css' rel='stylesheet'>
        <link href='/css/p4.css' rel='stylesheet'>

        {{-- Yield any page specific CSS files or anything else you might want in the <head> --}}
        @yield('head')

    </head>
    <body>

        @if(\Session::has('flash_message'))
            <div class='flash_message'>
                {{ \Session::get('flash_message') }}
            </div>
        @endif

        <section>
            {{-- Main page content will be yielded here --}}

            <nav class="navbar navbar-default">
              <div class="container-fluid">
                <div class="navbar-header">
                  <a class="navbar-brand" href="/"><img style="max-width:25%; margin-top: -10px;" src="/img/logo.png" alt='Grocery List'></a>
                </div>
                <div>
                  <ul class="nav navbar-nav navbar-right">
                    @if(Auth::check())
                        <?php
                            $logged_in_user = \App\User::find(\Auth::id());
                        ?>
                        <li><a href='/'><span class="glyphicon glyphicon-user"></span> Hello, {{$logged_in_user->firstname}}</a></li>
                        <li><a href='/'><span class="glyphicon glyphicon-home"></span> Home</a></li>
                        <li><a href='/logout'><span class="glyphicon glyphicon-log-in"></span> Log out</a></li>
                    @else
                        <li><a href='/'><span class="glyphicon glyphicon-home"></span> Home</a></li>
                        <li><a href='/register'><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                        <li><a href='/login'><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                    @endif
                  </ul>
                </div>
              </div>
            </nav>

            @yield('content')
        </section>

        <footer>
            &copy; {{ date('Y') }} &nbsp;&nbsp;
            <a href='https://github.com/sharadsinh/P4' class='fa fa-github' target='_blank'> View on Github</a> &nbsp;&nbsp;
            <a href='http://p4.learnforever.me/' class='fa fa-link' target='_blank'> View Live</a>
        </footer>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>


        {{-- Yield any page specific JS files or anything else you might want at the end of the body --}}
        @yield('body')

    </body>
</html>
