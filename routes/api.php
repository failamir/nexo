<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Users
    Route::post('users/media', 'UsersApiController@storeMedia')->name('users.storeMedia');
    Route::apiResource('users', 'UsersApiController');

    // Competition
    Route::post('competitions/media', 'CompetitionApiController@storeMedia')->name('competitions.storeMedia');
    Route::apiResource('competitions', 'CompetitionApiController');

    // Team Competition
    Route::apiResource('team-competitions', 'TeamCompetitionApiController');

    // Tim Lomba
    Route::post('tim-lombas/media', 'TimLombaApiController@storeMedia')->name('tim-lombas.storeMedia');
    Route::apiResource('tim-lombas', 'TimLombaApiController');
});
