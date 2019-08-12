@extends('visiteur.master')

		@section('title')
			Recherche
		@endsection

		@section('content')

			<section class="page-header parallax parallax-3" style="background-image:url('/assets/images/imgpattern2.jpg')">
				<div class="overlay dark-5"><!-- dark overlay [1 to 9 opacity] --></div>

				<div class="container">

					<h1><span>Résultat de recherche</span></h1>
					<!-- breadcrumbs -->
					<ol class="breadcrumb">
						<li><a href="/">Accueil</a></li>
						<li class="active">Les résultats de recherche</li>
					</ol><!-- /breadcrumbs -->
				</div>
			</section>




			<!-- -->
			<section>
				<div class="container">

					<div class="row">

						<div class="col-md-10 col-md-10">

							@if ((count($formations) + count($actualites)) == 0)
								<h2 align="center">Aucun résultat trouvé!</h2>
							@else
							<h5><span>Resultats : </span> {{count($formations) + count($actualites)}}</h5>
							<!-- SEARCH RESULTS -->
							@foreach($formations as $formation)
							<div class="clearfix search-result">
							<img src="{{url('adm/assets/images/formation/'.$formation->image_formation)}}" alt=""  width="120"/><!-- item -->
								<h4 class="margin-bottom-0"><a href="{{ route('page_formation', [$formation->categorie->slug, $formation->slug])}}">{{$formation->title}}</a></h4>
								<small class="text-success"></small>
								<p>{{substr(strip_tags($formation->objectif_formation),0,200) }} {{strlen(strip_tags($formation->objectif_formation)) > 200 ? '...' : '' }}</p>
							</div><!-- /item -->
							@endforeach
							@foreach($actualites as $actualite)
							<div class="clearfix search-result"><!-- item -->
							<img src="{{url('adm/assets/images/actualite/'.$actualite->image)}}" alt=""  width="120"/>
								<h4 class="margin-bottom-0"><a href="{{ route('page_blog', $actualite->slug)}}">{{$actualite->titre_actualite}}</a></h4>
								<small class="text-danger"></small>
								<p>{{substr(strip_tags($actualite->description_actualite),0,200) }} {{strlen(strip_tags($actualite->description_actualite)) > 200 ? '...' : '' }}</p>
							</div><!-- /item -->
							@endforeach
							<!-- /SEARCH RESULTS -->
							@endif

						</div>

					</div>


				</div>
			</section>
		@endsection
