@extends('administrateur.layouts.default')
@section('title')
	Calendrier
@endsection

@section('styles')
	@include('administrateur.layouts.stylepopup')
	{{ Html::style('/adm/assets/plugins/fullcalendar/fullcalendar.css') }}
@endsection

	@section('content')
			<section id="middle">

				<!-- page title -->
				<header id="page-header">
					<h1>Calendrier</h1>
					<ol class="breadcrumb">
						<li><a href="/admin">Acceuil</a></li>
						<li class="active">Calendrier</li>
					</ol>
				</header>
				<!-- /page title -->

				<div id="panel-1" class="panel panel-default" align="center">

					<div class="panel-body" style="width: 70%; margin-top: 20px">

						<div id="content" class="padding-20">
							<div id='calendar'></div>
						</div>

					</div>
				</div>

			</section>
				<!-- delete popup -->
				<section id="01" class="modal">
					<div class="container animate"  >
						<div class="modal-content" align="center">
							<h1 >Modifier formation</h1>

							<form id="form" action="" method="POST" enctype="multipart/form-data" style="display: inline;">
							{{ csrf_field() }}

							<div align="left">
								<label>Nom de formation *</label>
								<input type="text" class="form-control" value="" name="title" id="title" placeholder="Aucune image sélectionnée"/>

								<label style="margin-top:10px;">couleur *</label>
								<select name="color" id="color" class="form-control">
							        <option style="color:#DF013A;" value="#DF013A">Rouge</option>
							        <option style="color:#FF4000;" value="#FF4000">Oranger</option>
							        <option style="color:#000000;" value="#000000">Noir</option>
							        <option style="color:#FFBF00;" value="#FFBF00">jaune</option>
							        <option style="color:#3ADF00;" value="#3ADF00">Vert</option>
							        <option style="color:#2E9AFE;" value="#2E9AFE" selected>Bleu</option>
							    </select>

							</div>

							    <input style="margin-top:10px; display: inline;" type="submit" name="Enregistrer" value="Modifier" class="btn btn-primary">
							</form>

							<form id="formdelete" action="" method="POST" style="display: inline;">
							{{ method_field('DELETE') }}
							{{ csrf_field() }}
								<button style="margin-top:10px;" type="submit" class="btn btn-red"><i class="fa fa-times white"></i>Supprimer</button>

							</form>

							<a  style="margin-top:10px" class="btn btn-dirtygreen" onclick="document.getElementById('01').style.display='none'" title="Close Modal"><i class="fa fa-times white"></i>Annuler </a>

						</div>

					</div>
				</section>
				<!-- delete popup/ -->
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
						right: 'month,agendaWeek,agendaDay'
					},
					height: 720,
					navLinks: true, // can click day/week names to navigate views
					editable: true,
					eventLimit: true, // allow "more" link when too many events
					editable: false,
					allDay: true,
					events: formation + '/admin/calendar', //events

					eventClick: function(event) {

					if (event.url) {

				        onclick=document.getElementById('01').style.display='block';
				        var title=document.getElementById('title');
				        var form=document.getElementById('form');
				        var formdelete=document.getElementById('formdelete');
				        //var select=document.getElementById('color');
				        title.value=event.title;
				        var url = '{{ route("calendar.update", ":id") }}';
				        url = url.replace(':id', event.id);
				        form.action =url;
				        var urldelete = '{{ route("calendar.destroy", ":id") }}';
				        urldelete = urldelete.replace(':id', event.id);
				        formdelete.action =urldelete;
				        return false;

				       }

				    }

				});

			});

		</script>
	@endsection
