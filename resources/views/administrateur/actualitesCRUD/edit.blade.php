@extends('administrateur.layouts.default')
@section('title')
	Modifier Actualité
@endsection

		@section('content')

			<section id="middle">
			{!! Form::model($actualite, ['method' => 'PATCH','files'=>true,'route' => ['actualites.update', $actualite->id_actualite],'class' => 'validate']) !!}
                
                <!-- page title -->
				<header id="page-header">
					<h1>Modifier Actualité</h1>
					<ol class="breadcrumb">
						<li><a href="/admin">Accueil</a></li>
						<li><a href="../">Les Actualités</a></li>
						<li class="active">Modifier Actualité</li>
					</ol>
				</header>
				<!-- /page title -->
                
                
				<div id="content" class="dashboard padding-20">

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
                    
                    <!-- right options 
							<ul class="options pull-right list-inline">
								<li><a href="#" class="opt panel_colapse" data-toggle="tooltip" title="Colapse" data-placement="bottom"></a></li>
								<li><a href="#" class="opt panel_fullscreen hidden-xs" data-toggle="tooltip" title="Fullscreen" data-placement="bottom"><i class="fa fa-expand"></i></a></li>
								<li><a href="#" class="opt panel_close" data-confirm-title="Confirm" data-confirm-message="Are you sure you want to remove this panel?" data-toggle="tooltip" title="Close" data-placement="bottom"><i class="fa fa-times"></i></a></li>
							</ul>
							 -->
                    <div class="panel panel-default">
						

						<div class="panel-body">

							<table class="table table-striped table-bordered table-hover">
								<tr>
									<td>
										Titre :
									</td>
									<td>
									Image :
									</td>
								</tr>
								<tr>
									<td>
										{!! Form::text('titre_actualite', null, array('placeholder' => 'Titre','class' => 'form-control required')) !!}
									</td>
									<td rowspan="4" width="25%">
									<div align="Center" style="margin-bottom: 20px; margin-top: 13%"><img src="{{url('adm/assets/images/actualite/'.$actualite->image)}}" height="150px"></div>
									<div class="fancy-file-upload fancy">
				                        <i class="fa fa-upload"></i>
				                        <input type="file" class="form-control" name="image" onchange="jQuery(this).next('input').val(this.value);" multiple />
				                        <input type="text" class="form-control" placeholder="Sélectionnée" readonly="" />
				                        <span class="button">Choisir image</span>
				                    </div>
									<small class="text-muted block">Taille max: 2Mb (jpg/png)</small>
									</td>
								</tr>
								<tr>
									<td>
									Votre Article :
									</td>
								</tr>
								<tr>
									<td>
									{!! Form::textarea('description_actualite', null, array('placeholder' => 'Votre objectif...','class' => 'form-control required richtext')) !!}
									</td>
								</tr>
								<tr>
									<td align="Center">

									<input type="submit" name="Enregistrer" value="Valider" class="btn btn-primary btn-3d">
									</td>
									{{ Form::close() }}
								</tr>
							</table>

						</div>


					</div>
                    
                </div>
			</section>
		@endsection