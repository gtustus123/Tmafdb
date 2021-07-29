<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::apiResource('users', 'UsersApiController');

    // Sequences
    Route::apiResource('sequences', 'SequencesApiController');

    // Identifier
    Route::apiResource('identifiers', 'IdentifierApiController', ['except' => ['store']]);

    // Pdbtms
    Route::apiResource('pdbtms', 'PdbtmsApiController');

    // New Chain Matrices
    Route::apiResource('new-chain-matrices', 'NewChainMatricesApiController');

    // Alignments
    Route::apiResource('alignments', 'AlignmentsApiController', ['except' => ['store', 'update', 'destroy']]);

    // Uniprot Acs
    Route::apiResource('uniprot-acs', 'UniprotAcsApiController', ['except' => ['store']]);

    // Regions
    Route::apiResource('regions', 'RegionsApiController', ['except' => ['store']]);

    // Pdbtm Regions
    Route::apiResource('pdbtm-regions', 'PdbtmRegionsApiController', ['except' => ['store']]);
});
