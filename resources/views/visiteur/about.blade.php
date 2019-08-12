		
		@extends('visiteur.master')

		@section('title')
			Qui sommes-nous
		@endsection

	@section('content')
		<section class="page-header parallax parallax-3" style="background-image:url('assets/images/imgpattern2.jpg')">
				<div class="overlay dark-5"><!-- dark overlay [1 to 9 opacity] --></div>

				<div class="container">

					<h1><span>Qui sommes-nous</span></h1>
					<span class="font-lato size-18 weight-300"></span>

					<!-- breadcrumbs -->
					<ol class="breadcrumb">
						<li><a href="/">Accueil</a></li>
						<li class="active">Le centre</li>
					</ol><!-- /breadcrumbs -->
				</div>
			</section>
			<!-- /PAGE HEADER -->

			<!-- -->
			<section>
				<div class="container">
					
					<div class="row">
					
						<div class="col-lg-6 col-md-6 col-sm-6">

							<!-- OWL SLIDER -->
							<div class="owl-carousel buttons-autohide controlls-over nomargin box-shadow-1" data-plugin-options='{"items": 1, "autoHeight": true, "navigation": true, "pagination": true, "transitionStyle":"fade", "progressBar":"true"}'>
								<div>
									<img class="img-responsive" src="assets/images/demo/1200x800/32-min.jpg" alt="">
								</div>
								<div>
									<img class="img-responsive" src="assets/images/demo/1200x800/33-min.jpg" alt="">
								</div>
								<div>
									<img class="img-responsive" src="assets/images/demo/1200x800/7-min.jpg" alt="">
								</div>
							</div>
							<!-- /OWL SLIDER -->

						</div>

						<div class="col-lg-6 col-md-6 col-sm-6">
							<div class="heading-title heading-border-bottom">
								<h3>We believe in Simple &amp; Creative</h3>
							</div>

							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam in minima iusto voluptatem aliquam odit odio. Aliquam voluptatibus beatae officiis?</p>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique excepturi voluptates placeat ducimus delectus magnam tempore dolore dolorem quisquam porro modi voluptatum eum saepe dolorum ratione officia sint eos minus.</p>
							<blockquote>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas metus nulla, commodo a sodales sed, dignissim pretium nunc.</p>
								<cite>Albert Einstein</cite>
							</blockquote>

						</div>

					</div>
					
				</div>
			</section>

			<hr>
			<!-- -->
			<section>
				<div class="container">
					
					<div class="row">
					
						<div class="col-lg-6 col-md-6 col-sm-6">

							<div class="heading-title heading-border-bottom">
								<h3>Services FormaLab </h3>
							</div>

							<ul class="nav nav-tabs nav-clean">
								<li class="active"><a href="#tab1" data-toggle="tab">Formation</a></li>
								<li><a href="#tab2" data-toggle="tab">Encadrement</a></li>
								<li><a href="#tab3" data-toggle="tab">Développement</a></li>
							</ul>

							<div class="tab-content">
								<div id="tab1" class="tab-pane fade in active">
									<img class="thumbnail pull-left" src="assets/images/demo/1200x800/ic_formation.png" width="100" alt="" />
									<p>FormaLab propose en une offre de plus de 50 programmes de formation continue destinés aux étudiants , cadres des entreprises, ainsi qu’aux organisations professionnelles et des bureaux d’études.<p>
								</div>
								<div id="tab2" class="tab-pane fade">
									<img class="thumbnail pull-right"  src="assets/images/demo/1200x800/ic_pfe.png" width="100" alt="" />
									<p>Encadrement au niveau du développement et la conception de votre application, au niveau de la rédaction de vos rapports et au niveau de la préparation de vos diapos.<p>
								
								</div>
								<div id="tab3" class="tab-pane fade">
									<img class="thumbnail pull-left"  src="assets/images/demo/1200x800/ic_dev.png" width="100" alt="" />
									<p>Au-delà d’une réponse technique à vous apporter pour vos projets, chez FormaLab nous accordons une réelle importance à notre engagement premier : vous offrir une solution logicielle performante et facilement exploitable.<p>
								</div>
							</div>

						</div>

						<div class="col-lg-6 col-md-6 col-sm-6">

							<div class="heading-title heading-border-bottom">
								<h3>Compétences FormaLab</h3>
							</div>

							<div class="progress progress-lg"><!-- progress bar -->
								<div class="progress-bar progress-bar-warning progress-bar-striped active text-left" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%; min-width: 2em;">
									<span>WEB DESIGN 90%</span>
								</div>
							</div><!-- /progress bar -->

							<div class="progress progress-lg"><!-- progress bar -->
								<div class="progress-bar progress-bar-danger progress-bar-striped active text-left" role="progressbar" aria-valuenow="98" aria-valuemin="0" aria-valuemax="100" style="width: 98%; min-width: 2em;">
									<span>HTML/CSS & LARAVEL 98%</span>
								</div>
							</div><!-- /progress bar -->

							<div class="progress progress-lg"><!-- progress bar -->
								<div class="progress-bar progress-bar-success progress-bar-striped active text-left" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%; min-width: 2em;">
									<span>JAVASCRIPT 60%</span>
								</div>
							</div><!-- /progress bar -->

							<div class="progress progress-lg"><!-- progress bar -->
								<div class="progress-bar progress-bar-info progress-bar-striped active text-left" role="progressbar" aria-valuenow="88" aria-valuemin="0" aria-valuemax="100" style="width: 88%; min-width: 2em;">
									<span>PHP/MYSQL 88%</span>
								</div>
							</div><!-- /progress bar -->

						</div>

					</div>
					
				</div>
			</section>
			<!-- / -->

			
		@endsection