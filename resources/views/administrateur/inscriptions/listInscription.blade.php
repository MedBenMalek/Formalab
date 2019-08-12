@extends('administrateur.layouts.default')
@section('title')
	{{$formations->title}}
@endsection
@section('styles')

	@include('administrateur.layouts.stylepopup')
	{{ Html::style('adm/assets/css/layout-datatables.css') }}

@endsection
		@section('content')

		<section id="middle">


				<!-- page title -->
				<header id="page-header">
					<h1>{{$formations->title}}</h1>
					<ol class="breadcrumb">
						<li><a href="/admin">Accueil</a></li>
                        <li><a href="/admin/inscriptions">Les Pré-inscriptions</a></li>
						<li class="active">{{$formations->title}}</li>
					</ol>
				</header>
				<!-- /page title -->

				<!-- Add excel -->
				<section id="id01" class="modal">
					<div class="container animate"  >
							<div class="modal-content">
									<h1>choisir fichier excel</h1>
								{!! Form::open(array('route' => ['importExcel', $formations->id],'method'=>'POST','files'=>true)) !!}
								<div class="fancy-file-upload fancy-file-warning">
			                        <i class="fa fa-upload"></i>
			                        <input type="file" class="form-control" name="import_file" onchange="jQuery(this).next('input').val(this.value);" multiple />
			                        <input type="text" class="form-control" placeholder="Aucune fichier sélectionnée" readonly="" />
			                        <span class="button">Choisir fichier</span>
			                    </div>
			                    <div align="center" style="margin-top: 20px; margin-bottom: -20px">
								<button type="submit" name="Enregistrer" class="btn btn-warning"><i class="fa fa-check white"></i>Valider</button>
								 <a  class="btn btn-dirtygreen" onclick="document.getElementById('id01').style.display='none'" title="Close Modal"><i class="fa fa-times white"></i>Annuler </a>
								</div>
								{!! Form::close() !!}
							</div>
					</div>
				</section>
				<!-- Add excel/ -->


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
						<a class="btn btn-yellow" onclick="document.getElementById('id01').style.display='block'" style="width:auto;"><i class="fa fa-upload" ></i> Importer </a>
						<a class="btn btn-yellow" href="{{ route('downloadExcel', [$formations->id,'xlsx']) }}" style="width:auto;"><i class="fa fa-download" ></i> Telecharger </a>
						</div>

						<!-- panel content -->
						<div class="panel-body">

							<table class="table table-striped table-bordered table-hover table-vertical-middle text-center" id="datatable_sample">
								<thead>
									<tr>
										<th class="text-center nosort" width="40px">#</th>
										<th class="text-center nosort">Nom</th>
                                        <th class="text-center nosort">Prenom</th>
										<th class="text-center nosort">Niveau d'étude</th>
										<th class="text-center nosort">E-mail</th>
										<th class="text-center nosort">Etat</th>
										<th class="text-center nosort">Actions</th>
									</tr>
								</thead>

								<tbody>
									<!-- Actualité -->
									@foreach($inscriptions as $inscription)
										<tr >
											<td class="text-center">{{ ++$i }}</td>
											<td>{{$inscription->nom}}</td>
											<td>{{$inscription->prenom}}</td>
											<td>{{$inscription->niveau_etude}}</td>
                                            <td>{{$inscription->email}}</td>
                                            <td><span>
                                            	@if($inscription->etat =='Accepté')
                                            	<p style="color: green">{{$inscription->etat}}</p>
                                            	@elseif($inscription->etat =='Refusé')
                                            	<p style="color: red">{{$inscription->etat}}</p>
                                            	@else
                                            	<p>{{$inscription->etat}}</p>
                                            	@endif

                                            </span></td>
											<td>
												<a href="{{ route('inscriptions.show',[$formations->id, $inscription->id_inscription]) }}" class="btn btn-default btn-sm"><i class="fa fa-eye white"></i> Consulter </a>
                                              @if($inscription->etat =='Refusé')
												{!! Form::open(['method' => 'POST','route' => ['inscriptions.accepter', $inscription->id_inscription] ,'style'=>'display:inline']) !!}

													<input type="hidden" name="accepter" value="Accepté">

													{{Form::button('<i class="fa fa-check white"></i> Accepter', array('type' => 'submit', 'class' => 'btn btn-success btn-sm'))}}
												{!! Form::close() !!}
                                               @elseif ($inscription->etat =='Accepté')
												{!! Form::open(['method' => 'POST','route' => ['inscriptions.refuser', $inscription->id_inscription] ,'style'=>'display:inline']) !!}

													<input type="hidden" name="Refuser" value="Refusé">

													{{Form::button('<i class="fa fa-times white"></i> Réfuser', array('type' => 'submit', 'class' => 'btn btn-danger btn-sm'))}}
												{!! Form::close() !!}

												@else

												{!! Form::open(['method' => 'POST','route' => ['inscriptions.accepter', $inscription->id_inscription] ,'style'=>'display:inline']) !!}

													<input type="hidden" name="accepter" value="Accepté">

													{{Form::button('<i class="fa fa-check white"></i> Accepter', array('type' => 'submit', 'class' => 'btn btn-success btn-sm'))}}
												{!! Form::close() !!}
                                               
												{!! Form::open(['method' => 'POST','route' => ['inscriptions.refuser', $inscription->id_inscription] ,'style'=>'display:inline']) !!}

													<input type="hidden" name="Refuser" value="Refusé">

													{{Form::button('<i class="fa fa-times white"></i> Réfuser', array('type' => 'submit', 'class' => 'btn btn-danger btn-sm'))}}
												{!! Form::close() !!}

                                               @endif
											</td>
										</tr>
									@endforeach
								<!-- actualité -->
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
		@endsection
