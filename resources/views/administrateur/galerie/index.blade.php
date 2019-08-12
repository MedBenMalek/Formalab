 
@extends('administrateur.layouts.default')
@section('title')
	Galerie
@endsection

		@section('styles')
        	@include('administrateur.layouts.stylepopup')
        @endsection

	@section('content')	

			<!-- Add photo -->
			<section id="id01" class="modal">
				<div class="container animate"  >
						<div class="modal-content">
								<h1>Ajouter Image!</h1>
							{!! Form::open(array('route' => 'galerie.store','method'=>'POST','files'=>true)) !!}
							<div class="fancy-file-upload fancy-file-warning">
		                        <i class="fa fa-upload"></i>
		                        <input type="file" class="form-control" name="photo" onchange="jQuery(this).next('input').val(this.value);" multiple />
		                        <input type="text" class="form-control" placeholder="Aucune image sélectionnée" readonly="" />
		                        <span class="button">Choisir image</span>
		                    </div>
		                    <div align="center" style="margin-top: 20px; margin-bottom: -20px">
							<button type="submit" name="Enregistrer" class="btn btn-warning"><i class="fa fa-check white"></i>Valider</button>
							 <a  class="btn btn-dirtygreen" onclick="document.getElementById('id01').style.display='none'" title="Close Modal"><i class="fa fa-times white"></i>Annuler </a>
							</div>
							{!! Form::close() !!}
						</div>
				</div>
			</section>
			<!-- Add photo// -->


		<section id="middle">


				<!-- page title -->
				<header id="page-header">
					<h1>Galerie photo</h1>
					<ol class="breadcrumb">
						<li><a href="/admin">Accueil</a></li>
						<li class="active">Galerie</li>
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

					<a class="btn btn-yellow" onclick="document.getElementById('id01').style.display='block'" style="width:auto;"><i class="fa fa-plus white" ></i> Ajouter Image  </a>

					</div>

						<!-- panel content -->
						<div class="panel-body">

									<ul class="list-inline aside-thumbs clearfix">
										@foreach($photo as $p)
										<li align="Center">

										{!! Form::open(['method' => 'DELETE','route' => ['galerie.destroy', $p->id_photo] ,'style'=>'display:inline', 'onsubmit' => 'return ConfirmDelete()']) !!}
										{{Form::button('<i class="fa fa-times white" style="color:#9F1212"></i>', array('type' => 'submit', 'title'=> 'supprimer', 'data-toggle' => 'tooltip' , 'data-placement'=> 'top'))}}
										{!! Form::close() !!}

										<div>
											<a href="{{url('adm/assets/images/galeries/'.$p->photo)}}" data-plugin-options='{"type":"image"}' title="Fullscreen" class="lightbox">
												<img alt="" src="{{url('adm/assets/images/galeries/'.$p->photo)}}" />
											</a>
										</div>
										</li>

									

											</td>
										</tr>
										@endforeach
									</ul>
									<!-- /IMAGES -->


						</div>
						<!-- /panel content -->

					</div>
					<!-- /PANEL -->

				</div>
			</section>
		@endsection
		@section('scripts')
		@include('administrateur.layouts.scriptID01')
		@endsection