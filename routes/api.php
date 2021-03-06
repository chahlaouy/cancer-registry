<?php

// use Illuminate\Http\Request;

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::apiResources([
    
//     'patient' => 'Api\PatientController',
//     'user'    => 'Api\UserController'
// ]);

Route::group(['prefix' => 'auth', 'namespace' => 'Auth'], function(){

    Route::post('connexion', 'SinginController@index');
    Route::post('deconnexion','SingoutController@index');
    Route::get('main', 'MainController@index');
});

Route::group(['prefix' => '', 'namespace' => 'Api'], function(){
    Route::apiResources([
    
        'patient' => 'PatientController',
        'user'    => 'UserController'
    ]);
    Route::post('tumeur/{id}', 'TumeurController@store');
    Route::post('hopital/{id}', 'HopitalController@store');
    Route::post('suivie/{id}', 'SuivieController@store');
    Route::get('get-percentage/{beginDate}/{endDate}', 'SearcherController@index');
});