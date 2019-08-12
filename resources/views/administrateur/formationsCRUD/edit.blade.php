@extends('administrateur.layouts.default')
@section('title')
	Modifier Formation
@endsection

@section('content')

		<section id="middle">
                
                <!-- page title -->
				<header id="page-header">
					<h1>Modifier Formation</h1>
					<ol class="breadcrumb">
                        <li><a href="index.html">Accueil</a></li>
						<li><a href="{{ route('formations.index') }}">Les Formations</a></li>
						<li class="active">Modifier Formation</li>
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

							{!! Form::model($formation, ['method' => 'PATCH', 'files'=>true ,'route' => ['formations.update', $formation->id], 'class' => 'validate']) !!}
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
										{!! Form::text('title', null, array('placeholder' => 'Nom de formation','class' => 'summernote form-control required')) !!}
									</td>
									<td colspan="2">
										<select name="id_formateur" id="" class="form-control required">
							                @foreach($formateurs as $formateur)
							                <option value="{{ $formateur->id }}" {{ $formateur->id == $formation->id_formateur ? 'selected' :'' }}>{{ $formateur->name }} </option>
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
									<div class="input-group date form_datetime ">
									{!! Form::text('start', null, array('placeholder' => 'durée de formation','class' => 'summernote form-control required','readonly')) !!}
										<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
					                </div>
									</td>
									<td width="25%">
									<div class="input-group date form_datetime ">
									{!! Form::text('end', null, array('placeholder' => 'durée de formation','class' => 'summernote form-control required','readonly')) !!}
										<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
					                </div>
									</td>



									<td >
									{!! Form::text('duree_formation', null, array('placeholder' => 'durée de formation','class' => 'summernote form-control required')) !!}
									</td>
									<td>
									{!! Form::text('prerequis_formation', null, array('placeholder' => 'Pré-requis','class' => 'summernote form-control required')) !!}
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
									<td rowspan="3">
									<div align="Center" style="margin-bottom: 20px; margin-top: 13%"><img src="{{url('adm/assets/images/formation/'.$formation->image_formation)}}" height="150px"></div>
									<div class="fancy-file-upload fancy">
									<div class="fancy-file-upload fancy">
				                        <i class="fa fa-upload"></i>
				                        <input type="file" class="form-control" name="image_formation" onchange="jQuery(this).next('input').val(this.value);" multiple />
				                        <input type="text" class="form-control" placeholder="Aucune image sélectionnée" readonly="" />
				                        <span class="button">Choisir image</span>
				                    </div>
									<small class="text-muted block">Taille max: 2Mb (jpg/png)</small>
									</td>
									<td>
									{!! Form::text('prix_formation', null, array('placeholder' => 'Prix de formation','class' => 'summernote form-control required')) !!}
									</td>
									<td>
									<select name="id_categorie" id="" class="form-control required">
							                @foreach($categories as $categorie)
							                <option value="{{ $categorie->id_categorie }}" {{ $categorie->id_categorie == $formation->id_categorie ? 'selected' :'' }}>{{ $categorie->titre_categorie }} </option>
							                @endforeach
							            </select>
									</td>
									<td >
										<div class="relative">
											<input type="text" class="form-control colorpicker required" value="{{ $formation->color }}" data-format="hex" name="color" data-defaultColor="#FF4000">
										</div>
									</td>
								</tr>
								<tr>
									<td colspan="3">
									Objectifs :
									</td>
								</tr>
								<tr>
									<td colspan="3">
									<div class="fancy-form">
										{!! Form::textarea('objectif_formation', null, array('placeholder' => 'Votre objectif...','class' => 'form-control word-count required','data-maxlength' => '500','data-info' => 'textarea-words-info')) !!}
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
									{!! Form::textarea('programme_formation', null, array('placeholder' => 'Description','class' => 'richtext required','data-height' => '200','data-lang' => 'en-US')) !!}
									</td>
								</tr>
							</table>
							<div align="center">
									<input type="submit" name="Enregistrer" value="Valider" class="btn btn-primary btn-3d">
								</div>
							
						</div>


					</div>
                    
                </div>
			</section>

@endsection

@section('scripts')

<script type="text/javascript" src="/adm/assets/plugins/bootstrap/js/bootstrap.js" ></script>
<script type="text/javascript" src="/adm/assets/plugins/bootstrap.datepicker/js/bootstrap-datetimepicker.js" ></script>
<script type="text/javascript" src="/adm/assets/plugins/bootstrap.datepicker/js/locales/bootstrap-datetimepicker.fr.js"></script>

<script type="text/javascript">
     $(".form_datetime").datetimepicker({
     	language:  'fr',
        format: "yyyy-m-d hh:ii:s",
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		forceParse: 0,
        showMeridian: 1
    });
</script>

@endsection