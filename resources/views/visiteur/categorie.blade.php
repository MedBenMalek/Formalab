
	@extends('visiteur.master')

	@section('title')
		{{ $categories->titre_categorie }}
	@endsection

		@section('content')

	<section class="page-header parallax parallax-3" style="background-image:url('/assets/images/imgpattern2.jpg')">
				<div class="overlay dark-5"><!-- dark overlay [1 to 9 opacity] --></div>

				<div class="container">

					<h1><span> {{ $categories->titre_categorie }} </span></h1>
					<span class="font-lato size-18 weight-300">Formation rapide &amp; continue</span>

					<!-- breadcrumbs -->
					<ol class="breadcrumb">
						<li><a href="/">Accueil</a></li>
						<li class="active"><a href="/formations">Formations</a></li>
						<li class="active">{{ $categories->titre_categorie }}</li>
					</ol><!-- /breadcrumbs -->
				</div>
			</section>
			<!-- /PAGE HEADER -->

			<!-- -->
			<section>
				<div class="container">
						<div class="panel panel-default">
								<div class="panel-body">
									<img class="pull-left img-responsive" src="{{url('adm/assets/images/categorie/'.$categories->image_categorie)}}" width="200" height="200" alt="" />
									<p>
										{{ $categories->description_categorie }}
									</p>
								</div>
						</div>
				</div>
			</section>
			<!-- / -->

            <div class="heading-title heading-dotted text-center">
                <h3><span>Les Formations</span></h3>
            </div>


				<section>

					<!-- formations -->
					<div class="container">
						<div class="row">
						@if (count($formations) > 0)
                        @foreach($formations as $formation)

                            <div class="col-md-3">

                                <div>
                                    <div class="front">
                                        <div class="box1 box-info">
                                                <img class="img-responsive" src="{{url('adm/assets/images/formation/'.$formation->image_formation)}}" alt="" style="max-height: 150px" />
                                                <a href="{{ route('page_formation', [$categories->slug, $formation->slug])}}"><h5 align="center" style="color: #fff">{{ $formation->title }}</h5></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @endforeach
                        @else

                        <div align="center"><h4> Aucune formation disponible pour le moment, Reviens plus tard </h4></div>

                        @endif

						</div>
						{{ $formations->links() }}
					</div>



			</section>
		@endsection
