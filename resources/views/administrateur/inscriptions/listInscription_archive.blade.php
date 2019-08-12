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
												<a href="{{ route('inscriptions.archive.show',[$formations->id, $inscription->id_inscription]) }}" class="btn btn-default btn-sm"><i class="fa fa-eye white"></i> Consulter </a>

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
