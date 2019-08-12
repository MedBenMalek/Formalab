
				{{-- message succès --}}
				@if(Session::has('success'))
					<div class="alert alert-mini alert-success margin-bottom-30 "><!-- SUCCESS -->
						<button type="button" class="close" data-dismiss="alert">
							<span aria-hidden="true">×</span>
							<span class="sr-only">Close</span>
						</button>
						<strong>succès :</strong> {{ Session::get('success')}}
					</div>
				@endif

				{{-- message d'erreur --}}
				@if(count($errors) > 0)
				<div class="alert alert-mini alert-danger margin-bottom-30"><!-- DANGER -->
					<strong>Oups! </strong>
					<ul>
						@foreach($errors->all() as $error)
						<li>
							{{ $error }}
						</li>
						@endforeach
					</ul>
				</div>
				@endif
