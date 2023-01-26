<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Route::get('userVerification/{token}', 'UserVerificationController@approve')->name('userVerification');
Auth::routes();

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::post('users/media', 'UsersController@storeMedia')->name('users.storeMedia');
    Route::post('users/ckmedia', 'UsersController@storeCKEditorImages')->name('users.storeCKEditorImages');
    Route::resource('users', 'UsersController');

    // Competition
    Route::delete('competitions/destroy', 'CompetitionController@massDestroy')->name('competitions.massDestroy');
    Route::post('competitions/media', 'CompetitionController@storeMedia')->name('competitions.storeMedia');
    Route::post('competitions/ckmedia', 'CompetitionController@storeCKEditorImages')->name('competitions.storeCKEditorImages');
    Route::resource('competitions', 'CompetitionController');

    // Pembayaran
    Route::delete('pembayarans/destroy', 'PembayaranController@massDestroy')->name('pembayarans.massDestroy');
    Route::post('pembayarans/media', 'PembayaranController@storeMedia')->name('pembayarans.storeMedia');
    Route::post('pembayarans/ckmedia', 'PembayaranController@storeCKEditorImages')->name('pembayarans.storeCKEditorImages');
    Route::resource('pembayarans', 'PembayaranController');

    // Team Competition
    Route::delete('team-competitions/destroy', 'TeamCompetitionController@massDestroy')->name('team-competitions.massDestroy');
    Route::resource('team-competitions', 'TeamCompetitionController');

    // Tim Lomba
    Route::delete('tim-lombas/destroy', 'TimLombaController@massDestroy')->name('tim-lombas.massDestroy');
    Route::post('tim-lombas/media', 'TimLombaController@storeMedia')->name('tim-lombas.storeMedia');
    Route::post('tim-lombas/ckmedia', 'TimLombaController@storeCKEditorImages')->name('tim-lombas.storeCKEditorImages');
    Route::resource('tim-lombas', 'TimLombaController');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
