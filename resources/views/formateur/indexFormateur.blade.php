@extends('formateur.layouts.main')

@section('title')
    Tableau de bord
@endsection

@section('content')

	<section id="middle">


				<!-- page title -->
				<header id="page-header">
					<h1>Tableau de bord</h1>
					<ol class="breadcrumb">
						<li class="active">Acceuil</li>
					</ol>
				</header>
				<!-- /page title -->


			<div id="panel-1" class="panel panel-default" align="center">

					<div align="center" style="margin-bottom: 20px; margin-top: 20px">

						<h2>Votre planning des formations</h2>

					</div>

					<div class="panel-body" style="width: 80%; margin-top: 20px">
						<div id="content" class="padding-20">
							<div id='calendar'></div>
						</div>
					</div>
			</div>

		</section>

@endsection

@section('scripts')
		<script>
		    var formation = "{{ url('/') }}";
		    $(document).ready(function() {

				$('#calendar').fullCalendar({
          lang: 'fr',
					header: {
						left: 'prev,next today',
						center: 'title',
						right: 'month,basicWeek,basicDay'
					},
					navLinks: true, // can click day/week names to navigate views
					editable: true,
					eventLimit: true, // allow "more" link when too many events
					editable: false,
					events: formation + '/formateur/calendar' //events
				});

			});

		</script>
	@endsection
