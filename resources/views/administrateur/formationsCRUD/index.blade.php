@extends('administrateur.layouts.default')
@section('title')
	Les Formations
@endsection

@section('styles')
		@include('administrateur.layouts.stylepopup')
		{{ Html::style('adm/assets/css/layout-datatables.css') }}
		<!-- share G+ -->
        <script src="https://apis.google.com/js/platform.js" async defer>
		  {lang: 'fr', parsetags: 'explicit'}
		</script>
@endsection

		@section('content')
			<section id="middle">


				<!-- page title -->
				<header id="page-header">
					<h1>Les Formations</h1>
					<ol class="breadcrumb">
						<li><a href="/admin">Accueil</a></li>
						<li class="active">Les Formations</li>
					</ol>
				</header>
				<!-- /page title -->


				<div id="content" class="padding-20">

					<!-- 
						PANEL CLASSES:
							panel-default
							panel-danger
							panel-warning
							panel-info
							panel-success
        
						INFO: 	panel collapse - stored on user localStorage (handled by app.js _panels() function).
								All pannels should have an unique ID or the panel collapse status will not be stored!
					-->
					<div id="panel-1" class="panel panel-default">

						<div align="center" style="margin-bottom: 20px">

						<a href="{{ route('formations.create') }}" class="btn btn-yellow"><i class="fa fa-plus white" ></i> Ajouter Formation  </a>

						</div>


						<!-- panel content -->
						<div class="panel-body">

							<table class="table table-striped table-bordered table-hover table-vertical-middle text-center" id="datatable_sample">
								<thead>
									<tr>
										<th class="text-center" width="40px">#</th>
										<th class="text-center nosort">Nom</th>
										<th class="text-center nosort">Date début</th>
										<th class="text-center nosort">Date fin</th>
                                        <th class="text-center nosort">Objectif</th>
										<th class="text-center nosort">Actions</th>
									</tr>
								</thead>

								<tbody>
									@foreach($formations as $formation)
										<tr >
											<td class="text-center">{{ ++$i }}</td>
											<td>{{ $formation->title }}</td>
											<td>{{ date('j M,Y',strtotime($formation->start)) }}</td>
											<td>{{ date('j M,Y',strtotime($formation->end)) }}</td>
                                            <td>{{ substr($formation->objectif_formation,0,50) }} {{strlen(strip_tags($formation->objectif_formation)) > 50 ? '...' : '' }}</td>
											<td>
												<a href="{{ route('formations.edit', $formation->id) }}" class="btn btn-dirtygreen btn-sm"><i class="fa fa-edit white"></i>Modifier </a>
												
												<a class="btn btn-red btn-sm" onclick="document.getElementById('s{{ $formation->id }}').style.display='block'" style="width:auto;"><i class="fa fa-times white" ></i> Supprimer </a>

												<a class="btn btn-yellow btn-sm" onclick="document.getElementById('{{ $formation->id }}').style.display='block'" style="width:auto;"><i class="fa fa-share-alt" ></i> Partager </a>

											</td>
										</tr>
										</tr>
										<!-- share popup -->
										<section id="s{{ $formation->id }}" class="modal">
											<div class="container animate">
												<div class="modal-content" align="center">
													<h1>Etes-vous sûr que vous voulez supprimer {{ $formation->title }} ?</h1>

												{!! Form::open(['method' => 'DELETE','route' => ['formations.destroy', $formation->id] ,'style'=>'display:inline']) !!}
													{{Form::button('<i class="fa fa-times white"></i> Supprimer', array('type' => 'submit', 'class' => 'btn btn-red'))}}
												{!! Form::close() !!}

													<a  class="btn btn-dirtygreen" onclick="document.getElementById('s{{ $formation->id }}').style.display='none'" title="Close Modal"><i class="fa fa-times white"></i>Annuler </a>
														</div>
														
													</div>
											</div>
										</section>
										<!-- share popup/ -->

										<!-- delete popup -->
										<section id="{{ $formation->id }}" class="modal">
											<div class="container animate">
												<div class="modal-content" align="center">
													<h1>Patager {{ $formation->title }}</h1>
									                <div align="center" style="margin-top: 20px; margin-bottom: -20px">

									                <div style="display: inline;" class="fb-share-button" data-href="http://127.0.0.1:8000/categorie/{{$formation->id_categorie}}/{{$formation->id}}" data-layout="button" data-size="large" data-mobile-iframe="true"><a class="btn btn-blue" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2F127.0.0.1:8000/categorie/{{$formation->id_categorie}}/{{$formation->id}}%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse"><i class="fa fa-facebook"></i>Facbook</a></div>

													<a href="https://twitter.com/intent/tweet?url=http%3A%2F%2F127.0.0.1:8000/categorie/{{$formation->id_categorie}}/{{$formation->id}}&original_referer=http%3A%2F%2F127.0.0.1%3A8000%2F{{ $formation->title }}" class="btn btn-aqua" data-url="http://127.0.0.1:8000/categorie/{{$formation->id_categorie}}/{{$formation->id}}" data-hashtags="formalab" data-show-count="false"><i class="fa fa-twitter"></i>Tweeter</a><script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>

													<div class="g-plus" data-action="share"></div><br><br>

													<a  class="btn btn-dirtygreen" onclick="document.getElementById('{{ $formation->id }}').style.display='none'" title="sortir"><i class="fa fa-times white"></i>Annuler </a>
														</div>
														
													</div>
											</div>
										</section>
										<!-- delete popup/ -->

								@endforeach  
								</tbody>
							</table>

						</div>
						<!-- /panel content -->

					</div>
					<!-- /PANEL -->

				</div>
			</section>
		@endsection
		

		@section('scripts')
		@include('administrateur.layouts.scriptpagination')
		@include('administrateur.layouts.scriptID01')
		<div id="fb-root"></div>
		<script>
		(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v2.8&appId=247904002343074";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
		</script>
		@endsection


