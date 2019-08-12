	@extends('visiteur.master')

	@section('title')
		Formateurs
	@endsection

		@section('content')

		<section class="page-header parallax parallax-3" style="background-image:url('assets/images/imgpattern2.jpg')">
				<div class="overlay dark-5"><!-- dark overlay [1 to 9 opacity] --></div>

				<div class="container">

					<h1><span>Notre équipe </span></h1>
					<span class="font-lato size-18 weight-300"></span>

					<!-- breadcrumbs -->
					<ol class="breadcrumb">
						<li><a href="/">Accueil</a></li>
						<li class="active">Notre équipe</li>
					</ol><!-- /breadcrumbs -->
				</div>
			</section>
			<!-- /PAGE HEADER -->

			<!-- -->
			<section>
				<div class="container">

                    <header class="text-center margin-bottom-60">
						<h1 class="weight-300">FormaLab Team</h1>
						<h2 class="weight-300 letter-spacing-1 size-13"><span>NOUS ATTENDONS TOUJOURS À NOTRE CLIENT</span></h2>
					</header>

					<div class="row">


					@foreach($formateurs as $formateur)
						@if(!empty($formateur->skills && $formateur->telephone && $formateur->adresse && $formateur->presentation && $formateur->experience && $formateur->competence))
						<!-- item -->
						<div class="col-md-3 col-sm-6">
					   

							<div class="box-flip box-color box-icon box-icon-center box-icon-round box-icon-large text-center">
								<div class="front">
									<div class="box1 box-default">
										<div class="box-icon-title">
											<img class="img-responsive" src="{{url('adm/assets/images/formateur/'.$formateur->image)}}" />
											<h2>{{$formateur->name}} {{$formateur->prenom}}</h2>
											<small>{{$formateur->skills}}</small>
										</div>
									</div>
								</div>

								<div class="back">
									<div class="box2 box-default">
										<h4 class="nomargin">{{$formateur->name}} {{$formateur->prenom}}</h4>
										<small>{{$formateur->skills}}</small>

										<hr />

                                        <a href="{{route('profile_formateur',$formateur->id) }}" class="btn btn-translucid btn-lg btn-block">VIEW PROFILE</a>

                                        <hr />

										@if(!empty($formateur->facebook))
										<a target="_blank" href="http://{{$formateur->facebook}}" class="social-icon social-icon-sm social-facebook">
											<i class="fa fa-facebook"></i>
											<i class="fa fa-facebook"></i>
										</a>
										@endif
										@if(!empty($formateur->twitter))
										<a target="_blank" href="http://{{$formateur->twitter}}" class="social-icon social-icon-sm social-twitter">
											<i class="fa fa-twitter"></i>
											<i class="fa fa-twitter"></i>
										</a>
										@endif
										@if(!empty($formateur->linkedin))
										<a target="_blank" href="http://{{$formateur->linkedin}}" class="social-icon social-icon-sm social-linkedin">
											<i class="fa fa-linkedin"></i>
											<i class="fa fa-linkedin"></i>
										</a>
										@endif
										@if(!empty($formateur->googleplus))
										<a target="_blank" href="http://{{$formateur->googleplus}}" class="social-icon social-icon-sm social-google">
											<i class="fa fa-google-plus"></i>
											<i class="fa fa-google-plus"></i>
										</a>
										@endif
									</div>
								</div>
							</div>
						</div>
						<!-- /item -->
						<div style="display: none;">{{ $i = $i+1}}</div>
						@endif
						@endforeach
						

						@if ($i == 0 )

							<div align="center"><h4> Cette page n'est pas disponible pour le moment, Reviens plus tard </h4></div>

						@endif

					</div>
						
				</div>

				   {{ $formateurs->links() }}
			</section>



		@endsection
