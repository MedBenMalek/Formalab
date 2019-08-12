@if(Session::has('success'))
		<script type="text/javascript">
				_toastr("{{ Session::get('success')}}","top-right","success",false);
		</script>
@endif

@if(Session::has('oups'))
		<script type="text/javascript">
				_toastr("{{ Session::get('oups')}}","top-right","error",false);
		</script>
@endif

@if(Session::has('warning'))
		<script type="text/javascript">
				_toastr("{{ Session::get('warning')}}","top-right","warning",false);
		</script>
@endif

@if(count($errors) > 0)

		<script type="text/javascript">
				_toastr("l'un des champs est incorrect!","top-right","error",false);
		</script>
@endif
