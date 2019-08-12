	@extends('visiteur.master')

	@section('title')
		Actualités
	@endsection

		@section('content')

			<section class="page-header parallax parallax-3" style="background-image:url('assets/images/imgpattern2.jpg')">
				<div class="overlay dark-5"><!-- dark overlay [1 to 9 opacity] --></div>

				<div class="container">

					<h1><span>Nos actualités</span></h1>
					<span class="font-lato size-18 weight-300"></span>

					<!-- breadcrumbs -->
					<ol class="breadcrumb">
						<li><a href="/">Accueil</a></li>
						<li class="active">Actualités</li>
					</ol><!-- /breadcrumbs -->
				</div>
			</section>

			
			<section>
				<div class="container">

					<div class="row" >

					@if (count($actualites) > 0)

						@foreach($actualites as $actualite)
						<div class="blog-post-item col-md-4 col-sm-4">

							<figure class="blog-item-small-image margin-bottom-20">
								<img src="{{url('adm/assets/images/actualite/'.$actualite->image)}}" alt="" style="max-height: 200px">
							</figure>

							<h4 style="display: inline-block; position: relative; margin-right: 10px "><a href="{{ route('page_blog', $actualite->slug)}}">{{substr($actualite->titre_actualite,0,200)}}</a></h4>

							<ul class="blog-post-info list-inline">
								<li>
										<i class="fa fa-calendar"></i> 
										<span class="font-lato">{{ date('j M,Y',strtotime($actualite->created_at)) }}</span>
								</li>
								<li>
								<i class="fa fa-user"></i> 
								<span class="font-lato">
									@if(!empty($actualite->id_admin))
										{{ $actualite->admin->name }}
									@elseif(!empty($actualite->id_formateur))
										{{ $actualite->formateur->name }}
									@endif
								</span>
								</li>
							</ul>

							<p>{{substr(strip_tags($actualite->description_actualite),0,150) }} {{strlen(strip_tags($actualite->description_actualite)) > 150 ? '...' : '' }}</p>

							<a href="{{ route('page_blog', $actualite->slug)}}" class="btn btn-reveal btn-default">
								<i class="fa fa-plus"></i>
								<span>Lire la suite</span>
							</a>

						</div>
						@endforeach

					@else

					<div align="center" style="margin-top: 50px"><h4> Aucune actualité disponible pour le moment, Reviens plus tard </h4></div>
					

					@endif

					</div>

					{{ $actualites->links() }}

				</div>
			</section>
		@endsection