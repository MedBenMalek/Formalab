<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
//visiteur
Route::get('/','controller@indexVisiteur')->name('index');

Route::get('/about','controller@about');

Route::get('/contact','controller@contact');
Route::post('/contact','controller@postcontact');

Route::get('/calendrier','controller@calendrier');

Route::get('/formateurs','controller@formateurs');
Route::get('/profile_formateur/{id}','controller@profile_formateur')->name('profile_formateur');

Route::get('/formations','controller@formations');
Route::get('/formations/{categorie}', ['as' => 'categorie', 'uses' => 'controller@categorie']);
Route::get('/formations/{categorie}/{formation}', ['as' => 'page_formation', 'uses' => 'controller@page_formation']);
Route::post('/formations/{categorie}/{formation}', ['as' => 'inscri_formation', 'uses' => 'controller@inscri_formation']);


Route::get('/blog','controller@blog');
Route::get('/blog/{blog}', ['as' => 'page_blog', 'uses' => 'controller@page_blog']);

Route::get('/Pre-inscription','controller@inscription')->name('inscription');
Route::post('/Pre-inscription/store', ['as' => 'storeInscri', 'uses' => 'Controller@storeInscri']);

Route::get('/findFormationName','controller@ajaxformation');

Route::post('/search','controller@postsearch')->name('postsearch');

Route::post('/newsletter','controller@newsletter')->name('email.newsletter');







//administrateur
Route::get('admin/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
Route::post('admin/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');

Route::group(['prefix' => 'admin' ], function() {
	Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::resource('/categories','categoriesCRUDController');
    Route::resource('/formations','formationsCRUDController');
    Route::get('/formation/archive','formationsCRUDController@archive')->name('formations.archive');

    Route::resource('/actualites','actualitesCRUDController');
    Route::get('/actualite/archive','actualitesCRUDController@archive')->name('actualites.archive');
    Route::post('/actualites/archive/{id}','actualitesCRUDController@archiver')->name('actualites.archiver');
    Route::post('/actualites/activer/{id}','actualitesCRUDController@activer')->name('actualites.activer');

    Route::resource('/galerie','photoCRUDController');

  Route::get('/profile/{profile}','AdminProfileController@profile')->name('admin.profile');
	Route::post('/profile/{profile}','AdminProfileController@edit')->name('admin.profile.edit');
	Route::post('/profile/email/{profile}','AdminProfileController@emailedit')->name('admin.profile.emailedit');
	Route::post('/profile/pwd/{profile}','AdminProfileController@pwdedit')->name('admin.profile.pwdedit');
	Route::post('/profile/img/{profile}','AdminProfileController@imgedit')->name('admin.profile.imgedit');
	Route::post('/profile/reseaux/{profile}','AdminProfileController@reseaux')->name('admin.profile.reseaux');

	Route::get('/calendrier','AdminController@calendar');
  Route::get('/calendar','CalendrierController@index')->name('calendar.index');
  Route::post('/calendar/{id}','CalendrierController@update')->name('calendar.update');
  Route::DELETE('/calendar/destroy/{id}','CalendrierController@destroy')->name('calendar.destroy');


	Route::get('/certificat/{id}','AdminController@certificat')->name('download.certificat');
  Route::get('/facture/{id}','AdminController@facture')->name('download.facture');
  Route::get('/facture1/{id}','Controller@facture');

  Route::get('/inscriptions','inscriptionsCRUDController@index');
  Route::get('/inscriptions/{id}','inscriptionsCRUDController@listInscription')->name('inscriptions.list');
  Route::get('/inscriptions/{id}/{inscription}','inscriptionsCRUDController@show')->name('inscriptions.show');
  Route::post('/inscriptions/refuser/{id}','inscriptionsCRUDController@refuser')->name('inscriptions.refuser');
  Route::post('/inscriptions/accepter/{id}','inscriptionsCRUDController@accepter')->name('inscriptions.accepter');
  Route::get('/inscription/archive','inscriptionsCRUDController@archive')->name('inscriptions.archive');
  Route::get('/inscription/archive/{id}','inscriptionsCRUDController@listInscription_archive')->name('inscriptions.archive.list');
  Route::get('/inscription/archive/{id}/{inscription}','inscriptionsCRUDController@show_archive')->name('inscriptions.archive.show');
  Route::post('importExcel/{id}', 'inscriptionsCRUDController@importExcel')->name('importExcel');
  Route::get('downloadExcel/{id}/{type}', 'inscriptionsCRUDController@downloadExcel')->name('downloadExcel');



  Route::get('/formateurs','formateursCRUDController@index')->name('formateurs.index');
  Route::get('/formateurs/create','formateursCRUDController@create')->name('formateurs.create');
  Route::get('/formateurs/{formateur}/edit/','formateursCRUDController@edit')->name('formateurs.edit');
  Route::post('/formateurs/store','formateursCRUDController@store')->name('formateurs.store');
  Route::post('/formateurs/update/{formateur}','formateursCRUDController@update')->name('formateurs.update');
  Route::post('/formateurs/emailupdate/{formateur}','formateursCRUDController@emailupdate')->name('formateurs.emailupdate');
  Route::post('/formateurs/pwdupdate/{formateur}','formateursCRUDController@pwdupdate')->name('formateurs.pwdupdate');
  Route::post('/formateurs/imgupdate/{formateur}','formateursCRUDController@imgupdate')->name('formateurs.imgupdate');
  Route::DELETE('/formateurs/{formateur}','formateursCRUDController@destroy')->name('formateurs.destroy');

  Route::get('/certificats','AdminController@indexcertificat')->name('certificats.index');
  Route::get('/certificats/download','AdminController@generateCertificats')->name('certificats.download');
  Route::get('/factures','AdminController@indexFacture')->name('factures.index');
  Route::get('/factures/download','AdminController@generateFacture')->name('factures.download');
});

Route::get('/confirm/{id}/{token}', 'Auth\ConfirmationController@confirm')->name('formateur.confirm');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');


//formateur
Route::get('formateur/login', 'Auth\formateurLoginController@showLoginForm')->name('formateur.login');
Route::post('formateur/login', 'Auth\formateurLoginController@login')->name('formateur.login.submit');
Route::group(['prefix' => 'formateur'], function() {
	Route::get('/', 'FormateurController@index')->name('formateur.dashboard');
	Route::resource('/actualite','FormateuractualitesController');
  Route::get('/actualites/archive','FormateuractualitesController@archive')->name('formateur.actualites.archive');
  Route::post('/actualites/archive/{id}','FormateuractualitesController@archiver')->name('formateur.actualites.archiver');
  Route::post('/actualites/activer/{id}','FormateuractualitesController@activer')->name('formateur.actualites.activer');

	Route::get('/calendar','FormateurController@calendrierformateur');
	Route::get('/profile/{profile}','FormateurController@profile')->name('formateurs.profile');
	Route::post('/profile/{profile}','FormateurController@edit')->name('formateurs.profile.edit');
	Route::post('/profile/info/{profile}','FormateurController@infoedit')->name('formateurs.profile.infoedit');
	Route::post('/profile/email/{profile}','FormateurController@emailedit')->name('formateurs.profile.emailedit');
	Route::post('/profile/pwd/{profile}','FormateurController@pwdedit')->name('formateurs.profile.pwdedit');
	Route::post('/profile/img/{profile}','FormateurController@imgedit')->name('formateurs.profile.imgedit');
	Route::post('/profile/reseaux/{profile}','FormateurController@reseaux')->name('formateurs.profile.reseaux');

});
