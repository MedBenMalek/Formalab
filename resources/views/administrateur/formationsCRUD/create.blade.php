@extends('administrateur.layouts.default')
@section('title')
	Ajouter Formation
@endsection
		
@section('styles')

	<!-- taggles CSS -->
	{{ Html::style('adm/assets/plugins/taggles/css/taggle.min.css') }}

@endsection

@section('content')
	

		<section id="middle">
                
                <!-- page title -->
				<header id="page-header">
					<h1>Ajouter Formation</h1>
					<ol class="breadcrumb">
						<li><a href="/admin">Accueil</a></li>
						<li><a href="{{ route('formations.index') }}">Les Formations</a></li>
						<li class="active">Ajouter Formation</li>
					</ol>
				</header>
				<!-- /page title -->
                
                
				<div id="content" class="dashboard padding-20">

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
                    
                    <!-- right options 
							<ul class="options pull-right list-inline">
								<li><a href="#" class="opt panel_colapse" data-toggle="tooltip" title="Colapse" data-placement="bottom"></a></li>
								<li><a href="#" class="opt panel_fullscreen hidden-xs" data-toggle="tooltip" title="Fullscreen" data-placement="bottom"><i class="fa fa-expand"></i></a></li>
								<li><a href="#" class="opt panel_close" data-confirm-title="Confirm" data-confirm-message="Are you sure you want to remove this panel?" data-toggle="tooltip" title="Close" data-placement="bottom"><i class="fa fa-times"></i></a></li>
							</ul>
							 -->
                    <div class="panel panel-default">
					<div class="panel-body">
					<form action="{{ route('formations.store') }}" method="POST" enctype="multipart/form-data" class="validate">							
					{{ csrf_field() }}


						<div class="col-md-9 col-sm-9">

								
								<table class="table table-striped table-bordered table-hover">
								<tr>
									<td colspan="2">
										Nom :
									</td>
									<td colspan="2">
										Formateur :
									</td>
								</tr>
								<tr>
									<td colspan="2">
									<input type="text" name="title" placeholder="Nom de formation" class="summernote form-control required">
									</td>
									<td colspan="2">
										<select name="id_formateur" id="" class="form-control required">
											<option value="0" selected="true" disabled="true">Sélectionner</option>
							                @foreach($formateurs as $formateur)
							                <option value="{{ $formateur->id }}">{{ $formateur->name }} </option>
							                @endforeach
							            </select>
									</td>
								</tr>
								<tr>
									<td>
									Date Début :
									</td>
									<td>
									Date Fin :
									</td>
									<td>
									Durée :
									</td>
									<td>
									Pré-requis :
									</td>
								</tr>
								<tr>
									<td width="25%">
									<div class="input-group date form_datetime " data-date-format="Y-m-d H:i:s">
					                    <input class="form-control required" type="text" name="start" value="" readonly>
										<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
					                </div>
									</td>
									<td width="25%">
									<div class="input-group date form_datetime " data-date-format="Y-m-d H:i:s">
					                    <input class="form-control required" type="text" value="" name="end" readonly>
										<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
					                </div>
									</td>
									<td width="25%">
										<input type="text" name="duree_formation" placeholder="durée de formation" class="summernote form-control required">
									</td>
									<td>
										<input type="text" name="prerequis_formation" placeholder="Pré-requis" class="summernote form-control required">
									</td>
								</tr>
								<tr>
									<td width="30%">
									Image : 
									</td>
									<td>
									Prix : 
									</td>
									<td>
									Catégorie :
									</td>
									<td>
									couleur :
									</td>
								</tr>
								<tr>
									<td>
				                    <div class="fancy-file-upload fancy">
				                        <i class="fa fa-upload"></i>
				                        <input type="file" class="form-control" name="image_formation" onchange="jQuery(this).next('input').val(this.value);" multiple />
				                        <input type="text" class="form-control required" placeholder="Aucune image sélectionnée" readonly="" />
				                        <span class="button">Choisir image</span>
				                    </div>
									<small class="text-muted block">Taille max: 3Mb (jpg/png)</small>
									</td>
									<td>
										<input type="text" name="prix_formation" placeholder="Prix de formation" class="summernote form-control required">
									</td>
									<td>
										<select name="id_categorie" id="" class="form-control required">
											<option value="0" selected="true" disabled="true">Sélectionner</option>
							                @foreach($categories as $categorie)
							                <option value="{{ $categorie->id_categorie }}">{{ $categorie->titre_categorie }} </option>
							                @endforeach
							           	</select>
									</td>
									<td >
										<div class="relative">
											<input type="text" class="form-control colorpicker required" data-format="hex" name="color" data-defaultColor="#FF4000">
										</div>
									</td>
								</tr>
								<tr>
									<td colspan="4">
									Objectifs :
									</td>
								</tr>
								<tr>
									<td colspan="4">
									<div class="fancy-form">
										<textarea name="objectif_formation" placeholder="Votre objectif..." class="form-control word-count required" data-maxlength="500" data-info="textarea-words-info" rows="6" ></textarea>
										<i class="fa fa-comments"><!-- icon --></i>
										<span class="fancy-hint size-11 text-muted">
											<strong>PS:</strong> 500 caractéres max!
										</span>
									</div>
									</td>
								</tr>
								<tr>
									<td colspan="4">
									Programme :
									</td>
								</tr>
								<tr>
									<td colspan="4">
										<textarea name="programme_formation" placeholder="Description" class="richtext required" data-height="200" data-lang="en-US" rows="8"></textarea>

									</td>
								</tr>
							</table>
							<div align="center">
									<input type="submit" name="Enregistrer" value="Valider" class="btn btn-primary btn-3d">
							</div>

						</div>
						<div class="col-md-3 col-sm-3">
						<table class="table table-striped table-bordered table-hover" id="dates">
							<tr>
								<td colspan="2">
									tags :
								</td>
							</tr>
							<tr>
								<td colspan="2">
									<div align="center"><p style="color: red">Les meta tags sont à placer dans l'entête de votre page HTML!</p></div>
									<div  align="center" id='tags'></div>
								</td>
							</tr>
						</table>
						</div>

					</form>
					</div>
					</div>
                    
                </div>
			</section>
			


