@extends('administrateur.layouts.default')
@section('title')
	Tableau de bord
@endsection

		@section('content')

			<section id="middle">
				<!-- page title -->
				<header id="page-header">
					<h1>Tableau de bord</h1>
					<ol class="breadcrumb">
						<li class="active">Acceuil</li>
					</ol>
				</header>
				{!! Charts::assets() !!}
				<!-- /page title -->
			<div id="content" class="dashboard padding-20">

			<div id="panel-1" class="panel panel-default">

						<div class="panel-body" style="width: 100%">
							<div align="center">
								<h2>Résumé d'inscriptions</h2>
							</div>
							{!! $chart->render() !!}

						</div>



						<!-- /panel content -->

						<!-- panel footer -->
						<div class="panel-footer">

							<!--
								.md-4 is used for a responsive purpose only on col-md-4 column.
								remove .md-4 if you use on a larger column
							-->
							<div align="center">
							<h2>Les formations les plus actives</h2>
							</div>
							<ul class="easypiecharts list-unstyled">
								<li class="clearfix">
									<span class="stat-number">
									@foreach($formation as $f )
										@if( isset ( $v[0] ) && $f->id == $id[0])
											{{$f->title}}
									</span>
									<span class="stat-title">{{$f->categorie->titre_categorie}}</span>



									<span class="easyPieChart" data-percent="{{ ($v[0] / $total) * 100 }}" data-easing="easeOutBounce" data-barColor="{{$f->color}}" data-trackColor="#dddddd" data-scaleColor="#dddddd" data-size="60" data-lineWidth="4">
										<span class="percent"></span>
									</span>
										@endif
									@endforeach
								</li>
								<li class="clearfix">
									<span class="stat-number">
									@foreach($formation as $f )
										@if(isset ( $v[1] ) && $f->id == $id[1] )
											{{$f->title}}
									</span>
									<span class="stat-title">{{$f->categorie->titre_categorie}}</span>



									<span class="easyPieChart" data-percent="{{ ($v[1] / $total) * 100 }}" data-easing="easeOutBounce" data-barColor="{{$f->color}}" data-trackColor="#dddddd" data-scaleColor="#dddddd" data-size="60" data-lineWidth="4">
										<span class="percent"></span>
									</span>
										@endif
									@endforeach
								</li>
								<li class="clearfix">
									<span class="stat-number">
									@foreach($formation as $f )
										@if( isset ( $v[2]) && $f->id == $id[2] )
											{{$f->title}}
									</span>
									<span class="stat-title">{{$f->categorie->titre_categorie}}</span>



									<span class="easyPieChart" data-percent="{{ ($v[2] / $total) * 100 }}" data-easing="easeOutBounce" data-barColor="{{$f->color}}" data-trackColor="#dddddd" data-scaleColor="#dddddd" data-size="60" data-lineWidth="4">
										<span class="percent"></span>
									</span>
										@endif
									@endforeach
								</li>
								<li class="clearfix">
									<span class="stat-number">
									@foreach($formation as $f )
										@if( isset ( $v[3] ) && $f->id == $id[3])
											{{$f->title}} 
									</span>
									<span class="stat-title">{{$f->categorie->titre_categorie}}</span>



									<span class="easyPieChart" data-percent="{{ ($v[3] / $total) * 100 }}" data-easing="easeOutBounce" data-barColor="{{$f->color}}" data-trackColor="#dddddd" data-scaleColor="#dddddd" data-size="60" data-lineWidth="4">
										<span class="percent"></span>
									</span>
										@endif
									@endforeach
								</li>
							</ul>

						</div>
						<!-- /panel footer -->

					</div>
					<!-- /PANEL -->



					<!-- BOXES -->
					<div class="row">

						<!-- Feedback Box -->
						<div class="col-md-3 col-sm-6">

							<!-- BOX -->
							<div class="box danger"><!-- default, danger, warning, info, success -->

								<div class="box-title"><!-- add .noborder class if box-body is removed -->
									<h4><a>Les pré-inscriptions totale</a></h4>
									<small class="block">{{DB::table('inscriptions')->count()}} Pré-inscriptios</small>
									
								</div>



							</div>
							<!-- /BOX -->

						</div>

						<!-- Profit Box -->
						<div class="col-md-3 col-sm-6">

							<!-- BOX -->
							<div class="box warning"><!-- default, danger, warning, info, success -->

								<div class="box-title"><!-- add .noborder class if box-body is removed -->
									<h4>Nombre des actualités</h4>
									<small class="block">{{DB::table('actualites')->count()}} Actualités</small>
									
								</div>



							</div>
							<!-- /BOX -->

						</div>

						<!-- Orders Box -->
						<div class="col-md-3 col-sm-6">

							<!-- BOX -->
							<div class="box default"><!-- default, danger, warning, info, success -->

								<div class="box-title"><!-- add .noborder class if box-body is removed -->
									<h4>Nombre des formateurs</h4>
									<small class="block">{{DB::table('formateurs')->count()}} Formateurs</small>
									
								</div>



							</div>
							<!-- /BOX -->

						</div>

						<!-- Online Box -->
						<div class="col-md-3 col-sm-6">

							<!-- BOX -->
							<div class="box success"><!-- default, danger, warning, info, success -->

								<div class="box-title"><!-- add .noborder class if box-body is removed -->
									<h4>Nombre des formations</h4>
									<small class="block">{{DB::table('formations')->count()}} Formations</small>
									
								</div>



							</div>
							<!-- /BOX -->

						</div>

					</div>
					<!-- /BOXES -->

					</div>



				</div>
			</section>
		@endsection
