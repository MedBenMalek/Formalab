@extends('administrateur.layouts.default')
@section('title')
		Modifier categories
@endsection

@section('content')
			<section id="middle">
                
                <!-- page title -->
				<header id="page-header">
					<h1>Modifier Catégorie</h1>
					<ol class="breadcrumb">
						<li><a href="/admin">Accueil</a></li>
						<li><a href="{{ route('categories.index') }}">Les Catégories</a></li>
						<li class="active">Modifier Catégorie</li>
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

							{!! Form::model($categorie, ['method' => 'PATCH','files'=>true, 'route' => ['categories.update', $categorie->id_categorie] , 'class' => 'validate']) !!}
								<table class="table table-striped table-bordered table-hover">

								<tr>
									<td>
										Titre :
									</td>
									<td width="25%">
									Image :
									</td>
								</tr>
								<tr>
									<td>
										{!! Form::text('titre_categorie', null, array('placeholder' => 'Title','class' => 'summernote form-control required')) !!}
									</td>
									<td rowspan="4">
									<div align="Center" style="margin-bottom: 10px; margin-top: 25%"><img src="{{url('adm/assets/images/categorie/'.$categorie->image_categorie)}}" height="150px"></div>
									<div class="fancy-file-upload fancy">
				                        <i class="fa fa-upload"></i>
				                        <input type="file" class="form-control" name="image_categorie" onchange="jQuery(this).next('input').val(this.value);" multiple />
				                        <input type="text" class="form-control" placeholder="Sélectionnée" readonly="" />
				                        <span class="button">Choisir image</span>
				                    </div>
									<small class="text-muted block">Taille max: 3Mb (jpg/png)</small>

									</td>
								</tr>
								<tr>
									<td >
									Description :
									</td>
								</tr>
								<tr>
									<td>
									<div class="fancy-form">
										 {!! Form::textarea('description_categorie', null, array('placeholder' => 'Description','class' => 'form-control word-count required')) !!}

										<i class="fa fa-comments"><!-- icon --></i>

										<span class="fancy-hint size-11 text-muted">
											<strong>PS:</strong> 500 caractéres max!
										</span>

									</div>
									</td>
								</tr>
								<tr>
									<td align="Center">
									<button type="submit" class="btn btn-primary btn-3d">Valider</button>
									</td>
								</tr>
							
							{!! Form::close() !!}
							</table>
						</div>
					</div>              
                </div>
			</section>
@endsection