@endsection

@section('scripts')

<script type="text/javascript">
	$('#dateform').addClass('input-group date form_datetime');
</script>

<script type="text/javascript" src="/adm/assets/plugins/bootstrap.datepicker/js/bootstrap-datetimepicker.js" ></script>
<script type="text/javascript" src="/adm/assets/plugins/bootstrap.datepicker/js/locales/bootstrap-datetimepicker.fr.js"></script>
<script type="text/javascript" src="/adm/assets/plugins//taggles/js/taggle.min.js"></script>

<script type="text/javascript" > 
	new Taggle('tags', {
    tags: ['FormaLab', 'formation', 'developpement']
});
</script>

<script type="text/javascript" > 
	 $(".form_datetime").datetimepicker({
     	language:  'fr',
        format: "yyyy-m-d hh:ii:s",
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		forceParse: 0,
        showMeridian: 1,
        startDate: new Date() 
    });
</script>


<script type="text/javascript">

    

	$(document).ready(function(){  
		var k = 1;
		var numInputs = document.getElementById("numbers");
		var input = '<tr><td width="50%">Date Debut</td><td>Date Fin</td></tr><tr><td width="50%"><div class="input-group date form_datetime " data-date-format="Y-m-d H:i:s"><input class="form-control required" type="text" name="start" value="" readonly><span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span></div></td><td><div class="input-group date form_datetime " data-date-format="Y-m-d H:i:s"><input class="form-control required" type="text" value="" name="end" readonly><span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span></div></td></tr>'

			$("#adddate").click(function () {


				for (var i = 2; i <= numInputs.value; i++){
				$("#dates").append(input);
				input.rules('add', {'required': true})
				k++
			}
		});

	
	});  


</script>



@endsection