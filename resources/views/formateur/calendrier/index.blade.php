@extends('formateur.layouts.main')
@section('title')
	Calendrier
@endsection

@section('styles')
	{{ Html::style('/adm/assets/plugins/fullcalendar/fullcalendar.css') }}
@endsection

	@section('content')
			<section id="middle">

				<!-- page title -->
				<header id="page-header">
					<h1>Calendrier</h1>
					<ol class="breadcrumb">
						<li><a href="/formateur">Acceuil</a></li>
						<li class="active">Calendrier</li>
					</ol>
				</header>
				<!-- /page title -->

				<div id="panel-1" class="panel panel-default" align="center">

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
					header: {
						left: 'prev,next today',
						center: 'title',
						right: 'month,basicWeek,basicDay'
					},
					navLinks: true, // can click day/week names to navigate views
					editable: true,
					eventLimit: true, // allow "more" link when too many events
					editable: false,
					events: formation + '/admin/calendar' //events
				});

			});

		</script>
	@endsection