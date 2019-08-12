
			<hr>
			<!-- Subscribe -->
			<section class="alternate padding-xxs">
				<div class="container">

					<div class="row text-center">
						<div class="col-lg-4 col-sm-8 col-lg-offset-4 col-md-offset-2 col-sm-offset-2">

							<p class="size-12 text-muted nomargin">Remarque: nous ne vendons jamais votre adresse e-mail!</p>
							<h5 class="letter-spacing-1">ABONNEZ-VOUS À FORMALAB NEWSLETTER</h5>

							@if(Session::has('oups'))
								<div class="alert alert-mini alert-danger margin-bottom-30"><!-- SUCCESS -->
									<button type="button" class="close" data-dismiss="alert">
										<span aria-hidden="true">×</span>
										<span class="sr-only">Close</span>
									</button>
									<strong>Oups!</strong> {{ Session::get('oups')}}
								</div>
							@endif

							{!! Form::open(array('route' => 'email.newsletter','method'=>'POST')) !!}
							<div class="input-group" onload="checkEmpty()">

								<input id="newsletter_subscribe_email" type="mail" class="form-control" placeholder="Votre email..." name="email" id="mail">
								<span class="input-group-btn">
								<input id="newsletter_subscribe_btn" class="btn btn-primary" type="submit" id='soumettre' onclick="runMyFunction()" value="ABONNEZ-VOUS">
								</span>

							</div>
							{!! Form::close() !!}

						</div>

					</div>

				</div>
			</section>
			<!-- /Subscribe -->


			<!-- FOOTER -->

			<footer id="footer">
				<div class="copyright">
					<div class="container">
						&copy; Copyright  Formalab.tn - 2017 - Developed By FormaLab Dev Team
					</div>
				</div>
			</footer>
			<!-- /FOOTER -->

			<script>

				 function runMyFunction()
			    {
			        if (document.getElementsByName("mail")[0].value == "")
			        {
			            alert("Please enter value");
			        }
			        else
			        {
			            var form= document.getElementsByName("form")[0];
			            form.submit();
			        }
			    }

			</script>
