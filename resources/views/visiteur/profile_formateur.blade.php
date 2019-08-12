	@extends('visiteur.master')

	@section('title')
		{{$formateurs->name}}
	@endsection

		@section('content')

			<section class="page-header parallax parallax-3" style="background-image:url('/assets/images/imgpattern2.jpg')">
				<div class="overlay dark-5"><!-- dark overlay [1 to 9 opacity] --></div>

				<div class="container">

					<h1><span> {{$formateurs->name}} {{$formateurs->prenom}} </span></h1>
					<span class="font-lato size-18 weight-300"></span>

					<!-- breadcrumbs -->
					<ol class="breadcrumb">
						<li><a href="/">Accueil</a></li>
						<li><a href="/formateurs">Formateurs</a></li>
						<li class="active">{{$formateurs->name}} {{$formateurs->prenom}}</li>
					</ol><!-- /breadcrumbs -->
				</div>
			</section>
			<!-- /PAGE HEADER -->

			<!-- -->
			<section>
				<div class="container">
					
					<!-- LEFT -->
					<div class="col-lg-3 col-md-3 col-sm-4">
					
						<div class="thumbnail text-center">
							<img src="{{url('adm/assets/images/formateur/'.$formateurs->image)}}" alt="" />
							<h2 class="size-18 margin-top-10 margin-bottom-0">{{$formateurs->name}} {{$formateurs->prenom}}</h2>
							<h3 class="size-11 margin-top-0 margin-bottom-10 text-muted">{{$formateurs->skills}}</h3>
						</div>


						<!-- detail formateur -->
						<ul class="side-nav list-group margin-bottom-60" id="sidebar-nav">
							<li class="list-group-item"><i class="fa fa-envelope"></i>E-mail: {{$formateurs->email}}</li>
							<li class="list-group-item"><i class="fa fa-phone"></i> Tél: {{$formateurs->telephone}}</li>
							<li class="list-group-item"><i class="fa fa-comments-o"></i>Adresse: {{$formateurs->adresse}}</li>

						</ul>
						<!-- / -->
					</div>

					<!-- RIGHT -->
					<div class="col-lg-9 col-md-9 col-sm-8">
						<!-- FLIP BOX -->
						<div class=" box-icon box-icon-center box-icon-round box-icon-large text-center nomargin">
							<div class="front">
								<div class="box1 noradius">
									<div class="box-icon-title">
										<i class="fa fa-user"></i>
										<h2>{{$formateurs->name}} &ndash; Profil</h2>

									</div>
									<p>{{$formateurs->presentation}}</p>
								</div>
							</div>

						</div>
						<!-- /FLIP BOX -->
						<hr>


						<div class="box-light"><!-- .box-light OR .box-dark -->

							<div class="row">

								<!-- POPULAR POSTS -->
								<div class="col-md-6 col-sm-6">

									<div class="box-inner">
										<h3>
											Expériences
										</h3>
										<p>{{$formateurs->experience}}</p>
									</div>

								</div>
								<!-- /POPULAR POSTS -->

								<!-- copetance -->
								<div class="col-md-6 col-sm-6">

									<div class="box-inner">
										<h3>
											Compétences
										</h3>
										<p>{{$formateurs->competence}}</p>
									</div>
								</div>
								<!-- /POPULAR POSTS -->

							</div>

						</div>
					</div>
					
				</div>
			</section>

		@endsection