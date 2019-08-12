@extends('administrateur.layouts.default')
@section('title')
	Les Catégories
@endsection

	@section('styles')
		@include('administrateur.layouts.stylepopup')
		{{ Html::style('adm/assets/css/layout-datatables.css') }}
	@endsection

@section('content')
<section id="middle">


				<!-- page title -->
				<header id="page-header">
					<h1>Les Catégories</h1>
					<ol class="breadcrumb">
						<li><a href="/admin">Accueil</a></li>
						<li class="active">Les Catégories</li>
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

						<a href="{{ route('categories.create') }}" class="btn btn-yellow"><i class="fa fa-plus white" ></i> Ajouter Catégorie  </a>

						</div>

						<!-- panel content -->
						<div class="panel-body">

							<table class="table table-striped table-bordered table-hover table-vertical-middle text-center" id="datatable_sample">
								<thead>
									<tr>
										<th class="text-center" width="40px">#</th>
										<th class="text-center nosort">Titre</th>
										<th class="text-center nosort">Date de création</th>
										<th class="text-center nosort">Description</th>
                                        <th class="text-center nosort">Image</th>
										<th class="text-center nosort">Actions</th>
									</tr>
								</thead>

								<tbody>
									@foreach($categories as $categorie)
										<tr >
											<td class="text-center">{{ ++$i }}</td>
											<td>{{ $categorie->titre_categorie }}</td>
											<td>{{ date('j M,Y H\h:i ',strtotime($categorie->created_at)) }}</td>
											<td width="325px">{{ substr($categorie->description_categorie,0,79) }}...</td>
                                            <td class="text-center"><img src="{{url('adm/assets/images/categorie/'.$categorie->image_categorie)}}" height="50px"> </td>
											<td>
																							<!--<a href="#" class="btn btn-default btn-xs"><i class="fa fa-eye white"></i> Consulter </a-->
												<a href="{{ route('categories.edit', $categorie->id_categorie) }}" class="btn btn-dirtygreen btn-sm"><i class="fa fa-edit white"></i>Modifier </a>

												<a class="btn btn-red btn-sm" onclick="document.getElementById('{{ $categorie->id_categorie }}').style.display='block'" style="width:auto;"><i class="fa fa-times white" ></i> Supprimer </a>

											</td>
										</tr>
										<!-- delete popup -->
										<section id="{{ $categorie->id_categorie }}" class="modal">
											<div class="container animate"  >
												<div class="modal-content" align="center">
													<h1>Etes-vous sûr que vous voulez supprimer {{ $categorie->titre_categorie }} ?</h1>

												{!! Form::open(['method' => 'DELETE','route' => ['categories.destroy', $categorie->id_categorie] ,'style'=>'display:inline']) !!}
												{{Form::button('<i class="fa fa-times white"></i> Supprimer', array('type' => 'submit', 'class' => 'btn btn-red'))}}
												{!! Form::close() !!}

													<a  class="btn btn-dirtygreen" onclick="document.getElementById('{{ $categorie->id_categorie}}').style.display='none'" title="Close Modal"><i class="fa fa-times white"></i>Annuler </a>
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