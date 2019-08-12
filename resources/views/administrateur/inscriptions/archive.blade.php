@extends('administrateur.layouts.default')
@section('title')
	Pre-inscription
@endsection

	@section('styles')

		@include('administrateur.layouts.stylepopup')
		{{ Html::style('adm/assets/css/layout-datatables.css') }}

	@endsection

		@section('content')

			<section id="middle">


				<!-- page title -->
				<header id="page-header">
					<h1>Les Pré-inscriptions</h1>
					<ol class="breadcrumb">
						<li><a href="/admin">Accueil</a></li>
						<li class="active">Les Pré-inscriptions</li>
					</ol>
				</header>
				<!-- /page title -->


				<div id="content" class="padding-20">

					
					<div id="panel-1" class="panel panel-default">


						<!-- panel content -->
						<div class="panel-body">

							<table class="table table-striped table-bordered table-hover table-vertical-middle text-center"  id="datatable_sample" >
								<thead >
									<tr>
										<th class="text-center" width="40px">#</th>
										<th class="text-center nosort">Nom Formation</th>
										<th class="text-center nosort" >Actions</th>
									</tr>
								</thead>

								<tbody>
									<!-- Actualité -->
									@foreach($formations as $formation)
										<tr class="text-center">
											<td>{{ ++$i}}</td>
											<td>{{ $formation->title }}</td>
											<td>
											<a href="{{ route('inscriptions.archive.list', $formation->id) }}" class="btn btn-dirtygreen btn-sm"><i class="fa fa-eye-slash white"></i>Pré-inscriptions </a>
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
