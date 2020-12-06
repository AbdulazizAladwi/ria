<!doctype html>
<html>
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<meta name="description" content="Unify Admin Panel" />
		<meta name="keywords" content="CRM, Admin, Dashboard, Bootstrap4, Sass, CSS3, HTML5, Responsive Dashboard, Responsive Admin Template, Admin Template, Best Admin Template, Bootstrap Template, Themeforest" />
		<meta name="author" content="Bootstrap Gallery" />
		<link rel="shortcut icon" href="img/favicon.ico" />

		<title> @lang('site.system') | @yield('title')</title>

		<!-- Common CSS -->

		@if(app()->getLocale() == 'en')

		<link rel="stylesheet" href="{{ asset('dashboard') }}/css/bootstrap.min.css" />
		<link rel="stylesheet" href="{{ asset('dashboard') }}/fonts/icomoon/icomoon.css" />
		<link rel="stylesheet" href="{{ asset('dashboard') }}/css/main.css" />
        @else
            <link rel="stylesheet" href="{{ asset('dashboard') }}/css/bootstrap.min.css" />
            <link rel="stylesheet" href="{{ asset('dashboard') }}/fonts/icomoon/icomoon.css" />
			<link rel="stylesheet" href="{{ asset('dashboard') }}/css/main-rtl.css" />

        @endif
            <!-- Other CSS includes plugins - Cleanedup unnecessary CSS -->
		<!-- Chartist css -->
		<link href="{{ asset('dashboard') }}/vendor/chartist/css/chartist.min.css" rel="stylesheet" />
        <link href="{{ asset('dashboard') }}/vendor/chartist/css/chartist-custom.css" rel="stylesheet" />

        <!-- Our custom css -->
        @livewireStyles
        @toastr_css
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

		@stack('css')


		<style>
			button {
				cursor: pointer !important;
			}

            .ck-editor__editable {
                min-height: 150px;
            }
		</style>

        <style>
            .required:after {
                content: "*";
                color: red;
                margin-left: 3px;
            }
        </style>

		<link rel="stylesheet" href="{{ asset('dashboard') }}/css/custom-style.css" />

	</head>
	<body>

		<!-- Loading starts -->
		<!--	<div class="loading-wrapper">
			<div class="loading">
				<div class="img"></div>
				<span></span>
				<span></span>
				<span></span>
				<span></span>
				<span></span>
			</div>
		</div> -->
		<!-- Loading ends -->

		<!-- BEGIN .app-wrap -->
		<div class="app-wrap">

			<!-- BEGIN .app-heading -->
            @include('dashboard.partials._navbar')
            <!-- END: .app-heading -->


			<!-- BEGIN .app-container -->
			<div class="app-container">
				<!-- BEGIN .app-side -->
				@include('dashboard.partials._aside')
				<!-- END: .app-side -->

				<!-- BEGIN .app-main -->
				<div class="app-main">
					<!-- BEGIN .main-heading -->
					@yield('page-header')
					<!-- END: .main-heading -->
					<!-- BEGIN .main-content -->
					<div class="main-content">

                        @yield('content')

					</div>
					<!-- END: .main-content -->
				</div>
				<!-- END: .app-main -->
			</div>
			<!-- END: .app-container -->
			<!-- BEGIN .main-footer -->
			 @include('dashboard.partials._footer')
			<!-- END: .main-footer -->
		</div>
		<!-- END: .app-wrap -->

		<!-- jQuery first, then Tether, then other JS. -->
		<script src="{{ asset('dashboard') }}/js/jquery.js"></script>
		<script src="{{ asset('dashboard') }}/js/tether.min.js"></script>
		<script src="{{ asset('dashboard') }}/js/bootstrap.min.js"></script>
		<script src="{{ asset('dashboard') }}/vendor/unifyMenu/unifyMenu.js"></script>
		<script src="{{ asset('dashboard') }}/vendor/onoffcanvas/onoffcanvas.js"></script>
		<script src="{{ asset('dashboard') }}/js/moment.js"></script>

		<!-- JVector Maps -->
		<script src="{{ asset('dashboard') }}/vendor/jvectormap/jquery-jvectormap-2.0.3.min.js"></script>
		<script src="{{ asset('dashboard') }}/vendor/jvectormap/gdp-data.js"></script>
		<script src="{{ asset('dashboard') }}/vendor/jvectormap/africa-mill.js"></script>
		<script src="{{ asset('dashboard') }}/vendor/jvectormap/europe-mill.js"></script>

		<!-- Custom JVector Maps -->
		<script src="{{ asset('dashboard') }}/vendor/jvectormap/custom/map-europe.js"></script>
		<script src="{{ asset('dashboard') }}/vendor/jvectormap/custom/map-africa.js"></script>

		<!-- Chartist JS -->
		<script src="{{ asset('dashboard') }}/vendor/chartist/js/chartist.min.js"></script>
		<script src="{{ asset('dashboard') }}/vendor/chartist/js/chartist-tooltip.js"></script>
		<script src="{{ asset('dashboard') }}/vendor/chartist/js/custom/custom-stack-bar.js"></script>
		<script src="{{ asset('dashboard') }}/vendor/chartist/js/custom/custom-line-chart2.js"></script>

		<!-- Newsticker JS -->
		<script src="{{ asset('dashboard') }}/vendor/newsticker/newsTicker.min.js"></script>
		<script src="{{ asset('dashboard') }}/vendor/newsticker/custom-newsTicker.js"></script>

		<!-- Slimscroll JS -->
		<script src="{{ asset('dashboard') }}/vendor/slimscroll/slimscroll.min.js"></script>
		<script src="{{ asset('dashboard') }}/vendor/slimscroll/custom-scrollbar.js"></script>

		<!-- Slimscroll JS -->
		<script src="{{ asset('dashboard') }}/vendor/sparkline/sparkline-retina.js"></script>
		<script src="{{ asset('dashboard') }}/vendor/sparkline/custom-sparkline.js"></script>

        <!-- Common JS -->

        <script src="{{ asset('dashboard') }}/js/common.js"></script>

        <!-- Our custom js -->

		<!-- toastr-->
        @toastr_js
        @toastr_render

		<!-- livewire -->
        @livewireScripts

        <!-- select 2 -->
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

        <!-- CK Editor -->
        <script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>

        <script>
            CKEDITOR.replace( 'features' );
        </script>

        @stack('js')

	</body>
</html>
