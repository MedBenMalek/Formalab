
@extends('administrateur.layouts.default')

@section('title')
	Les Actualités
@endsection

@section('styles')

		@include('administrateur.layouts.stylepopup')
		{{ Html::style('adm/assets/css/layout-datatables.css') }}

	@endsection

		@section('content')

		<section id="middle">


				<!-- page title -->
				<header id="page-header">
					<h1>Les Actualités</h1>
					<ol class="breadcrumb">
						<li><a href="/admin">Accueil</a></li>
						<li class="active">Archive des actualités</li>
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

						<!-- panel content -->
						<div class="panel-body">

							<table class="table table-striped table-bordered table-hover table-vertical-middle text-center" id="datatable_sample">
								<thead>
									<tr>
										<th class="text-center" width="40px">#</th>
										<th class="text-center nosort">Titre</th>
										<th class="text-center nosort">Date de création</th>
										<th class="text-center nosort">Auteur</th>
                                        <th class="text-center nosort">image</th><!-- 3 tirer -->
										<th class="text-center nosort">Actions</th>
									</tr>
								</thead>

								<tbody>
									@foreach($actualites as $actualite)
										<tr >
											<td class="text-center">{{ ++$i }}</td>
											<td>{{ $actualite->titre_actualite }}</td>
											<td>{{ date('j M,Y H\h:i ',strtotime($actualite->created_at)) }}</td>
											<td width="325px">

											@if(!empty($actualite->id_admin))

											{{ $actualite->admin->name }} 

											@elseif(!empty($actualite->id_formateur))

											{{ $actualite->formateur->name }} {{ $actualite->formateur->prenom }}

											@endif


											</td>
                                            <td class="text-center"><img src="{{url('adm/assets/images/actualite/'.$actualite->image)}}" height="50px"></td>
											<td>
											<!--<a href="#" class="btn btn-default btn-xs"><i class="fa fa-eye white"></i> Consulter </a-->
										
												<a href="{{ route('actualites.edit', $actualite->id_actualite) }}" class="btn btn-dirtygreen btn-sm"><i class="fa fa-edit white"></i>Modifier </a>

												<a class="btn btn-red btn-sm" onclick="document.getElementById('{{ $actualite->id_actualite }}').style.display='block'" style="width:auto;"><i class="fa fa-times white" ></i> Supprimer </a>

												{!! Form::open(['method' => 'POST','route' => ['actualites.activer', $actualite->id_actualite] ,'style'=>'display:inline']) !!}

												{{Form::button('<i class="fa fa-check-circle white"></i> Activer', array('type' => 'submit', 'class' => 'btn btn-purple btn-sm'))}}
												{!! Form::close() !!}

											</td>
										</tr>
										<!-- delete popup -->
										<section id="{{ $actualite->id_actualite }}" class="modal">
											<div class="container animate"  >
												<div class="modal-content" align="center">
													<h1>Etes-vous sûr que vous voulez supprimer {{ $actualite->titre_actualite }} ?</h1>

												{!! Form::open(['method' => 'DELETE','route' => ['actualites.destroy', $actualite->id_actualite] ,'style'=>'display:inline', 'onsubmit' => 'return ConfirmDelete()']) !!}

												{{Form::button('<i class="fa fa-times white"></i> Supprimer', array('type' => 'submit', 'class' => 'btn btn-red'))}}
												{!! Form::close() !!}

													<a  class="btn btn-dirtygreen" onclick="document.getElementById('{{ $actualite->id_actualite }}').style.display='none'" title="Close Modal"><i class="fa fa-times white"></i>Annuler </a>
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
