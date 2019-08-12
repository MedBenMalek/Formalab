
		@extends('visiteur.master')

		@section('title')
			Calendrier
		@endsection

	@section('content')
		<section class="page-header parallax parallax-3" style="background-image:url('assets/images/imgpattern2.jpg')">
				<div class="overlay dark-5"><!-- dark overlay [1 to 9 opacity] --></div>

				<div class="container">

					<h1><span>Calendrier</span></h1>
					<span class="font-lato size-18 weight-300"></span>

					<!-- breadcrumbs -->
					<ol class="breadcrumb">
						<li><a href="/">Accueil</a></li>
						<li class="active">Calendrier</li>
					</ol><!-- /breadcrumbs -->
				</div>
			</section>
			<!-- /PAGE HEADER -->

			<!-- -->
			<section>
				<div class="container"  style="width: 60%">
					<div id='calendar'></div>
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
					height: 720,
					navLinks: true, // can click day/week names to navigate views
					editable: true,
					eventLimit: true, // allow "more" link when too many events
					editable: false,
					events: formation + '/admin/calendar', //events

				});

			});

		</script>
	@endsection
