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
        <link href='/css/foobooks.css' rel='stylesheet'>

        {{-- Yield any page specific CSS files or anything else you might want in the <head> --}}
        @yield('head')

    </head>
    <body>

        @if(\Session::has('flash_message'))
            <div class='flash_message'>
                {{ \Session::get('flash_message') }}
            </div>
        @endif

        <header>
            <a href='/'>
            <img
            src='/img/logo.png'
            style='width:300px'
            alt='P4 Logo'>
            </a>
        </header>

        <section>
            {{-- Main page content will be yielded here --}}
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
