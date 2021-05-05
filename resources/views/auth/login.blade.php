<!DOCTYPE html>
<!--[if IE 9]>         <html class="no-js lt-ie10" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
    <meta charset="utf-8">

    <title>Car Hire</title>

    <meta name="description" content="ProUI is a Responsive Bootstrap Admin Template created by pixelcave and published on Themeforest.">
    <meta name="author" content="pixelcave">
    <meta name="robots" content="noindex, nofollow">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0">

    <!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <link rel="shortcut icon" href="{{ asset('assets/login/img/favicon.png')}}">
    <link rel="apple-touch-icon" href="{{ asset('assets/login/img/icon57.png')}}" sizes="57x57">
    <link rel="apple-touch-icon" href="{{ asset('assets/login/img/icon72.png')}}" sizes="72x72">
    <link rel="apple-touch-icon" href="{{ asset('assets/login/img/icon76.png')}}" sizes="76x76">
    <link rel="apple-touch-icon" href="{{ asset('assets/login/img/icon114.png')}}" sizes="114x114">
    <link rel="apple-touch-icon" href="{{ asset('assets/login/img/icon120.png')}}" sizes="120x120">
    <link rel="apple-touch-icon" href="{{ asset('assets/login/img/icon144.png')}}" sizes="144x144">
    <link rel="apple-touch-icon" href="{{ asset('assets/login/img/icon152.png')}}" sizes="152x152">
    <link rel="apple-touch-icon" href="{{ asset('assets/login/img/icon180.png')}}" sizes="180x180">
    <!-- END Icons -->

    <!-- Stylesheets -->
    <!-- Bootstrap is included in its original form, unaltered -->
    <link rel="stylesheet" href="{{ asset('assets/login//bootstrap.min.css')}}">

    <!-- Related styles of various icon packs and plugins -->
    <link rel="stylesheet" href="{{ asset('assets/login/css/plugins.css')}}">

    <!-- The main stylesheet of this template. All Bootstrap overwrites are defined in here -->
    <link rel="stylesheet" href="{{ asset('assets/login/css/main.css')}}">

    <!-- Include a specific file here from css/themes/ folder to alter the default theme of the template -->

    <!-- The themes stylesheet of this template (for using specific theme color in individual elements - must included last) -->
    <link rel="stylesheet" href="{{ asset('assets/login/css/themes.css')}}">
    <!-- END Stylesheets -->

    <!-- Modernizr (browser feature detection library) -->
    <script src="{{ asset('assets/login/js/vendor/modernizr.min.js')}}"></script>
</head>
<body>
<!-- Login Background -->
<div style="background: #00A6C7; width: 100%; height: 100%">
    <!-- For best results use an image with a resolution of 2560x400 pixels (prefer a blurred image for smaller file size) -->
{{--    <img src="{{ asset('assets/login/img/placeholders/headers/Cousins.jpeg')}}" width="100%" height="600px" style="background-repeat: repeat" alt="Login Background" >--}}
</div>
<!-- END Login Background -->

<!-- Login Container -->
<div id="login-container" class="animation-fadeIn">
    <!-- Login Title -->
    <div class="login-title text-center">
        <h1><i class="gi gi-flash"></i> <strong>Login</strong><br></h1>
    </div>
    <!-- END Login Title -->

    <!-- Login Block -->
    <div class="block push-bit">
        <!-- Login Form -->
        <form action="{{ route('login') }}" method="post"  class="form-horizontal form-bordered form-control-borderless">
            @csrf
            @include('layouts.message')
            <div class="form-group">
                <div class="col-xs-12">
                    <div class="input-group">
                        <span class="inp ut-group-addon"><i class="gi gi-envelope"></i></span>
                        <input type="text" id="email" name="email" class="form-control input-lg" placeholder="Username">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-12">
                    <div class="input-group">
                        <span class="inp ut-group-addon"><i class="gi gi-lock"></i></span>
                        <input type="password" id="password" name="password" class="form-control input-lg" placeholder="password">
                    </div>
                </div>
            </div>

            <button style="margin-left: 40%; padding-bottom: 5px; margin-bottom: 15px;" class="btn btn-primary" name="submit"><i class="fa fa-unlock-alt"></i> Submit</button>


        </form>
        <!-- END Login Form -->
    </div>
</div>


<!-- jQuery, Bootstrap.js, jQuery plugins and Custom JS code -->
<script src="{{ asset('assets/login/js/vendor/jquery.min.js')}}"></script>
<script src="{{ asset('assets/login/js/vendor/bootstrap.min.js')}}"></script>
<script src="{{ asset('assets/login/js/plugins.js')}}"></script>
<script src="{{ asset('assets/login/js/app.js')}}"></script>

<!-- Load and execute javascript code used only in this page -->
<script src="{{ asset('assets/login/js/pages/login.js')}}"></script>
<script>$(function(){ Login.init(); });</script>
</body>
</html>
