	@extends('visiteur.master')

	@section('title')
		Catégories
	@endsection

		@section('content')

		<section class="page-header parallax parallax-3" style="background-image:url('assets/images/imgpattern2.jpg')">
				<div class="overlay dark-5"><!-- dark overlay [1 to 9 opacity] --></div>

				<div class="container">

					<h1><span>Nos formations</span></h1>
					<span class="font-lato size-18 weight-300">Formation rapide &amp; continue</span>

					<!-- breadcrumbs -->
					<ol class="breadcrumb">
						<li><a href="/">Accueil</a></li>
						<li class="active">Formations</li>
					</ol><!-- /breadcrumbs -->

				</div>
			</section>
			<!-- /PAGE HEADER -->

			<!-- -->
			<section>
				<div class="container">

			@if (count($categories)>0)
				@foreach($categories as $c)
					
					<div class="row"><!-- item -->
						<div class="col-md-2"><!-- company logo -->
							<img src="{{url('adm/assets/images/categorie/'.$c->image_categorie)}}" class="img-responsive" alt="company logo">
						</div>
						<div class="col-md-10"><!-- company detail -->
							<h4 class="margin-bottom-10"><span>{{ $c->titre_categorie }}</span> </h4>
							<p>{{ $c->description_categorie }}</p>
							<a href="{{ route('categorie', $c->slug)}}" class="btn btn-xs btn-default btn-bordered">
							<span>Savoir plus</span>
							</a>
						</div>
					</div><!-- /item -->

					<hr />
				@endforeach

			@else

			<div align="center"><h4> Aucune catégorie disponible pour le moment, Reviens plus tard </h4></div>

			@endif

				{{ $categories->links() }}

				</div>
			</section>

		@endsection