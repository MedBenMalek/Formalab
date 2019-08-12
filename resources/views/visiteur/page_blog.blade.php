	@extends('visiteur.master')

	@section('title')
		 {{$actualites->titre_actualite}}
	@endsection

		@section('content')
            <section class="page-header parallax parallax-3" style="background-image:url('/assets/images/imgpattern2.jpg')">
				<div class="overlay dark-5"><!-- dark overlay [1 to 9 opacity] --></div>

				<div class="container">

					<h1><span>Actualité</span></h1>
					<span class="font-lato size-18 weight-300"></span>

					<!-- breadcrumbs -->
					<ol class="breadcrumb">
						<li><a href="/">Accueil</a></li>
						<li><a href="/blog">Actualités</a></li>
						<li class="active">{{$actualites->titre_actualite}}</li>
					</ol><!-- /breadcrumbs -->
				</div>
			</section>

			<section>
				<div class="container">
				<div align="center">
					<h1 class="blog-post-title">{{$actualites->titre_actualite}}</h1>
					<ul class="blog-post-info list-inline">
						<li>
								<i class="fa fa-calendar"></i> 
								<span class="font-lato">{{ date('j M,Y',strtotime($actualites->created_at)) }}</span>
						</li>
						<li>
								<i class="fa fa-user"></i> 
								<span class="font-lato">
									@if(!empty($actualites->id_admin))
										{{ $actualites->admin->name }}
									@elseif(!empty($actualites->id_formateur))
										{{ $actualites->formateur->name }}
									@endif

								</span>
						</li>
					</ul>
				</div>
					
					<figure class="margin-bottom-20" align="center">
						<img class="img-responsive" src="{{url('adm/assets/images/actualite/'.$actualites->image)}}" alt="img" />
					</figure>

					<hr>
	

					<!-- VIDEO -->
					<!--
					<div class="margin-bottom-20 embed-responsive embed-responsive-16by9">
						<iframe class="embed-responsive-item" src="http://player.vimeo.com/video/8408210" width="800" height="450"></iframe>
					</div>
					-->
					<!-- /VIDEO -->

					

					<p class="dropcap">{!! $actualites->description_actualite !!}</p>
					<hr>				
					<ul class="pager">
					@if ($test == 'min')

					@else
					<li class="previous"><a class="noborder" href="{{ route('page_blog', $previous->slug)}}">&larr; Article précédent</a></li>
					@endif

					@if ($test == 'max')
					
					@else
					<li class="next"><a class="noborder" href="{{ route('page_blog',$next->slug)}}">Article suivant &rarr;</a></li>
					@endif
					</ul>

				</div>
			</section>

		@endsection