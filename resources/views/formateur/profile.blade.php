@extends('formateur.layouts.main')
@section('title')
	Profile
@endsection

		@section('content')

    <section id="middle">


        <!-- page title -->
        <header id="page-header">
          <h1>Votre Porfile</h1>
          <ol class="breadcrumb">
            <li><a href="/formateur">Accueil</a></li>
            <li class="active">Modifier votre profile</li>
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
                      <img class="img-responsive" src="{{url('adm/assets/images/formateur/'.Auth::user()->image)}}" alt="" />
                    </figure><!-- /image -->
                    {!! Form::model($formateur, ['method' => 'POST','files'=>true,'route' => ['formateurs.profile.imgedit', Auth::user()->id], 'class' => 'form-horizontal']) !!}


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

									<div class="toggle active">
										<label>Réseaux sociaux</label>
										<div class="toggle-content">
											{!! Form::model($formateur, ['method' => 'POST','files'=>true,'route' => ['formateurs.profile.reseaux', Auth::user()->id], 'class' => 'form-horizontal']) !!}
											<fieldset>
												<div class="form-group">
													<label class="col-md-3 control-label" for="profileFirstName"><i class="btn ico-only btn-facebook btn-sm fa fa-facebook"></i></label>
													<div class="col-md-8">
														<input type="text" class="form-control" name="facebook" id="profileFirstName" value="{{ Auth::user()->facebook }}">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" for="profileLastName"><i class="btn ico-only btn-twitter btn-sm fa fa-twitter"></i></label>
													<div class="col-md-8">
														<input type="text" class="form-control" name="twitter" id="profileLastName" value="{{ Auth::user()->twitter }}">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" for="profileLastName"><i class="btn ico-only btn-google-plus btn-sm fa fa-google-plus"></i></label>
													<div class="col-md-8">
														<input type="text" class="form-control" name="googleplus" id="profileLastName" value="{{ Auth::user()->googleplus }}">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" for="profileLastName"><i class="btn ico-only btn-linkedin btn-sm fa fa-linkedin"></i></label>
													<div class="col-md-8">
														<input type="text" class="form-control" name="linkedin" id="profileLastName" value="{{ Auth::user()->linkedin }}">
													</div>
												</div>
												<div align="center">
													<input type="submit" name="" value="Valider" class="btn btn-warning">
												</div>
											</fieldset>
											{!! Form::close() !!}
										</div>

                </section>
              </div><!-- /COL 1 -->

              <!-- par2 -->
              <div class="col-md-8 col-lg-9">

                <div class="tabs white nomargin-top">
                  <div class="tab-content">

                      <div class="toggle active">
                        <label>Les informations personnelles</label>
                        <div class="toggle-content">
                          {!! Form::model($formateur, ['method' => 'POST','files'=>true,'route' => ['formateurs.profile.edit', Auth::user()->id], 'class' => 'form-horizontal']) !!}
                          <fieldset>
                            <div class="form-group">
                              <label class="col-md-3 control-label" for="profileFirstName">Nom :</label>
                              <div class="col-md-8">
                                <input type="text" class="form-control" name="name" id="profileFirstName" value="{{ Auth::user()->name }}">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-md-3 control-label" for="profileLastName">Prénom :</label>
                              <div class="col-md-8">
                                <input type="text" class="form-control" name="prenom" id="profileLastName" value="{{ Auth::user()->prenom }}">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-md-3 control-label" for="profileLastName">Adresse :</label>
                              <div class="col-md-8">
                                <input type="text" class="form-control" name="adresse" id="profileLastName" value="{{ Auth::user()->adresse }}">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-md-3 control-label" for="profileLastName">Télephone :</label>
                              <div class="col-md-8">
                                <input type="text" class="form-control" name="telephone" id="profileLastName" value="{{ Auth::user()->telephone }}">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-md-3 control-label" for="profileLastName">Specialités :</label>
                              <div class="col-md-8">
                                <input type="text" class="form-control" name="skills" id="profileLastName" value="{{ Auth::user()->skills }}">
                              </div>
                            </div>
                            <div align="center">
                              <input type="submit" name="" value="Valider" class="btn btn-warning">
                              <input type="reset" name="" Value="Réinitialiser" class="btn btn-default">
                            </div>
                          </fieldset>
                          {!! Form::close() !!}
                        </div>

                        <div class="toggle active">
                          <label> Les informations porfetionnelles</label>
                          <div class="toggle-content">
                           {!! Form::model($formateur, ['method' => 'POST','files'=>true,'route' => ['formateurs.profile.infoedit', Auth::user()->id], 'class' => 'form-horizontal']) !!}
                            <fieldset>
                              <div class="form-group">
                                <label class="col-md-3 control-label">Présentation :</label>
                                <div class="col-md-8">
                                  <textarea class="form-control" rows="3" name="presentation">{{ Auth::user()->presentation }}</textarea>
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="col-md-3 control-label" for="profileLastName">Expérience :</label>
                                <div class="col-md-8">
                                  <textarea class="form-control" rows="3" id="profileBio" name="experience">{{ Auth::user()->experience }}</textarea>
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="col-md-3 control-label" for="profileAddress">Competance :</label>
                                <div class="col-md-8">
                                  <textarea class="form-control" rows="3" id="profileBio" name="competence">{{ Auth::user()->competence }}</textarea>
                                </div>
                              </div>
                              <div align="center">
                                <input type="submit" name="" value="Valider" class="btn btn-primary">
                                <input type="reset" name="" Value="Réinitialiser" class="btn btn-default">
                              </div>
                            </fieldset>
                            {!! Form::close() !!}
                          </div>



                        <div class="toggle">
                        <label>Modifier votre Email</label>
                        <div class="toggle-content">
                          {!! Form::model($formateur, ['method' => 'POST','files'=>true,'route' => ['formateurs.profile.emailedit', Auth::user()->id], 'class' => 'form-horizontal']) !!}
                          <fieldset>
                            <div class="form-group">
                              <label class="col-md-3 control-label" for="profileFirstName">Ancien Email :</label>
                              <div class="col-md-8">
                                <input type="Email" class="form-control" name="oldemail" id="profileFirstName" value="{{Auth::user()->email}}">
                                <input type="hidden" class="form-control" name="hiddenmail" id="profileFirstName" value="{{Auth::user()->email}}">
                              </div>
                            </div>
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
                        <label>Modifier votre Mot de passe</label>
                        <div class="toggle-content">
                          {!! Form::model($formateur, ['method' => 'POST','files'=>true,'route' => ['formateurs.profile.pwdedit', Auth::user()->id], 'class' => 'form-horizontal']) !!}
                          <fieldset>
                            <div class="form-group">
                              <label class="col-md-3 control-label" for="profileFirstName">Ancien mot de passe :
                              </label>
                              <div class="col-md-8">
                                <input type="Password" class="form-control" id="profileFirstName" name="oldpwd">
                              </div>
                            </div>
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
