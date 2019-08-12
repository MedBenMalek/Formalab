@extends('administrateur.layouts.default')
@section('title')
	Ajouter Formateur
@endsection

		@section('content')
			<section id="middle">
                
                <!-- page title -->
				<header id="page-header">
					<h1>Ajouter Formateur</h1>
					<ol class="breadcrumb">
						<li><a href="/admin">Accueil</a></li>
						<li><a href="/admin/formateurs">Les Formateurs</a></li>
						<li class="active">Ajouter Formateur</li>
					</ol>
				</header>
			
                
                
				<div id="content" class="dashboard padding-20">

					
                    <div class="panel panel-default">

						<div class="panel-body">

							
							{!! Form::open(array('route' => 'formateurs.store','method'=>'POST', 'class' => 'validate')) !!}
							<table class="table table-striped table-bordered table-hover">
								<tr>
									<td>
										Nom :
									</td>
									<td>
										Prénom :
									</td>
								</tr>
								<tr>
									<td>
										<input class="summernote form-control required" type="text" name="name">
									</td>
									<td>
										<input class="summernote form-control required" type="text" name="prenom">
									</td>
								</tr>
								<tr>
									<td>
										Email :
									</td>
									<td>
										Mot de passe :<!--fonction-->
									</td>
								</tr>
								<tr>
									<td>
										<input class="summernote form-control required" type="text" name="email">
									</td>
									<td>
										<input class="summernote form-control required" type="text" name="password" value="{{ $pwd }}" disabled>
										<input class="summernote form-control" type="hidden" name="password" value="{{ $pwd }}" >
										<input class="summernote form-control" type="hidden" name="Fmail" value="{{ $pwd }}" >
									</td>
								</tr>
							</table>
							<div align="center">
									<input type="submit" name="Enregistrer" value="Valider" class="btn btn-primary btn-3d">
								</div>



							

						</div>


					</div>
                    
                </div>
			</section>
		@endsection