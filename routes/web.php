<?php




Route::get('/', function () {  return view('welcome');});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', array('as' => 'home','uses' => 'ContractController@index'));


// Rutas del controlador de Contract
Route::get('/list-contract', array(	'as' => 'listContract',	'middleware' => 'auth',	'uses' => 'ContractController@index'));

Route::get('/create-contract', array('as' => 'createContract','middleware' => 'auth','uses' => 'ContractController@createContract'	));

Route::post('/save-contract', array('as' => 'saveContract',	'middleware' => 'auth',	'uses' => 'ContractController@saveContract'	));

Route::get('/{id}/edit-contract', array('as' => 'editContract',	'middleware' => 'auth',	'uses' => 'ContractController@editContract'	));

Route::post('/{id}/update-contract', array('as' => 'updateContract','middleware' => 'auth',	'uses' => 'ContractController@updateContract'));
/*Route::post('/{id}/delete', array('as' => 'destroyContract','middleware' => 'auth',	'uses' => 'ContractController@destroyContract'	));*/
Route::delete('/{id}', array('as' => 'destroyContract',	'middleware' => 'auth',	'uses' => 'ContractController@destroyContract' ));

Route::get('/list-service', array('as' => 'listService','middleware' => 'auth',	'uses' => 'ServiceController@index'	));

Route::get('/create-service', array('as' => 'createService','middleware' => 'auth',	'uses' => 'ServiceController@createService'	));

Route::post('/save-service', array(	'as' => 'saveService','middleware' => 'auth','uses' => 'ServiceController@saveService'));

Route::get('/{id}/edit-service', array(	'as' => 'editService','middleware' => 'auth','uses' => 'ServiceController@editService'));

Route::post('/{id}/update-service', array('as' => 'updateService','middleware' => 'auth','uses' => 'ServiceController@updateService'));

Route::delete('/{id}/destroy', array('as' => 'destroyService','middleware' => 'auth', 'uses' => 'ServiceController@destroyService'));

Route::get('/list-entity', array('as' => 'listEntity','middleware' => 'auth','uses' => 'EntityController@index'	));

Route::get('/create-entity', array('as' => 'createEntity','middleware' => 'auth','uses' => 'EntityController@createEntity'));

Route::post('/save-entity', array('as' => 'saveEntity',	'middleware' => 'auth',	'uses' => 'EntityController@saveEntity'	));

Route::get('/{entity}/edit-entity', array('as' => 'editEntity',	'middleware' => 'auth',	'uses' => 'EntityController@editEntity'	));

Route::post('/{id}/update-entity', array('as' => 'updateEntity','middleware' => 'auth',	'uses' => 'EntityController@updateEntity'));

Route::delete('/{id}/entity', array('as' => 'destroyEntity', 'middleware' => 'auth', 'uses' => 'EntityController@destroyEntity'));
// Rutas del controlador de Contract
Route::get('/list-contact', array(	'as' => 'listContact',	'middleware' => 'auth',	'uses' => 'ContactController@index'));

Route::get('/create-contact', array('as' => 'createContact','middleware' => 'auth','uses' => 'ContactController@createContact'	));

Route::post('/save-contact', array('as' => 'saveContact',	'middleware' => 'auth',	'uses' => 'ContactController@saveContact'	));

Route::get('/{id}/edit-contact', array('as' => 'editContact',	'middleware' => 'auth',	'uses' => 'ContactController@editContact'	));

Route::post('/{id}/update-contact', array('as' => 'updateContact','middleware' => 'auth',	'uses' => 'ContactController@updateContact'));
/*Route::post('/{id}/delete', array('as' => 'destroyContact','middleware' => 'auth',	'uses' => 'ContactController@destroyContact'	));*/
Route::delete('/{id}/contact', array('as' => 'destroyContact',	'middleware' => 'auth',	'uses' => 'ContactController@destroyContact' ));