	@extends('visiteur.master')

	@section('title')
		Pré-inscription
	@endsection

		@section('content')

		<section class="page-header parallax parallax-3" style="background-image:url('assets/images/imgpattern2.jpg')">
				<div class="overlay dark-5"><!-- dark overlay [1 to 9 opacity] --></div>

						<div class="container">

							<h1><span>Pré-inscription en ligne </span></h1>
							<span class="font-lato size-18 weight-300"></span>

							<!-- breadcrumbs -->
							<ol class="breadcrumb">
								<li><a href="/">Accueil</a></li>
								<li class="active">Pré-inscription</li>
							</ol><!-- /breadcrumbs -->
						</div>
			</section>
			<!-- /PAGE HEADER -->

			<section>
				<div class="container" >

				@include('visiteur.messages')
                    
                    <p>Après avoir rempli ce formulaire de pré-inscription vous recevrez un email de confirmation et vous pourrez alors communiquer avec notre Centre et suivre toutes les étapes de votre inscription définitive.</p>

				<div class="panel panel-default" >
				<div class="panel-body">
                    
					{!! Form::open(['method' => 'POST', 'url' => route('storeInscri'), 'class' => 'validate', 'id' =>'form']) !!}
						<fieldset>
							<!-- required [php action request] -->
							<input type="hidden" name="action" value="contact_send" />

							<div class="row">
								<div class="form-group">
									<div class="col-md-6 col-sm-6">
										<label>Nom *</label>
										{!! Form::text('nom', null, array('placeholder' => 'Nom','class' => 'form-control required')) !!}
									</div>
									<div class="col-md-6 col-sm-6">
										<label>Prénom *</label>
										{!! Form::text('prenom', null, array('placeholder' => 'Prénom','class' => 'form-control required')) !!}
									</div>
								</div>
							</div>

							<div class="row">
								<div class="form-group">
									<div class="col-md-6 col-sm-6">
										<label>É-mail *</label>
										{!! Form::email('email', null, array('placeholder' => 'É-mail','class' => 'form-control required')) !!}
									</div>
									<div class="col-md-6 col-sm-6">
										<label>Numéro de téléphone *</label>
										{!! Form::text('telephone', null, array('placeholder' => 'Numéro de téléphone','class' => 'form-control required')) !!}
									</div>
								</div>
							</div>

							<div class="row">
								<div class="form-group">
									<div class="col-md-12 col-sm-12">
										<label>Niveau d'étude *</label>
									{!! Form::text('niveau_etude', null, array('placeholder' => 'Niveau d"étude','class' => 'form-control required')) !!}
									</div>
								</div>
							</div>

							<div class="row">
								<div class="form-group">
									<div class="col-md-6 col-sm-6">
										<label>Thème de formation *</label>
										<select id="" class="form-control categories required" name="categories">
											<option value="0" selected="true" disabled="true">Sélectionner</option>
							                @foreach($categories as $categorie)
							                <option value="{{ $categorie->id_categorie }}" > {{ $categorie->titre_categorie }} </option>
							                @endforeach
							           	</select>
									</div>
									<div class="col-md-6 col-sm-6">
										<label>Formation *</label>
										<select name="id_formation" id="formations" class="form-control formations required">							
							                 <option value="0" disabled="true" selected="true">Quelle formation?</option>
							           	</select>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="form-group">
									<div class="col-md-12 col-sm-12">
										<label>Message</label>
									 {!! Form::textarea('message', null, array('placeholder' => 'Message','class' => 'form-control')) !!}
									</div>
								</div>
							</div>

							<div class="g-recaptcha" data-sitekey="6Le7qhkUAAAAAIUD-Wc62gqB6XnHigGKpRm65Zxh"></div>

						</fieldset>


						<div class="row">
							<div class="col-md-12">
								<button type="submit" class="btn btn-3d btn-teal btn- btn-block margin-top-5">
									Envoyer
								</button>
							</div>
						</div>

					{!! Form::close() !!}
					</div>
					</div>
				</div>
			</section>

		@endsection

		@section('scripts')
		<script>
		$(document).ready(function(){

        $(document).on('change','.categories',function(){

            var cat_id=$(this).val();
            var div=$(this).parent().parent();

            var op=" ";

            $.ajax({
                type:'get',
                url:'{!!URL::to('findFormationName')!!}',
                data:{'id':cat_id},
                success:function(data){

                    op+='<option value="0" selected disabled>Quelle formation?</option>';
                    for(var i=0;i<data.length;i++){
                    op+='<option value="'+data[i].id+'">'+data[i].title+'</option>';
                   }

                   div.find('#formations').html(" ");
                   div.find('#formations').append(op);
                },
                error:function(){

                }
            });
        });
        });

		</script>
		<script>
			$(function(){
				$('#form').submit(function(event){

					var verified = grecaptcha.getResponse();
					if (verified.length === 0){
						event.preventDefault();
					}
				});
			});
		</script>
		@endsection