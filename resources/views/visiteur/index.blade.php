@extends('visiteur.master')

@section('title')
	FomaLab
@endsection

	@section('content')
			<section id="slider" class="height-350">

				<!--
					SWIPPER SLIDER PARAMS

					data-effect="slide|fade|coverflow"
					data-autoplay="2500|false"
				-->
				<div class="swiper-container" data-effect="slide" data-autoplay="false">
					<div class="swiper-wrapper">

						<!-- SLIDE 1 -->
						<div class="swiper-slide" style="background-image: url('assets/images/wallpapers/1.jpg');">
							<div class="overlay dark-5"><!-- dark overlay [1 to 9 opacity] --></div>

							<div class="display-table">
								<div class="display-table-cell vertical-align-middle">
									<div class="container">

										<div class="row">
											<div class="text-center col-md-8 col-xs-12 col-md-offset-2">

												<h1 class="bold font-raleway wow fadeInUp" data-wow-delay="0.4s">FormaLab</h1>
												<p class="lead font-lato weight-300 hidden-xs wow fadeInUp" data-wow-delay="0.6s">La référence en matière de formation Informatique professionnelle</p>
											</div>
										</div>

									</div>
								</div>
							</div>

						</div>
						<!-- /SLIDE 1 -->


						<!-- SLIDE 2 -->
						<div class="swiper-slide" style="background-image: url('assets/images/wallpapers/1.jpg');">
							<div class="overlay dark-4"><!-- dark overlay [1 to 9 opacity] --></div>

							<div class="display-table">
								<div class="display-table-cell vertical-align-middle">
									<div class="container">

										<div class="row">
											<div class="text-center col-md-8 col-xs-12 col-md-offset-2">

												<h1 class="bold font-raleway wow fadeInUp" data-wow-delay="0.4s">FormaLab</h1>
												<p class="lead font-lato weight-300 hidden-xs wow fadeInUp" data-wow-delay="0.6s">La référence en matière de formation Informatique professionnelle</p>
											</div>
										</div>

									</div>
								</div>
							</div>

						</div>
						<!-- /SLIDE 2 -->

					</div>

					<!-- Swiper Pagination -->
					<div class="swiper-pagination"></div>

					<!-- Swiper Arrows -->
					<div class="swiper-button-next"><i class="fa fa-angle-right"></i></div>
					<div class="swiper-button-prev"><i class="fa fa-angle-left"></i></div>
				</div>

			</section>
			<!-- /SLIDER -->

			<!-- INFO BAR -->
			<section class="box-icon box-icon-center box-icon-round box-icon-transparent box-icon-large box-icon-content" style="background-color:#F5E7DE; margin-top:-20px">
				<div class="container">
				<header class="text-center margin-bottom-30">
						<h1 class="weight-300">Nos Services</h1>
						<h2 class="weight-300 letter-spacing-1 size-13"><span>NOUS VOULONS TRÈS SOIN DE NOS CLIENTS</span></h2>
					</header>


					{{-- <div class="row">
						<div class="col-sm-4" align="center">
						<img  class="thumbnail pull-center" src="assets/images/demo/1200x800/ic_formation.png" width="50" alt="" />
							<h3 align="left">Formation rapide et continue</h3>
							<p align="left" >FormaLab propose en une offre de plus de 50 programmes de formation continue destinés aux étudiants , cadres des entreprises, ainsi qu’aux organisations professionnelles et des bureaux d’études.</p>
						</div>

						<div class="col-sm-4" align="center">
						<img class="thumbnail pull-center"  src="assets/images/demo/1200x800/ic_pfe.png" width="50" alt="" />
							<h3 align="left">ENCADREMENT POUR LES PFE</h3>
							<p align="left">Encadrement au niveau du développement et la conception de votre application, au niveau de la rédaction de vos rapports et au niveau de la préparation de vos diapos.<br><br></p>
						</div>

						<div class="col-sm-4" align="center">
							<img class="thumbnail pull-center"  src="assets/images/demo/1200x800/ic_dev.png" width="50" alt="" />
							<h3 align="left">DEVELOPPEMENT WEB/MOBILE</h3>
							<p >Au-delà d’une réponse technique à vous apporter pour vos projets, chez FormaLab
							   nous accordons une réelle importance à notre engagement premier : vous offrir une solution logicielle performante et facilement exploitable.</p>
						</div>

					</div> --}}

					<div class="row">

						<div class="col-md-4">

							<div class="box-icon box-icon-center box-icon-round box-icon-transparent box-icon-large box-icon-content" style="background-color:#ffffff">
								<div class="box-icon-title">
									<i class="noborder et-lightbulb"></i>
									<h2>Formation rapide et continue</h2>
								</div>
								<p>FormaLab propose en une offre de plus de 50 programmes de formation continue destinés aux étudiants , cadres des entreprises, ainsi qu’aux organisations professionnelles et des bureaux d’études.</p>
							</div>

						</div>

						<div class="col-md-4">

							<div class="box-icon box-icon-center box-icon-round box-icon-transparent box-icon-large box-icon-content" style="background-color:#ffffff;" >
								<div class="box-icon-title">
									<i class="noborder et-book-open"></i>
									<h2>Encadrement pour les PFE</h2>
								</div>
								<p>Encadrement au niveau du développement et la conception de votre application, au niveau de la rédaction de vos rapports et au niveau de la préparation de vos diapos.<br><br></p>
							</div>

						</div>

						<div class="col-md-4">

							<div class="box-icon box-icon-center box-icon-round box-icon-transparent box-icon-large box-icon-content" style="background-color:#ffffff">
								<div class="box-icon-title">
									<i class="noborder et-laptop"></i>
									<h2>Developpement Web/Mobile</h2>
								</div>
								<p>Au-delà d’une réponse technique à vous apporter pour vos projets, chez FormaLab nous accordons une réelle importance à notre engagement premier : vous offrir une solution logicielle performante et facilement exploitable.</p>
							</div>

						</div>

					</div>

				</div>
			</section>
			<!-- /INFO BAR -->

			<!-- -->
			<section>
				<div class="container">

					<header class="text-center margin-bottom-60">
						<h1 class="weight-300">Formations récentes</h1>
						<h2 class="weight-300 letter-spacing-1 size-13" style="color: #ffffff"><span>Découvrez nos dernières formations</span></h2>
					</header>


					<div class="text-center">
						<div class="owl-carousel owl-padding-1 nomargin buttons-autohide controlls-over" data-plugin-options='{"singleItem": false, "items": "4", "autoPlay": 3500, "navigation": true, "pagination": false}'>
							@foreach($formations as $formation)
							<!-- item -->
							<div class="item-box">
								<figure>
									<span class="item-hover">
										<span class="overlay dark-5"></span>
										<span class="inner">
											<!-- details -->
											<a class="ico-rounded" href="{{ route('page_formation', [$formation->id_categorie, $formation->id])}}">
												<span class="glyphicon glyphicon-option-horizontal size-20"></span>
											</a>

										</span>
									</span>

									<img class="img-responsive" src="{{url('adm/assets/images/formation/'.$formation->image_formation)}}" width="600" height="399" alt="">
								</figure>

								<div class="item-box-desc">
									<h3>{{$formation->title}}</h3>

									<i class="fa fa-calendar"></i>
								<span class="font-lato">
                                   {{ date('j M,Y',strtotime($formation->start)) }}
								</span>
								</div>

							</div>

							<!-- /item -->
							@endforeach
						</div>
					</div>

				</div>
			</section>
			<!-- / -->

				<!-- RECENT NEWS -->
			<section style="background-color:#F5E7DE">
				<div class="container">

					<header class="text-center margin-bottom-60">
						<h1 class="weight-300">Nouvelles récentes</h1>
						<h2 class="weight-300 letter-spacing-1 size-13"><span>Découvrez nos dernières actualités</span></h2>
					</header>

					<div class="owl-carousel owl-padding-10 buttons-autohide controlls-over" data-plugin-options='{"singleItem": false, "items":"4", "autoPlay": 4000, "navigation": true, "pagination": false}'>
						@foreach($actualites as $actualite)
						<div class="img-hover">
								<img class="img-responsive" src="{{url('adm/assets/images/actualite/'.$actualite->image)}}" alt="">
							<h5 class="text-left margin-top-20"><a href="{{ route('page_blog', $actualite->id_actualite)}}">{{substr($actualite->titre_actualite,0,200)}}</a></h5>
							<p class="text-left">{{substr(strip_tags($actualite->description_actualite),0,200) }} {{strlen(strip_tags($actualite->description_actualite)) > 200 ? '...' : '' }}</p>
							<ul class="text-left size-12 list-inline list-separator">
								<li>
									<i class="fa fa-calendar"></i>
									{{ date('j M,Y',strtotime($actualite->created_at)) }}
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
						</div>
						@endforeach
					</div>
				</div>
			</section>
			<!-- /RECENT NEWS -->

			<section>
			<div class="container">

					<header class="text-center margin-bottom-60">
						<h1 class="weight-300">Galerie photos</h1>
						<h2 class="weight-300 letter-spacing-1 size-13"><span>Découvrez nos dernières photos</span></h2>
					</header>

				<div class="text-center">
					<div class="owl-carousel owl-padding-3 buttons-autohide controlls-over" data-plugin-options='{"singleItem": false, "items": "4", "autoPlay": true, "navigation": true, "pagination": false}'>
						@foreach($photos as $photo)
						<a href="{{url('adm/assets/images/galeries/'.$photo->photo)}}" data-plugin-options='{"type":"image"}' title="Fullscreen" class="image-hover lightbox">
							<img class="img-responsive" src="{{url('/adm/assets/images/galeries/'.$photo->photo)}}" alt="">
						</a>
						@endforeach
					</div>
				</div>
			</div>
		</section>
	@endsection
