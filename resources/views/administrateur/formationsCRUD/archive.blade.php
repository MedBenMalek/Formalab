@extends('administrateur.layouts.default')
@section('title')
	Archive des formations
@endsection

@section('styles')
		@include('administrateur.layouts.stylepopup')
		{{ Html::style('adm/assets/css/layout-datatables.css') }}
@endsection

		@section('content')
			<section id="middle">


				<!-- page title -->
				<header id="page-header">
					<h1>Les Formations</h1>
					<ol class="breadcrumb">
						<li><a href="/admin">Accueil</a></li>
						<li class="active">Archive des formations</li>
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
										<th class="text-center" width="40px">#</th>
										<th class="text-center nosort">Nom</th>
										<th class="text-center nosort">Date début</th>
										<th class="text-center nosort">Date fin</th>
                                        <th class="text-center nosort">Objectif</th>
										<th class="text-center nosort">Actions</th>
									</tr>
								</thead>

								<tbody>
									@foreach($formations as $formation)
										<tr >
											<td class="text-center">{{ ++$i }}</td>
											<td>{{ $formation->title }}</td>
											<td>{{ date('j M,Y',strtotime($formation->start)) }}</td>
											<td>{{ date('j M,Y',strtotime($formation->end)) }}</td>
                                            <td>{{ substr($formation->objectif_formation,0,50) }} {{strlen(strip_tags($formation->objectif_formation)) > 50 ? '...' : '' }}</td>
											<td>
												<a href="{{ route('formations.edit', $formation->id) }}" class="btn btn-dirtygreen btn-sm"><i class="fa fa-edit white"></i>Modifier </a>
												
												{!! Form::open(['method' => 'DELETE','route' => ['formations.destroy', $formation->id] ,'style'=>'display:inline']) !!}
												{{Form::button('<i class="fa fa-times white"></i> supprimer', array('type' => 'submit', 'class' => 'btn btn-red btn-sm'))}}
												{!! Form::close() !!}
											</td>
										</tr>
										</tr>
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


