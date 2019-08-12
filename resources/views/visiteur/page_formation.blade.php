	@extends('visiteur.master')

	@section('title')
		{{$formations->title}}
	@endsection

	@section('keywords')
	<meta name="keywords" content="@foreach ($tags as $tag){{$tag->name}},@endforeach FormaLab" />
	@endsection



		@section('style')
		        <style>
            /* The Modal (background) */
            .modal {
                display: none; /* Hidden by default */
                position: fixed; /* Stay in place */
                z-index: 1; /* Sit on top */
                width: 100%; /* Full width */
                height: 100%; /* Full height */
                overflow: auto; /* Enable scroll if needed */
                background-color: rgb(0,0,0); /* Fallback color */
                background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
                padding-top: 60px;
            }

            /* Modal Content/Box */
            .modal-content {
                background-color: #fefefe;
                margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
                border: 1px solid #888;
                width: 80%; /* Could be more or less, depending on screen size */
            }

            /* The Close Button (x) */
            .close {
                position: absolute;
                right: 25px;
                top: 0;
                color: #000;
                font-size: 35px;
                font-weight: bold;
            }

            .close:hover,
            .close:focus {
                color: red;
                cursor: pointer;
            }

            /* Add Zoom Animation */
            .animate {
                -webkit-animation: animatezoom 0.6s;
                animation: animatezoom 0.6s
            }

            @-webkit-keyframes animatezoom {
                from {-webkit-transform: scale(0)}
                to {-webkit-transform: scale(1)}
            }

            @keyframes animatezoom {
                from {transform: scale(0)}
                to {transform: scale(1)}
            }

            /* Change styles for span and cancel button on extra small screens */
            @media screen and (max-width: 300px) {
                span.psw {
                   display: block;
                   float: none;
                }
                .cancelbtn {
                   width: 100%;
                }
            }
        </style>
           @endsection

		@section('content')

			<section id="id01" class="modal">
				<div class="container animate"  >

				<div class="panel panel-default" >
				<div class="panel-body">

                    <h3 align="center">Pré-inscription</h3>

					{!! Form::open(['method' => 'POST', 'url' => route('inscri_formation',[$formations->id_categorie, $formations->id]),'class' => 'validate']) !!}
						<fieldset>
							<!-- required [php action request] -->
							<input type="hidden" name="action" value="contact_send" />

							<div class="row">
								<div class="form-group">
									<div class="col-md-6 col-sm-6">
										<label>Nom *</label>
										<input type="text" name="nom" value="" class="form-control required">
									</div>
									<div class="col-md-6 col-sm-6">
										<label>Prénom *</label>
										<input type="text" name="prenom" value="" class="form-control required">
									</div>
								</div>
							</div>

							<div class="row">
								<div class="form-group">
									<div class="col-md-6 col-sm-6">
										<label>É-mail *</label>
										<input type="email" name="email" value="" class="form-control required">
									</div>
									<div class="col-md-6 col-sm-6">
										<label>Numéro de téléphone *</label>
										<input type="text" name="telephone" value="" class="form-control required">
									</div>
								</div>
							</div>

							<div class="row">
								<div class="form-group">
									<div class="col-md-12 col-sm-12">
										<label>Niveau d'étude *</label>
										<input type="text" name="niveau_etude" value="" class="form-control required">
									</div>
								</div>
							</div>

							<div class="row">
								<div class="form-group">
									<div class="col-md-6 col-sm-6">
										<label>Thème de formation *</label>
										<input type="text" name="categorie" value="{{ $categorie->titre_categorie }}" class="form-control required" disabled>
									</div>
									<div class="col-md-6 col-sm-6">
										<label>Formation *</label>
										<input type="text" value="{{ $formations->title }}" class="form-control required" disabled>
										<input type="hidden" name="id_formation" value="{{ $formations->id }}" class="form-control required">
									</div>
								</div>
							</div>

							<div class="row">
								<div class="form-group">
									<div class="col-md-12 col-sm-12">
										<label>Message</label>
										<textarea name="message" rows="4" class="form-control"></textarea>
									</div>
								</div>
							</div>
						</fieldset>
						<div class="row">
							<div class="col-md-12">
								<button type="submit" class="btn btn-3d btn-teal btn- btn-block margin-top-5">
									Envoyer
								</button>
							</div>
						</div>
					{!! Form::close() !!}
					</div>
					</div>
				</div>
			</section>


				<!--
				PAGE HEADER

				CLASSES:
					.page-header-xs	= 20px margins
					.page-header-md	= 50px margins
					.page-header-lg	= 80px margins
					.page-header-xlg= 130px margins
					.dark			= dark page header

					.shadow-before-1 	= shadow 1 header top
					.shadow-after-1 	= shadow 1 header bottom
					.shadow-before-2 	= shadow 2 header top
					.shadow-after-2 	= shadow 2 header bottom
					.shadow-before-3 	= shadow 3 header top
					.shadow-after-3 	= shadow 3 header bottom
					.light			= light page header
			-->
			<section class="page-header parallax parallax-3" style="background-image:url('/assets/images/imgpattern2.jpg')">
				<div class="overlay dark-5"><!-- dark overlay --></div>

				<div class="container">

					<h1><span> {{ $formations->title }} </span></h1>
					<span class="font-lato size-18 weight-300">{{ $categorie->titre_categorie }}</span>

					<!-- breadcrumbs -->
					<ol class="breadcrumb">
						<li><a href="/">Accueil</a></li>
						<li><a href="/formations">Formations</a></li>
						<li><a href="{{ route('categorie', $formations->categorie->slug)}}">Catégories</a></li>
						<li class="active">{{ $formations->title }}</li>
					</ol><!-- /breadcrumbs -->
				</div>
			</section>
			<!-- /PAGE HEADER -->

			<!-- -->
			<section>
				<div class="container">

					<div class="row">

						<!-- LEFT -->
						<div class="col-md-3 col-sm-3">
						<div class="toggle toggle-transparent toggle-bordered-simple">



							<div class="toggle active">
								<label align="center">Pré-requis</label>
								<div class="toggle-content">
									<p>{{ $formations->prerequis_formation }}</p>
								</div>
							</div>

							<hr />

							<div class="toggle">
								<label align="center">Tarifs</label>
								<div class="toggle-content">
									<p>{{ $formations->prix_formation }} dt</p>
								</div>
							</div>

							<hr />

							<div align="center">
								<a class="btn btn-lg btn-3d btn-teal scrollTo" data-offset="150" onclick="document.getElementById('id01').style.display='block'" style="width:auto;"><i class="fa fa-check" ></i>Pré-inscription</a>
							</div>

						</div>

						</div>

						<!-- CENTER -->
						<div class="col-md-6 col-sm-6">

								<div>
									<img class="img-responsive"  src="{{url('adm/assets/images/formation/'.$formations->image_formation)}}" alt="" width="550" height="235">
								</div>
								<br>
								<ul class="blog-post-info list-inline" align="center">
									<li>
											<i class="fa fa-calendar"></i>
											<span class="font-lato">{{ date('j M, Y',strtotime($formations->start)) }}</span>
									</li>
									<li>
											<i class="fa fa-clock-o"></i>
											<span class="font-lato">Durée : {{ $formations->duree_formation }}</span>
									</li>
								</ul>
							<div class="toggle toggle-transparent toggle-bordered-simple">

								<div class="toggle">
									<label align="center">Objectifs</label>
									<div class="toggle-content" style="text-align: justify;">
										<p>{{ $formations->objectif_formation }}</p>
									</div>
								</div>

								<hr />

							<div class="toggle active">
								<label align="center">Programme</label>
								<div class="toggle-content">
									<p>{!! $formations->programme_formation !!}</p>
								</div>
							</div>
							</div>
						</div>

						<!-- RIGHT -->
						<div class="col-md-3 col-sm-3 hiddex-xs">

							<div class="testimonial" align="center">
								<div class="heading-title heading-dotted text-center">
									<h3>Formateur</h3>
								</div>
								<figure>
									<img class="rounded" src="{{url('adm/assets/images/formateur/'.$formateur->image)}}" />
								</figure>
								<div class="testimonial-content nopadding">
									<cite>
										{{ $formateur->name }}
										<span>{{ $formateur->prenom }}.</span>
									</cite>
								</div>
							</div>
							<hr />

							@if(isset($autres->title))

							<!-- side navigation -->
							<div class="side-nav margin-bottom-60 margin-top-30" align="center">

								<div class="heading-title heading-dotted text-center">
									<h3>Autres formations</h3>
								</div>
								<ul class="list-group list-group-bordered list-group-noicon">
									@foreach ($autres as $formation)
									
										<li class="list-group-item"><a href="{{route('page_formation', [$categorie->slug,$formation->slug])}}">{{$formation->title}}</a></li>
									@endforeach
								</ul>
								<!-- /side navigation -->


							</div>
							@endif
						</div>
				</div>
			</section>

		@endsection
