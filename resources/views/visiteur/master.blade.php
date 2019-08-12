<?php

	function current_page($url = "/"){
		return request()->path() == $url;
	}
?>
<!DOCTYPE html>
	<html>
		<head>
			<meta charset="utf-8" />
			<title>@yield('title')</title>
			@yield('keywords')
			
			<meta name="description" content="" />
			<meta name="Author" content="Dorin Grigoras [www.stepofweb.com]" />

			<!-- mobile settings -->
			<meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />
			<!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->

			@yield('style')

			<!-- CORE CSS -->
			<link href="/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

			<!-- GOOGLE RECAPTCHE -->
			<script src='https://www.google.com/recaptcha/api.js'></script>

			<!-- WEB FONTS -->
			<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400%7CRaleway:300,400,500,600,700%7CLato:300,400,400italic,600,700" rel="stylesheet" type="text/css" />


			<!-- SWIPER SLIDER -->
			<link href="/assets/plugins/slider.swiper/dist/css/swiper.min.css" rel="stylesheet" type="text/css" />

			<!-- THEME CSS -->
			<link href="/assets/css/essentials.css" rel="stylesheet" type="text/css" />
			<link href="/assets/css/layout.css" rel="stylesheet" type="text/css" />

			<!-- PAGE LEVEL SCRIPTS -->
			<link href="/assets/css/header-1.css" rel="stylesheet" type="text/css" />
			<link href="/assets/css/color_scheme/green.css" rel="stylesheet" type="text/css" id="color_scheme" />

			<!-- CALANDAR CSS -->
			{{ Html::style('adm/assets/plugins/fullcalendar/fullcalendar.min.css') }}



	</head>

	<body class="smoothscroll enable-animation">

		<!-- wrapper -->
		<div id="wrapper">

			@include('visiteur.header')

			@yield('content')

			@include('visiteur.footer')

		</div>
		<!-- /wrapper -->


		<!-- SCROLL TO TOP -->
		<a href="#" id="toTop"></a>


		<!-- PRELOADER -->
		<div id="preloader">
			<div class="inner">
				<span class="loader"></span>
			</div>
		</div><!-- /PRELOADER -->


		<!-- JAVASCRIPT FILES -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script type="text/javascript">var plugin_path = '/assets/plugins/';</script>
		<script type="text/javascript" src="/assets/plugins/jquery/jquery-2.1.4.min.js"></script>

		<script type="text/javascript" src="/assets/js/scripts.js"></script>

		<!-- JAVASCRIPT calendar -->
		{{ Html::script('adm/assets/plugins/fullcalendar/lib/moment.min.js') }}
		{{ Html::script('adm/assets/plugins/fullcalendar/fullcalendar.min.js') }}



		<!-- SWIPER SLIDER -->
		<script type="text/javascript" src="/assets/plugins/slider.swiper/dist/js/swiper.min.js"></script>
		<script type="text/javascript" src="/assets/js/view/demo.swiper_slider.js"></script>
		<script src='/adm/assets/plugins/fullcalendar/locale/fr.js'></script>

		 <script>
	        // Get the modal
	        var modal = document.getElementById('id01');

	        // When the user clicks anywhere outside of the modal, close it
	        window.onclick = function(event) {
	            if (event.target == modal) {
	                modal.style.display = "none";
	            }
	        }
        </script>

        @yield('scripts')
	</body>
</html>
