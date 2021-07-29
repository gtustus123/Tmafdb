<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);

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
    Route::resource('users', 'UsersController');

    // Databases
    Route::delete('databases/destroy', 'DatabasesController@massDestroy')->name('databases.massDestroy');
    Route::resource('databases', 'DatabasesController');

    // Sequences
    Route::delete('sequences/destroy', 'SequencesController@massDestroy')->name('sequences.massDestroy');
    Route::resource('sequences', 'SequencesController');

    // Identifier
    Route::delete('identifiers/destroy', 'IdentifierController@massDestroy')->name('identifiers.massDestroy');
    Route::resource('identifiers', 'IdentifierController', ['except' => ['create', 'store']]);

    // Region Source
    Route::delete('region-sources/destroy', 'RegionSourceController@massDestroy')->name('region-sources.massDestroy');
    Route::resource('region-sources', 'RegionSourceController');

    // Localisation Types
    Route::delete('localisation-types/destroy', 'LocalisationTypesController@massDestroy')->name('localisation-types.massDestroy');
    Route::resource('localisation-types', 'LocalisationTypesController');

    // Species
    Route::delete('species/destroy', 'SpeciesController@massDestroy')->name('species.massDestroy');
    Route::resource('species', 'SpeciesController');

    // Reference Proteomes
    Route::delete('reference-proteomes/destroy', 'ReferenceProteomesController@massDestroy')->name('reference-proteomes.massDestroy');
    Route::resource('reference-proteomes', 'ReferenceProteomesController');

    // Pdbtms
    Route::delete('pdbtms/destroy', 'PdbtmsController@massDestroy')->name('pdbtms.massDestroy');
    Route::resource('pdbtms', 'PdbtmsController');

    // New Chain Matrices
    Route::delete('new-chain-matrices/destroy', 'NewChainMatricesController@massDestroy')->name('new-chain-matrices.massDestroy');
    Route::resource('new-chain-matrices', 'NewChainMatricesController');

    // Alignments
    Route::resource('alignments', 'AlignmentsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // Uniprot Acs
    Route::delete('uniprot-acs/destroy', 'UniprotAcsController@massDestroy')->name('uniprot-acs.massDestroy');
    Route::resource('uniprot-acs', 'UniprotAcsController', ['except' => ['create', 'store']]);

    // Regions
    Route::delete('regions/destroy', 'RegionsController@massDestroy')->name('regions.massDestroy');
    Route::resource('regions', 'RegionsController', ['except' => ['create', 'store']]);

    // Pdbtm Regions
    Route::delete('pdbtm-regions/destroy', 'PdbtmRegionsController@massDestroy')->name('pdbtm-regions.massDestroy');
    Route::resource('pdbtm-regions', 'PdbtmRegionsController', ['except' => ['create', 'store']]);

    // Cctop Res
    Route::delete('cctop-res/destroy', 'CctopResController@massDestroy')->name('cctop-res.massDestroy');
    Route::resource('cctop-res', 'CctopResController', ['except' => ['create', 'store', 'edit', 'update']]);
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
