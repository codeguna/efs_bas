<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>EFS BAS - RESET PASSWORD</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="{{ asset('/public/theme/images/icon/favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('/public/theme/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/public/theme/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/public/theme/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('/public/theme/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/public/theme/css/slicknav.min.css') }}">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="{{ asset('/public/theme/css/typography.css') }}">
    <link rel="stylesheet" href="{{ asset('/public/theme/css/default-css.css') }}">
    <link rel="stylesheet" href="{{ asset('/public/theme/css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('/public/theme/css/responsive.css') }}">
    <!-- modernizr css -->
    <script src="{{ asset('/public/theme/js/vendor/modernizr-2.8.3.min.js') }}"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- login area start -->
    <div class="login-area login-s2">
        <div class="container">
            <div class="login-box ptb--100">
                @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                <form method="POST" action="{{ route('password.request') }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="token" value="{{ $token }}">
                    <div class="login-form-head">
                        <h4>Reset Password</h4>
                        <p>Hello there, Please Enter your New Password</p>
                    </div>
                    <div class="login-form-body">                        
                        <div class="form-gp" {{ $errors->has('email') ? ' has-error' : '' }}>
                            <label for="email">Email address</label>
                            <input type="email" name="email" id="email" value="{{ old('email') }}" required>
                            
                            @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif                                
                            <i class="ti-email"></i>
                            <div class="text-danger"></div>
                        </div> 
                        <div class="form-gp" {{ $errors->has('password') ? ' has-error' : '' }}>
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" required>
                            
                            @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif                                
                            <i class="ti-lock"></i>
                            <div class="text-danger"></div>
                        </div>  
                        <div class="form-gp" {{ $errors->has('password_confirmation') ? ' has-error' : '' }}>
                            <label for="password-confirm">Confirm Password</label>
                            <input type="password" name="password_confirmation" required>
                            
                            @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                            @endif                                
                            <i class="ti-lock"></i>
                            <div class="text-danger"></div>
                        </div>                         
                        <div class="submit-btn-area">
                            <button id="form_submit" type="submit">Send Password Reset Link <i class="ti-arrow-right"></i></button>                            
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- login area end -->

    <!-- jquery latest version -->
    <script src="{{ asset('/public/theme/js/vendor/jquery-2.2.4.min.js') }}"></script>
    <!-- bootstrap 4 js -->
    <script src="{{ asset('/public/theme/js/popper.min.js') }}"></script>
    <script src="{{ asset('/public/theme/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/public/theme/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('/public/theme/js/metisMenu.min.js') }}"></script>
    <script src="{{ asset('/public/theme/js/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('/public/theme/js/jquery.slicknav.min.js') }}"></script>
    
    <!-- others plugins -->
    <script src="{{ asset('/public/theme/js/plugins.js') }}"></script>
    <script src="{{ asset('/public/theme/js/scripts.js') }}"></script>
</body>

</html>