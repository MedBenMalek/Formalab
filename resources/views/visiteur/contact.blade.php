		
	@extends('visiteur.master')

	@section('title')
		Contact
	@endsection

	@section('content')

		<section class="page-header parallax parallax-3" style="background-image:url('assets/images/imgpattern2.jpg')">
				<div class="overlay dark-5"><!-- dark overlay [1 to 9 opacity] --></div>

				<div class="container">

					<h1><span>Contact</span></h1>
					<span class="font-lato size-18 weight-300"></span>

					<!-- breadcrumbs -->
					<ol class="breadcrumb">
						<li><a href="/">Accueil</a></li>
						<li class="active">Contact</li>
					</ol><!-- /breadcrumbs -->
				</div>
			</section>
			<!-- /PAGE HEADER -->

						<!-- -->
			<section>
				<div class="container">
					
					<div class="row">

						<!-- FORM -->
						<div class="col-md-8 col-sm-8">

							<h3>Laissez-nous une ligne ou dites simplement <strong><em>Salut!</em></strong></h3>

							
							

							@include('visiteur.messages')


							<!-- Alert Mandatory -->
							<div id="alert_mandatory" class="alert alert-danger margin-bottom-30">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<strong>Oups!</strong> Vous devez remplir tous les champs obligatoires (*)!
							</div><!-- /Alert Mandatory -->


							<form action="{{ url('contact') }}" method="POST" enctype="multipart/form-data" class="validate">
							{{ csrf_field()}}
								<fieldset>
									<input type="hidden" name="action" value="contact_send" />

									<div class="row">
										<div class="form-group">
											<div class="col-md-4">
												<label for="contact:name">Nom *</label>
												<input type="text" value="" class="form-control required" name="Nom" id="contact:name">
											</div>
											<div class="col-md-4">
												<label for="contact:email">Prénom *</label>
												<input type="text" value="" class="form-control required" name="Prenom" id="contact:email">
											</div>
											<div class="col-md-4">
												<label for="contact:phone">É-mail *</label>
												<input type="email" value="" class="form-control required" name="Email" id="contact:phone">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="form-group">
											<div class="col-md-8">
												<label for="contact:subject">Sujet *</label>
												<input type="text" value="" class="form-control required" name="sujet" id="contact:subject">
											</div>
											<div class="col-md-4">
												<label for="contact_department">Objectif *</label>
												<select class="form-control pointer required" name="Objectif">
													<option value="">--- Select ---</option>
													<option value="Marketing">Renseignement</option>
													<option value="Webdesign">RDV</option>
													<option value="Architecture">Stage</option>
													<option value="Architecture">Autre</option>
												</select>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="form-group">
											<div class="col-md-12">
												<label for="contact:message">Votre Message *</label>
												<textarea maxlength="10000" rows="8" class="form-control required" name="Message" id="contact:message"></textarea>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="form-group">
											<div class="col-md-12">
												<label for="contact:attachment">Pièce jointe</label>

												<!-- custom file upload -->
												<input class="custom-file-upload" type="file" id="file" name="Piece" id="contact:attachment" data-btn-text="Select a File" />
												<small class="text-muted block">Taille maximale du fichier: 10Mb (zip/pdf/jpg/png)</small>

											</div>
										</div>
									</div>

									<div class="g-recaptcha" data-sitekey="6Le7qhkUAAAAAIUD-Wc62gqB6XnHigGKpRm65Zxh"></div>

								</fieldset>

								<div class="row">
									<div class="col-md-12">
										<button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> ENVOYER MESSAGE</button>
									</div>
								</div>
							</form>

						</div>
						<!-- /FORM -->


						<!-- INFO -->
						<div class="col-md-4 col-sm-4">

							<h2>Visitez-nous</h2>

							<!-- 
							Available heights
								height-100
								height-150
								height-200
								height-250
								height-300
								height-350
								height-400
								height-450
								height-500
								height-550
								height-600
							-->
							<div id="map2" class="height-400 grayscale">
								
								        <iframe class="thumbnail pull-left"  id="map-frame" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d798.590884435622!2d10.093204978728386!3d36.80980764075111!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12fd326e6b822533%3A0x7f13600815004ea1!2sFormaLab!5e0!3m2!1sfr!2s!4v1473598741352" width="100%" height="450px" frameborder="0" style="border:2; float :right;" allowfullscreen></iframe>

							</div>
							<br>

							<hr />

							<p>
								<span class="block"><strong><i class="fa fa-map-marker"></i> Address:</strong>51 Avenue Habib Bourguiba, Manouba</span>
								<span class="block"><strong><i class="fa fa-phone"></i> Phone:</strong> <a href="tel:52543482">52 543 482</a></span>
								<span class="block"><strong><i class="fa fa-envelope"></i> Email:</strong> <a href="mailto:contact@formalab.tn">contact@formalab.tn</a></span>
							</p>

							<hr />

							<h4 class="font300">Heures de travail</h4>
							<p>
								<span class="block"><strong>Du lundi au vendredi:</strong> de 10h à 18h</span>
								<span class="block"><strong>Samedi:</strong> 10h à 14h</span>
								<span class="block"><strong>Dimanche:</strong> Fermé</span>
							</p>

						</div>
						<!-- /INFO -->

					</div>

				</div>
			</section>
		@endsection

		@section('scripts')
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