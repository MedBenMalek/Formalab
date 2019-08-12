<h2> Ne ratez pas nos nouveaux formations!: </h2>

<div>
	nos 4 deriniéres formations : 
	<ul>
		@foreach($formations as $formation)
			<li>{{ $formation->title }}</li>
		@endforeach
	</ul>
</div>

<br>

<h2> Aussi les actualités les plus récentes: </h2>

<div>
	nos 4 deriniéres Actualités :
	<ul>
		@foreach($actualites as $actualite)
			<li>{{ $actualite->titre_actualite }}</li>
		@endforeach
	</ul>
</div>

