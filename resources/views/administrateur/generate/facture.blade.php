<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">

		@font-face {
		    font-family: GOTHIC;
		    src: url('/Users/aymen/facture/GOTHIC.TTF');
		}

		body {
			font-family: GOTHIC;
		}

		.header{
			background-color: #1b1b1b;
			height: 100px;
			border-bottom: #d65e43 7px solid; 
			font-family: GOTHIC;
		}
		.header img {
			display: inline;
			position: relative;
			height: 90px;
			margin-left: 30px;
			margin-top: 5px; 
			margin-right: 30px;
		}

		.img {
			display: inline;
			position: absolute;
			border-right: #d65e43 7px solid;
			height: 80px;
			margin-top: 10px;
		}

		.header ul {
			display: inline;
			position: absolute;
		}

		.header li {
			display: block;
			padding-bottom: 6px;
			color: white;
		}

		.container {
			margin: 0 auto;
			width: 1280px;
		}

		.container h1{
			font-family: GOTHIC;
			font-size: 60px;
		}

		.container h2{
			font-family: GOTHIC;
			font-size: 24px;
			color: #2c2c2c;
		}

		.info td {
			padding-right: 363px;	
		}

		.client {
			width: 1280;

		}

		.client img {
			width: 100px
		}

		.client {
			margin-bottom: 50px;
		}

		.produit{
			margin: auto;
			width: 1400px;
			border: 1px solid;
			height: 300px;
		}

		.produit , .produit td, .produit th {
			border: 1px solid #ddd;
		}

		.produit tr:first-child {
			border: 1px solid;
			background-color: #d65e43;
			height: 40px;
		}

		.footer {

			float: right;
			margin-top: 50px;
			margin-right: 50px;
		}

		.footer table tr:first-child td:first-child  {

			background-color: #d65e43;
			height: 40px;
		}

	</style>
</head>
<body>
<div class="header">
	<img src="/Users/aymen/facture/logo.png"><div class="img"></div>
	<ul>
		<li>www.formalab.tn</li>
		<li>contact@formalab.tn</li>
		<li>70524261</li>
	</ul>
</div>

<div class="container">
	<h1>Facture</h1>

	<table class="info">
		<tr>
			<td colspan="2"><h2>Date : 15, Octobre, 2017</h2></td>
			<td colspan="2"><h2>Facture N: 000001</td></h2>
		</tr>
	</table>

	<table class="client">
		<tr>
			<td align="center" style="background-color: #d65e43;color: white" colspan="2">FROM</td>
			<td align="center" style="display: block;margin-left: 200px;background-color: #d65e43;color: white; width: 300px">TO</td>
		</tr>
		<tr>
			<td><img src="/Users/aymen/facture/logo.png"></td>
			<td>
				<ul>
					<li> 51 Avenue Habib Bourguiba, Manouba</li>
					<li>Bourgiba 2010 manouba</li>
					<li>Tunisie Manouba</li>
					<li>M.F: 1475422</li>
				</ul>
			</td>
			<td style="padding-left: 200px;">
					<li>Nom: {{ $inscription->nom }}</li>
					<li>Prenom: {{ $inscription->prenom }}</li>
					<li>N'CIN: 13000704</li>
				</ul>
			</td>
			<td></td>
		</tr>
	</table>
</div>

<table class="produit" align="center">
	<tr align="center">
		<td>Quantit&eacute;</td>
		<td>Description</td>
		<td>Prix unitaire HT</td>
		<td>TVA</td>
		<td>Prix TVA</td>
		<td>Droit de timbre</td>
		<td>Prix TCC</td>
	</tr>
	<tr align="center">
		<td>1</td>
		<td>Formation : {{$formation->title}}</td>
		<td>{{$formation->prix_formation}} DT</td>
		<td>18 %</td>
		<td>{{$TVA}} DT</td>
		<td>0.500 DT</td>
		<td>{{$TCC}} DT</td>
	</tr>
</table>

<div class="footer">

	<table align="center" style="display: inline;width: 600px;" >
	<tr>
		<td style="padding: 0px 10px 0px 10px">MONTANT TOTALE</td>
	</tr>
	<tr>
		<td style="height: 80px">{{$MT}}</td>
	</tr>
	</table>

	<table align="center" style="display: inline;width: 600px">
	<tr>
		<td style="padding: 0px 10px 0px 10px">SIGNATURE ET CACHERT</td>
	</tr>
	<tr>
		<td style="height: 80px"></td>
	</tr>
	</table>
</div>

</body>
</html>