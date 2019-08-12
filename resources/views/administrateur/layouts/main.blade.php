 <?php

	function current_page($url = "/"){
		return request()->path() == $url;
	}
?>

<!doctype html>
<html lang="en-US">
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<title>FormaLab | @yield('title')</title>
		<meta name="description" content="" />
		<meta name="Author" content="Dorin Grigoras [www.stepofweb.com]" />

		<!-- mobile settings -->
		<meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />

		<!-- WEB FONTS -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800&amp;subset=latin,latin-ext,cyrillic,cyrillic-ext" rel="stylesheet" type="text/css" />

		@yield('styles')

		<!-- CORE CSS -->
		{{ Html::style('adm/assets/plugins/bootstrap/css/bootstrap.min.css') }}
		
		<!-- THEME CSS -->
		{{ Html::style('adm/assets/css/essentials.css') }}
		{{ Html::style('adm/assets/css/layout.css') }}
		{{ Html::style('adm/assets/css/color_scheme/green.css') }}
		{{ Html::style('adm/assets/css/croppie.css') }}



		
        


	</head>
	<!--
		.boxed = boxed version
	-->
	<body>


		<!-- WRAPPER -->
		<div id="wrapper" class="clearfix">

			<!-- 
				ASIDE 
				Keep it outside of #wrapper (responsive purpose)
			-->
			<aside id="aside">
				<!--
					Always open:
					<li class="active alays-open">



					LABELS:
						<span class="label label-danger pull-right">1</span>
						<span class="label label-default pull-right">1</span>
						<span class="label label-warning pull-right">1</span>
						<span class="label label-success pull-right">1</span>
						<span class="label label-info pull-right">1</span>
				-->
				<nav id="sideNav"><!-- MAIN MENU -->
					<ul class="nav nav-list">
						<li {{ current_page('formateur') ? ' class = active '  : '' }} ><!-- Bord -->
							<a class="dashboard" href="/formateur"><!-- warning - url used by default by ajax (if eneabled) -->
								<i class="main-icon fa fa-tv" style="color: #ff6600"></i> <span>Tableau de bord</span>
							</a>
						</li>
 
                        <li {{ current_page('formateur/actualites') ? ' class = active '  : '' }} {{ current_page('formateur/actualites/create') ? ' class = active '  : '' }} ><!-- Blog -->
							<a class="dashboard"><!-- warning - url used by default by ajax (if eneabled) -->
								<i class="main-icon fa fa-newspaper-o" style="color: #ff6600"></i> <span>Les Actualités</span>
							</a>
							<ul><!-- submenus -->
								<li {{ current_page('formateur/actualites') ? ' class = active '  : '' }}><a href="/formateur/actualites">Liste des Actualités</a></li>
								<li {{ current_page('formateur/actualites/create') ? ' class = active '  : '' }}><a href="/formateur/actualites/create">Ajouter Actualité</a></li>
								<li {{ current_page('formateur/actualites/archives') ? ' class = active '  : '' }}><a href="/formateur/actualites/create">Archives</a></li>
							</ul>
						</li>
                       

				</nav>

				<span id="asidebg"><!-- aside fixed background --></span>
			</aside>
			<!-- /ASIDE -->


			<!-- HEADER -->
			<header id="header" >

				<!-- Mobile Button -->
				<button id="mobileMenuBtn"></button>

				<!-- Logo -->
				<span class="logo pull-left" >
					<img src="{{ asset('adm/assets/images/logo.png') }}" alt="admin panel" height="30" style="margin-left: 15px; margin-top: 4px" />
				</span>

				<nav>

					<!-- OPTIONS LIST -->
					<ul class="nav pull-right" style="margin-right: 30px">

						<!-- USER OPTIONS -->
						<li class="dropdown pull-left">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
								<img class="user-avatar" alt="" src="{{url('adm/assets/images/admin/'.Auth::user()->image)}}" height="34" /> 
								<span class="user-name">
									<span class="hidden-xs">
										{{ Auth::user()->name }} <i class="fa fa-angle-down"></i>
									</span>
								</span>
							</a>
							<ul class="dropdown-menu hold-on-click">
								<li><!-- settings -->
									<a href="{{ route('admin.profile', Auth::user()->id) }}""><i class="fa fa-cogs"></i> Profile</a>
								</li>

								<li class="divider"></li>

								<li><!-- lockscreen -->
									<a href="page-lock.html"><i class="fa fa-lock"></i> Lock Screen</a>
								</li>
								<li><!-- logout -->
								<a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <i class="fa fa-power-off"></i> Déconnexion</a>
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
								</li>
							</ul>
						</li>
						<!-- /USER OPTIONS -->

					</ul>
					<!-- /OPTIONS LIST -->

				</nav>

			</header>
			<!-- /HEADER -->

			<!-- Page Content -->
        	@yield('content')
		
	</body>

		

		<!-- JAVASCRIPT FILES -->
	    {{ Html::script('adm/assets/path.js') }}
		{{ Html::script('adm/assets/plugins/jquery/jquery-2.1.4.min.js') }}
		{{ Html::script('adm/assets/js/app.js') }}
		{{ Html::script('adm/assets/plugins/tinymce/tinymce.min.js') }}
  		<script>

  		tinymce.init({ 
  			selector:'.richtext',
  			plugins: "textcolor colorpicker",
  			menubar: false,
  			toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons',

  		});</script>
		@yield('scripts')
		
		
    </html>
