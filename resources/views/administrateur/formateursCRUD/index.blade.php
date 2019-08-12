@extends('administrateur.layouts.default')
@section('title')
	Les Formateurs
@endsection

@section('styles')
		@include('administrateur.layouts.stylepopup')
		{{ Html::style('adm/assets/css/layout-datatables.css') }}
@endsection

		@section('content')	


		<section id="middle">


				<!-- page title -->
				<header id="page-header">
					<h1>Les Formateurs</h1>
					<ol class="breadcrumb">
						<li><a href="/admin">Accueil</a></li>
						<li class="active">Les Formateurs</li>
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

						<a href="{{ route('formateurs.create') }}" class="btn btn-yellow"><i class="fa fa-plus white" ></i> Ajouter Formateur  </a>

						</div>

						<!-- panel content -->
						<div class="panel-body">

							<table class="table table-striped table-bordered table-hover text-center table-vertical-middle text-center" id="datatable_sample">
								<thead>
									<tr>
										<th class="text-center" width="40px">#</th>
                                        <th class="text-center nosort">Nom</th>
										<th class="text-center nosort">Prenom</th>
										<th class="text-center nosort">Email</th>
										<th class="text-center nosort">Actions</th>
									</tr>
								</thead>

								<tbody>
									@foreach($formateurs as $formateur)
										<tr >
											<td class="text-center">{{ ++$i }}</td>
											<td>{{ $formateur->name}}</td>
                                            <td>{{ $formateur->prenom}}</td>
											<td>{{ $formateur->email}}</td>
											<td>
											<a href="{{ route('formateurs.edit', $formateur->id) }}" class="btn btn-dirtygreen btn-sm"><i class="fa fa-edit white"></i>Modifier </a>

											<a class="btn btn-red btn-sm" onclick="document.getElementById('{{ $formateur->id }}').style.display='block'" style="width:auto;"><i class="fa fa-times white" ></i> Supprimer </a>

											</td>
										</tr>
										<!-- delete popup -->
										<section id="{{ $formateur->id }}" class="modal">
											<div class="container animate"  >
												<div class="modal-content" align="center">
													<h1>Etes-vous sûr que vous voulez supprimer {{ $formateur->name }} ?</h1>

												{!! Form::open(['method' => 'DELETE','route' => ['formateurs.destroy', $formateur->id] ,'style'=>'display:inline']) !!}
												{{Form::button('<i class="fa fa-times white"></i> supprimer', array('type' => 'submit', 'class' => 'btn btn-red'))}}
												{!! Form::close() !!}

													<a  class="btn btn-dirtygreen" onclick="document.getElementById('{{ $formateur->id}}').style.display='none'" title="Close Modal"><i class="fa fa-times white"></i>Annuler </a>
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
		@endsection