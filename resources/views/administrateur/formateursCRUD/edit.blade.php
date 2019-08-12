@extends('administrateur.layouts.default')
@section('title')
	Profile de {{$formateur->name}}
@endsection

		@section('content')

    <section id="middle">


        <!-- page title -->
        <header id="page-header">
          <h1>Porfile de {{$formateur->name}}</h1>
          <ol class="breadcrumb">
            <li><a href="/admin">Accueil</a></li>
            <li><a href="/admin/formateurs">Les Formateurs</a></li>
            <li class="active">Modifier profile {{$formateur->name}}</li>
          </ol>
        </header>
        <!-- /page title -->


        <div id="content" class="padding-20">

          <div class="page-profile">

            <div class="row">

              <!-- part1 1 -->
              <div class="col-md-4 col-lg-3">
                <section class="panel">
                  <div class="panel-body noradius padding-10">


                    <figure class="margin-bottom-10" align="center"><!-- image -->
                      <img class="img-responsive" src="{{url('adm/assets/images/formateur/'.$formateur->image)}}" alt="" />
                    </figure><!-- /image -->
                    {!! Form::model($formateur, ['method' => 'POST','files'=>true,'route' => ['formateurs.imgupdate', $formateur->id], 'class' => 'form-horizontal']) !!}


                    <!-- profile complite
                    <h6 class="progress-head">Profile <span class="pull-right">60%</span></h6>
                    <div class="progress progress-xs">
                      <div class="progress-bar" role="progressbar" style="width: 60%;"></div>
                    </div>  -->
                    <div class="fancy-file-upload fancy-file-info">
                      <i class="fa fa-upload"></i>
                      <input type="file" class="form-control" name="image" onchange="jQuery(this).next('input').val(this.value);" />
                      <input type="text" class="form-control" placeholder="Séléctionner" readonly="" />
                      <span class="button">Choisir image</span> 
                    </div>

                    <div align="center" style="margin-top: 10px">
                      <button type="submit" name="Enregistrer" class="btn btn-warning"><i class="fa fa-check white"></i>Valider</button>
                    </div>

                  </div>
                  {!! Form::close() !!}
                </section>
              </div><!-- /COL 1 -->

              <!-- par2 -->
              <div class="col-md-8 col-lg-9">

                <div class="tabs white nomargin-top">
                  <div class="tab-content">

                      <div class="toggle active">
                        <label>Les informations personnelles</label>
                        <div class="toggle-content">
                          {!! Form::model($formateur, ['method' => 'POST','files'=>true,'route' => ['formateurs.update', $formateur->id], 'class' => 'form-horizontal']) !!}
                          <fieldset>
                            <div class="form-group">
                              <label class="col-md-3 control-label" for="profileFirstName">Nom :</label>
                              <div class="col-md-8">
                                <input type="text" class="form-control" name="name" id="profileFirstName" value="{{ $formateur->name }}">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-md-3 control-label" for="profileLastName">Prénom :</label>
                              <div class="col-md-8">
                                <input type="text" class="form-control" name="prenom" id="profileLastName" value="{{ $formateur->prenom }}">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-md-3 control-label" for="profileLastName">Adresse :</label>
                              <div class="col-md-8">
                                <input type="text" class="form-control" name="adresse" id="profileLastName" value="{{ $formateur->adresse }}">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-md-3 control-label" for="profileLastName">Télephone :</label>
                              <div class="col-md-8">
                                <input type="text" class="form-control" name="telephone" id="profileLastName" value="{{ $formateur->telephone }}">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-md-3 control-label" for="profileLastName">Spécialités :</label>
                              <div class="col-md-8">
                                <input type="text" class="form-control" name="skills" id="profileLastName" value="{{ $formateur->skills }}">
                              </div>
                            </div>
                            <div align="center">
                              <input type="submit" name="" value="Valider" class="btn btn-warning">
                              <input type="reset" name="" Value="Réinitialiser" class="btn btn-default">
                            </div>
                          </fieldset>
                          {!! Form::close() !!}
                        </div>   

                        <div class="toggle">
                        <label>Modifier Email</label>
                        <div class="toggle-content">
                          {!! Form::model($formateur, ['method' => 'POST','files'=>true,'route' => ['formateurs.emailupdate', $formateur->id], 'class' => 'form-horizontal']) !!}
                          <fieldset>
                            <div class="form-group">
                              <label class="col-md-3 control-label" for="profileLastName">Nouveau Email :</label>
                              <div class="col-md-8">
                                <input type="Email" class="form-control" name="email" id="profileLastName ">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-md-3 control-label" for="profileAddress">Confirmation :</label>
                              <div class="col-md-8">
                                <input type="Email" class="form-control" name="confirmemail" id="profileAddress">
                              </div>
                            </div>
                            <div align="center">
                              <input type="submit" name="" value="Valider" class="btn btn-warning">
                              <input type="reset" name="" Value="Réinitialiser" class="btn btn-default">
                            </div>
                          </fieldset>
                          {!! Form::close() !!}
                        </div>

                        <div class="toggle">
                        <label>Modifier Mot de passe</label>
                        <div class="toggle-content">
                          {!! Form::model($formateur, ['method' => 'POST','files'=>true,'route' => ['formateurs.pwdupdate', $formateur->id], 'class' => 'form-horizontal']) !!}
                          <fieldset>
                            <div class="form-group">
                              <label class="col-md-3 control-label" for="profileLastName">Nouveau mot de passe :</label>
                              <div class="col-md-8">
                                <input type="Password" class="form-control" id="profileLastName" name="pwd">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-md-3 control-label" for="profileAddress">Confirmation :</label>
                              <div class="col-md-8">
                                <input type="Password" class="form-control" id="profileAddress" name="confirmpwd">
                              </div>
                            </div>
                            <div align="center">
                              <input type="submit" name="" value="Valider" class="btn btn-warning">
                              <input type="reset" name="" Value="Réinitialiser" class="btn btn-default">
                            </div>
                          </fieldset>
                          {!! Form::close() !!}
                        </div>
                          </div>
                         </div>
                        </div>

                   </div><!-- /COL 2 -->

                  </div>

                 </div>

                </div>
                    </div>
                </div>
                </div>
      </section>

		@endsection