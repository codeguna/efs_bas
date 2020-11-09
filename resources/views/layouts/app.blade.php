<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    @yield('title')
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="{{ asset('/public/theme/images/icon/favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('/public/theme/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/public/theme/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/public/theme/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('/public/theme/css/metisMenu.css') }}">
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
    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
        <div class="sidebar-menu">
            <div class="sidebar-header">
                <div class="logo">
                    <a href="{{ url('/home') }}"><img src="{{ asset('/public/theme/images/icon/logo.png') }}" alt="logo"></a>
                </div>
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-arrow-down"></i><span>
                                    Surat Masuk
                                    </span></a>
                                <ul class="collapse">
                                    <li><a href="{{ url('/inbox/create') }}"><i class="ti-pencil"></i><span>Input Surat Masuk</span></a></li>   
                                    <li><a href="{{ url('/inbox/list') }}"><i class="ti-menu-alt"></i><span>Daftar Surat Masuk</span></a></li>                                   
                                    <li><a href="index.html"><i class="ti-trash"></i><span>Trash</span></a></li>  
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-arrow-up"></i><span>
                                    Surat Keluar
                                    </span></a>
                                <ul class="collapse">
                                    <li><a href="{{ url('/outbox/create') }}"><i class="ti-pencil"></i><span>Input Surat Keluar</span></a></li>   
                                    <li><a href="{{ url('/outbox/list') }}"><i class="ti-menu-alt"></i><span>Daftar Surat Keluar</span></a></li>                                   
                                    <li><a href="{{ url('/outbox/trash') }}"><i class="ti-trash"></i><span>Trash</span></a></li> 
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- sidebar menu area end -->
        <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
            <div class="header-area">
                <div class="row align-items-center">
                    <!-- nav and search button -->
                    <div class="col-md-6 col-sm-8 clearfix">
                        <div class="nav-btn pull-left">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        <div class="search-box pull-left">
                            <form action="#">
                                <input type="text" name="search" placeholder="Search..." required>
                                <i class="ti-search"></i>
                            </form>
                        </div>
                    </div>
                    <!-- profile info & task notification -->
                    <div class="col-md-6 col-sm-4 clearfix">
                       
                    </div>
                </div>
            </div>
            <!-- header area end -->
            <!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <h4 class="page-title pull-left">Dashboard</h4>
                        {{-- <div class="breadcrumbs-area clearfix">
                            
                            <ul class="breadcrumbs pull-left">
                                <li><a href="index.html">Home</a></li>
                                <li><span>Dashboard</span></li>
                            </ul>
                        </div> --}}
                        
                    </div>
                    <div class="col-sm-6 clearfix">
                        <div class="user-profile pull-right">
                            <img class="avatar user-thumb" src="{{ asset('/public/theme/images/author/avatar.png') }}" alt="avatar">
                            <h4 class="user-name dropdown-toggle" data-toggle="dropdown"> {{ Auth::user()->name }} <i class="fa fa-angle-down"></i></h4>
                            <div class="dropdown-menu">                                
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                Logout
                                </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- page title area end -->            
                <!-- CONTENT HERE -->
                @yield('content')                
                <!-- CONTENT HERE -->        
        <footer>
            <div class="footer-area">
                <p>© Copyright 2020. All right reserved <a href="http://www.linkedin.com/in/gunadhip/">MIS LPKIA</a>.</p>
            </div>
        </footer>
        <!-- footer area end-->
    </div>
    <!-- page container area end -->   
    <!-- jquery latest version -->
    <script src="{{ asset('/public/theme/js/vendor/jquery-2.2.4.min.js') }}"></script>
    <!-- bootstrap 4 js -->
    <script src="{{ asset('/public/theme/js/popper.min.js') }}"></script>
    <script src="{{ asset('/public/theme/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/public/theme/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('/public/theme/js/metisMenu.min.js') }}"></script>
    <script src="{{ asset('public/theme/js/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('/public/theme/js/jquery.slicknav.min.js') }}"></script>

    <!-- start chart js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <!-- start highcharts js -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <!-- start zingchart js -->
    <script src="https://cdn.zingchart.com/zingchart.min.js"></script>
    <script>
    zingchart.MODULESDIR = "https://cdn.zingchart.com/modules/";
    ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "ee6b7db5b51705a13dc2339db3edaf6d"];
    </script>
    <!-- all line chart activation -->
    <script src="{{ asset('/public/theme/js/line-chart.js') }}"></script>
    <!-- all pie chart -->
    <script src="{{ asset('/public/theme/js/pie-chart.js') }}"></script>
    <!-- others plugins -->
    <script src="{{ asset('/public/theme/js/plugins.js') }}"></script>
    <script src="{{ asset('/public/theme/js/scripts.js') }}"></script>
</body>

</html>
