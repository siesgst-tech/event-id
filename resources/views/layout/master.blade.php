<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta content="width=device-width,initial-scale=1" name="viewport">
    <title>Event ID - @yield('title')</title>
    <link href="{{ URL::asset('css/bootstrap.css') }}" rel="stylesheet" type="text/css">
</head>
<body>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button aria-expanded="false" class="navbar-toggle collapsed" data-target="#bs-example-navbar-collapse-1" data-toggle="collapse" type="button"><span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span></button>
                <a class="navbar-brand" href="#">EventID</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#"><button class="btn btn-sm btn-primary">Download Event ID</button></a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    @if (Request::is('auth/*'))
                        <li>
                            <a href="/auth/register">Register</a>
                        </li>
                        <li>
                            <a href="/auth/login">Login</a>
                        </li>
                    @endif
                    @if (Request::is('user/*'))
                        <li>
                            <a href="/user/home">Home</a>
                        </li>
                        <li>
                            <a href="/user/settings">Settings</a>
                        </li>
                        <li>
                            <a href="/user/entries">Entries</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <footer>
        <div class="row">
            <div class="col-lg-12">
                <ul class="list-unstyled">
                    <li class="pull-right">Made by nerdyninja</li>
                    <li>
                        <a href="">About</a>
                    </li>
                    <li>
                        <a href="">Help</a>
                    </li>
                    <li>
                        <a href="">Privacy & Terms</a>
                    </li>
                    <li>
                        <a href="">API</a>
                    </li>
                </ul>
            </div>
        </div>
    </footer>
    <script src="{{ URL::asset('js/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ URL::asset('js/bootstrap.js') }}" type="text/javascript"></script>
</body>
</html>