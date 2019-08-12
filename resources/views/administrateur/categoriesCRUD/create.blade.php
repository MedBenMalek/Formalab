@extends('administrateur.layouts.default')
@section('title')
	Ajouter Catégorie
@endsection

@section('content')
			<section id="middle">
                
                <!-- page title -->
				<header id="page-header">
					<h1>Ajouter Catégorie</h1>
					<ol class="breadcrumb">
						<li><a href="/admin">Accueil</a></li>
						<li><a href="{{ route('categories.index') }}">Les Catégories</a></li>
						<li class="active">Ajouter Catégorie</li>
					</ol>
				</header>
				<!-- /page title -->
                
                
				<div id="content" class="dashboard padding-20">

                    <div class="panel panel-default">
						
						<div class="panel-body">

							{!! Form::open(array('route' => 'categories.store','method'=>'POST', 'files'=>true, 'class' => 'validate')) !!}
							<table class="table table-striped table-bordered table-hover">

								<tr>
									<td>
										Titre :
									</td>
								</tr>
								<tr>
									<td>
										{!! Form::text('titre_categorie', null, array('placeholder' => 'Title','class' => 'summernote form-control required')) !!}
									</td>
								</tr>
								<tr>
									<td>
									Image :
									</td>
								</tr>
								<tr>
									<td>
									<div class="fancy-file-upload fancy">
				                        <i class="fa fa-upload"></i>
				                        <input type="file" class="form-control" name="image_categorie" onchange="jQuery(this).next('input').val(this.value);" multiple />
				                        <input type="text" class="form-control required" placeholder="Aucune image sélectionnée" readonly="" />
				                        <span class="button">Choisir image</span>
				                    </div>
									<small class="text-muted block">Taille max: 3Mb (jpg/png)</small>

									</td>
								</tr>
								<tr>
									<td>
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