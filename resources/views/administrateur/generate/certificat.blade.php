<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		@font-face {
		    font-family: titlefont;
		    src: url('/Users/aymen/certificat/title.TTF');
		}

		.body {
		     width: 297mm;
		     height: 210mm;
		     margin: 0 auto;
		     background-image:url('/Users/aymen/certificat/bg.jpg');
		     background-size: 297mm 210mm;
				 padding: -80px;
				 margin: -80px;
		}

		.formalablogo {
			position: absolute;
			width: 100px;
			margin: 10px 0px 0px 60px;
		}

		h1 {
			padding-top: 95px;
			text-align: center;
			font-size: 110px;
			color: #252323;
			font-family: titlefont;
			font-weight: 500;
		}

		.body p {
		margin-top: -63px;

		}

		p {
			font-size: 24px;
			text-align: center;
			color: #252323;
		}

		h2 {
			margin-top: -15px;
			text-align: center;
			font-size: 48px;
			color: #252323;
			padding-bottom: 80px;
			font-weight: 700;
		}

		.signature {
			position:relative;
		    float:right;
		    margin: 105px 170px 0px 0px;
		}

		.footer {
			position: absolute;
		    bottom: 0;
		    left: 36%;
		}
	</style>
</head>
<body>
	<div class="body">
		<img src="/Users/aymen/certificat/logo.png" class="formalablogo">
		<h1 class="title">Certificat de Formation</h1>
		<p>Le Directeur Général de FormaLab atteste par la présente que:</p>
		<h2>{{ $inscription->nom}} {{ $inscription->prenom}}</h2>
		<p class="p">titulaire de la C.I.N N° : _04773007_ a suivi avec succès une formation de xx heures en <br>
		{{ $formation->title}} <br>
		qui s’est déroulée au sein de notre établissement, du xx/xx/xxxx au xx/xx/xxxx.<br>
		Cette attestation est délivrée à l’intéressé(e) pour valoir ce qui est le droit.</p>
		<div class="signature">
			<p>Fait à Manouba, le xx/xx/xxxx<br>
			Le Directeur Général</p>
		</div>
	</div>
</body>
</html>
