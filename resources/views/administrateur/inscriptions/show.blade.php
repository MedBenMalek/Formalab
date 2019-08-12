@extends('administrateur.layouts.default')
@section('title')
	{{$inscriptions->nom}} {{$inscriptions->prenom}}
@endsection

		@section('content')

			<section id="middle">


				<!-- page title -->
				<header id="page-header">
					<h1>{{$inscriptions->nom}} {{$inscriptions->prenom}}</h1>
					<ol class="breadcrumb">
						<li><a href="/admin">Accueil</a></li>
                        <li><a href="../">Les pré-inscriptions</a></li>
                        <li><a href="./">{{$formations->title}}</a></li>
						<li class="active">{{$inscriptions->nom}} {{$inscriptions->prenom}}</li>
					</ol>
				</header>
				


				<div id="content" class="padding-20">

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
					<div id="panel-1" class="panel panel-default">
						
                        <div align="center" style="margin-bottom: 20px;">

                        <a href="{{ route('download.certificat',$inscriptions->id_inscription )}}" class="btn btn-yellow" style="width:auto;margin-right: 30px"><i class="fa fa-plus white" ></i> Générer certificat </a>

                        <a href="{{ route('download.facture',$inscriptions->id_inscription )}}" class="btn btn-yellow"><i class="fa fa-plus white" ></i> Générer facture </a>

                        </div>



						<!-- panel content -->
						<div class="panel-body">

							<table class="table table-striped table-bordered table-hover">
                                <tbody>

                                    <tr>
                                        <td width="250px"> Nom :</td>
                                        <td> {{$inscriptions->nom}}</td>
                                    </tr>
                                    <tr>
                                        <td width="250px"> Prénom :</td>
                                        <td>{{$inscriptions->prenom}} </td>
                                    </tr>
                                    <tr>
                                        <td width="250px"> Niveau d'étude :</td>
                                        <td>{{$inscriptions->niveau_etude}} </td>
                                    </tr>
                                    <tr>
                                        <td width="250px"> Email :</td>
                                        <td> {{$inscriptions->email}}</td>
                                    </tr>
                                    <tr>
                                        <td width="250px"> Num Tél :</td>
                                        <td> {{$inscriptions->telephone}}</td>
                                    </tr>
                                    <tr>
                                        <td width="250px"> Catégorie de formation :</td>
                                        <td> {{$categorie->titre_categorie}}</td>
                                    </tr>
                                    <tr>
                                        <td width="250px"> Nom de formation : </td>
                                        <td> {{$formations->title}} </td>
                                    </tr>
                                    <tr>
                                        <td width="250px"> Message :</td>
                                        <td>{{$inscriptions->message}} </td>
                                    </tr>
                                </tbody>

                            </table>

						</div>
						<!-- /panel content -->

					</div>
					<!-- /PANEL -->

				</div>
			</section>

		@endsection

        @section('scripts')
        @include('administrateur.layouts.scriptID01')
        @endsection