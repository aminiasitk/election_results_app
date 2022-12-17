<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ isset($page_title) ? $page_title : config('app.name', 'Laravel') }}</title>

        <!-- Favicon icon -->
		<link rel="icon" type="image/png" sizes="16x16" href="/metroeducation/assets/images/favicon1.png">
		<link rel="stylesheet" href="/metro/vendor/jqvmap/css/jqvmap.min.css">
		<link rel="stylesheet" href="/metro/vendor/chartist/css/chartist.min.css">
		<!-- Summernote -->
		<link href="/metro/vendor/summernote/summernote.css" rel="stylesheet">
		<link rel="stylesheet" href="/metro/vendor/bootstrap-select/dist/css/bootstrap-select.min.css">
        <link href="/metro/vendor/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">
		<link rel="stylesheet" href="/metro/css/style.css">
		<link rel="stylesheet" href="/metro/education/assets/css/skin-3.css">
        <style type="text/css">
            .hidden{ display: none!important; }
        </style>
        @yield('page_css')
    </head>
    <body>

        <!--*******************
            Preloader start
        ********************-->
        <div id="preloader">
            <div class="sk-three-bounce">
                <div class="sk-child sk-bounce1"></div>
                <div class="sk-child sk-bounce2"></div>
                <div class="sk-child sk-bounce3"></div>
            </div>
        </div>
        <!--*******************
            Preloader end
        ********************-->

        <!--**********************************
            Main wrapper start
        ***********************************-->
        <div id="main-wrapper">

            <!--**********************************
                Header start
            ***********************************-->
            @include('layouts.header')
            <!--**********************************
                Header end ti-comment-alt
            ***********************************-->

            <!--**********************************
                Nav header start
            ***********************************-->
            @include('layouts.navigation')
            <!--**********************************
                Nav header end
            ***********************************-->

            <!--**********************************
                Sidebar start
            ***********************************-->
            @include('layouts.sidenav')
            <!--**********************************
                Sidebar end
            ***********************************-->
            
            <!--**********************************
                Content body start
            ***********************************-->
            <div class="content-body">
                <!-- row -->
                <div class="container-fluid">
                    <div class="row page-titles mx-0">
                        <div class="col-sm-6 p-md-0">
                            <div class="welcome-text">
                                <h4>{{ $page_title }}</h4>
                            </div>
                        </div>
                        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('party.index') }}">{{ str_replace('Add ', '', $page_title) }}</a></li>
                                <li class="breadcrumb-item active"><a href="#">{{ $page_title }}</a></li>
                            </ol>
                        </div>
                    </div>
                    @yield('page_content')
                </div>
            </div>
            <!--**********************************
                Content body end
            ***********************************-->


            <!--**********************************
                Footer start
            ***********************************-->
            <div class="footer">
                <div class="copyright">
                    <p>Copyright © Developed by <a href="https://www.navuwebtech.com/" target="_blank">Navu Tech</a> <?php echo date('Y'); ?></p>
                </div>
            </div>
            <!--**********************************
                Footer end
            ***********************************-->

            <!--**********************************
            Support ticket button start
            ***********************************-->

            <!--**********************************
            Support ticket button end
            ***********************************-->


        </div>
        <!--**********************************
            Main wrapper end
        ***********************************-->

        <!--**********************************
            Scripts
        ***********************************-->
        <!-- Required vendors -->
        <script src="/metro/vendor/global/global.min.js"></script>
        <script src="/metro/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
        <script src="/metro/js/custom.min.js"></script>
        <script src="/metro/education/assets/js/deznav-init.js"></script>	
        
        <!-- Chart sparkline plugin files -->
        <script src="/metro/vendor/jquery-sparkline/jquery.sparkline.min.js"></script>
        <script src="/metro/js/plugins-init/sparkline-init.js"></script>
        
        <!-- Chart Morris plugin files -->
        <script src="/metro/vendor/raphael/raphael.min.js"></script>
        <script src="/metro/vendor/morris/morris.min.js"></script> 
        
        <!-- Init file -->
        <script src="/metro/js/plugins-init/widgets-script-init.js"></script>
        
        <!-- Demo scripts -->
        <script src="/metro/education/assets/js/dashboard/dashboard.js"></script>
        
        <!-- Summernote -->
        <script src="/metro/vendor/summernote/js/summernote.min.js"></script>
        <!-- Summernote init -->
        <script src="/metro/js/plugins-init/summernote-init.js"></script>

        <script src="/metro/vendor/sweetalert2/dist/sweetalert2.min.js"></script>

        <!-- Svganimation scripts -->
        <script src="/metro/vendor/svganimation/vivus.min.js"></script>
        <script src="/metro/vendor/svganimation/svg.animation.js"></script>
        <script src="/metro/js/styleSwitcher.js"></script>

        @yield('page_js')
            
    </body>
</html>
