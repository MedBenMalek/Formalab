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

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- mobile settings -->
		<meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />

		<!-- WEB FONTS -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800&amp;subset=latin,latin-ext,cyrillic,cyrillic-ext" rel="stylesheet" type="text/css" />

		@yield('styles')

		<!-- CORE CSS -->
		{{ Html::style('adm/assets/plugins/bootstrap/css/bootstrap.min.css') }}

		<!-- datepicker CSS -->
		{{ Html::style('adm/assets/plugins/bootstrap.datepicker/css/bootstrap-datetimepicker.min.css') }}

		<!-- CALANDAR CSS -->
		{{ Html::style('adm/assets/plugins/fullcalendar/fullcalendar.min.css') }}


		<!-- THEME CSS -->
		{{ Html::style('adm/assets/css/essentials.css') }}
		{{ Html::style('adm/assets/css/layout.css') }}
		{{ Html::style('adm/assets/css/color_scheme/green.css') }}
		{{ Html::style('adm/assets/css/croppie.css') }}

		<!-- Calendrier scripts -->
		{{ Html::script('adm/assets/plugins/jquery/jquery-2.1.4.min.js') }}
		{{ Html::script('adm/assets/plugins/fullcalendar/lib/moment.min.js') }}
		{{ Html::script('adm/assets/plugins/fullcalendar/fullcalendar.min.js') }}



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
						<li {{ current_page('admin') ? ' class = active '  : '' }} ><!-- Bord -->
							<a class="dashboard" href="/admin"><!-- warning - url used by default by ajax (if eneabled) -->
								<i class="main-icon fa fa-tv" style="color: #ff6600"></i> <span>Tableau de bord</span>
							</a>
						</li>
						<li {{ current_page('admin/categories') ? ' class = active '  : '' }} {{ current_page('admin/categories/create') ? ' class = active '  : '' }}><!-- Catégorie formation -->
							<i class="fa fa-menu-arrow pull-right"></i>
							<a class="dashboard"><!-- warning - url used by default by ajax (if eneabled) -->
								<i class="main-icon fa fa-file-archive-o" style="color: #ff6600"></i> <span>Les Catégories</span>
							</a>
							<ul><!-- submenus -->
								<li {{ current_page('admin/categories') ? ' class = active '  : '' }}><a href="/admin/categories">Liste des catégories</a></li>
								<li {{ current_page('admin/categories/create') ? ' class = active '  : '' }}><a href="/admin/categories/create">Ajouter catégorie</a></li>
							</ul>
						</li>
                        <li {{ current_page('admin/formations') ? ' class = active '  : '' }} {{ current_page('admin/formations/create') ? ' class = active '  : '' }} {{ current_page('admin/formation/archive') ? ' class = active '  : '' }} ><!-- Formations -->
							<a class="dashboard"><!-- warning - url used by default by ajax (if eneabled) -->
								<i class="main-icon fa fa-graduation-cap" style="color: #ff6600"></i> <span>Les Formations</span>
							</a>
							<ul><!-- submenus -->
								<li {{ current_page('admin/formations') ? ' class = active '  : '' }}><a href="/admin/formations">Liste des formations</a></li>
								<li {{ current_page('admin/formations/create') ? ' class = active '  : '' }}><a href="/admin/formations/create">Ajouter formation</a></li>
								<li {{ current_page('admin/formation/archive') ? ' class = active '  : '' }}><a href="/admin/formation/archive">Archives</a></li>
							</ul>
						</li>
                        <li {{ current_page('admin/formateurs') ? ' class = active '  : '' }} {{ current_page('admin/formateurs/create') ? ' class = active '  : '' }} ><!-- Formateur -->
							<a class="dashboard"><!-- warning - url used by default by ajax (if eneabled) -->
								<i class="main-icon fa fa-users" style="color: #ff6600"></i> <span>Les Formateurs</span>
							</a>
							<ul><!-- submenus -->
								<li {{ current_page('admin/formateurs') ? ' class = active '  : '' }}><a href="/admin/formateurs">Liste des formateurs</a></li>
								<li {{ current_page('admin/formateurs/create') ? ' class = active '  : '' }}><a href="/admin/formateurs/create">Ajouter formateur</a></li>
							</ul>
						</li>
                        <li {{ current_page('admin/actualites') ? ' class = active '  : '' }} {{ current_page('admin/actualites/create') ? ' class = active '  : '' }} {{ current_page('admin/actualite/archive') ? ' class = active '  : '' }}  ><!-- Blog -->
							<a class="dashboard"><!-- warning - url used by default by ajax (if eneabled) -->
								<i class="main-icon fa fa-newspaper-o" style="color: #ff6600"></i> <span>Les Actualités</span>
							</a>
							<ul><!-- submenus -->
								<li {{ current_page('admin/actualites') ? ' class = active '  : '' }}><a href="/admin/actualites">Liste des Actualités</a></li>
								<li {{ current_page('admin/actualites/create') ? ' class = active '  : '' }}><a href="/admin/actualites/create">Ajouter Actualité</a></li>
								<li {{ current_page('admin/actualite/archive') ? ' class = active '  : '' }}><a href="/admin/actualite/archive">Archives</a></li>
							</ul>
						</li>
                        <li {{ current_page('admin/inscriptions') ? ' class = active '  : '' }} {{ current_page('admin/inscription/archive') ? ' class = active '  : '' }}><!-- pré-inscription -->
							<a class="dashboard"><!-- warning - url used by default by ajax (if eneabled) -->
								<i class="main-icon fa fa-user-plus" style="color: #ff6600"></i> <span>Les Pré-inscriptions</span>
							</a>
							<ul>
								<li {{ current_page('admin/inscriptions') ? ' class = active '  : '' }}><a href="/admin/inscriptions">Liste des Pré-inscriptions</a></li>
								<li {{ current_page('admin/inscription/archive') ? ' class = active '  : '' }}><a href="/admin/inscription/archive">Archives</a></li>
							</ul>
						</li>
                        <li {{ current_page('admin/galerie') ? ' class = active '  : '' }} ><!-- Galerie -->
							<a class="dashboard" href="/admin/galerie"><!-- warning - url used by default by ajax (if eneabled) -->
								<i class="main-icon fa fa-photo" style="color: #ff6600"></i> <span>Galerie Photo</span>
							</a>
						</li>
            <li {{ current_page('admin/calendrier') ? ' class = active '  : '' }} ><!-- Calenfrier -->
							<a class="dashboard" href="/admin/calendrier"><!-- warning - url used by default by ajax (if eneabled) -->
								<i class="main-icon fa fa-calendar" style="color: #ff6600"></i> <span>Calendrier</span>
							</a>
						</li>
						<li {{ current_page('admin/certificats') ? ' class = active '  : '' }} ><!-- Certificats -->
							<a class="dashboard" href="/admin/certificats"><!-- warning - url used by default by ajax (if eneabled) -->
								<i class="main-icon fa fa-file-pdf-o" style="color: #ff6600"></i> <span>Générer Certificats</span>
							</a>
						</li>
                        <li {{ current_page('admin/factures') ? ' class = active '  : '' }} ><!-- Factures -->
							<a class="dashboard" href="/admin/factures"><!-- warning - url used by default by ajax (if eneabled) -->
								<i class="main-icon fa fa-file-pdf-o" style="color: #ff6600"></i> <span>Générer Factures</span>
							</a>
						</li>
					</ul>

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

						<!-- home -->
						<li style="display: inline;"><a style="display: inline;"  target="_blank" href="{{ route('index') }}"><i style="margin-top: 15px" class="glyphicon glyphicon-home pull-right"></i></a></li>

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
									<a href="{{ route('admin.profile', Auth::user()->id) }}"><i class="fa fa-cogs"></i> Profil</a>
								</li>

								<li class="divider"></li>

								
								<li><!-- logout -->
								<a 	href="{{ route('logout') }}" onclick="event.preventDefault();
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


		{{ Html::script('adm/assets/js/app.js') }}
		{{ Html::script('adm/assets/plugins/tinymce/tinymce.min.js') }}
		{{ Html::script('adm/assets/plugins/bootstrap.dialog/dist/js/bootstrap-dialog.min.js') }}
		<script src='/adm/assets/plugins/fullcalendar/locale/fr.js'></script>


		<!-- JAVASCRIPT REACHTXT -->
  		<script>

  		tinymce.init({
  			selector:'.richtext',
  			plugins: "textcolor colorpicker",
  			menubar: false,
  			toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons',

  		});
  		</script>
		@yield('scripts')
		@include('administrateur.layouts.messages')



    </html>
