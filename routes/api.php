<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Crm Customer
    Route::post('crm-customers/media', 'CrmCustomerApiController@storeMedia')->name('crm-customers.storeMedia');
    Route::apiResource('crm-customers', 'CrmCustomerApiController');

    // Crm Document
    Route::post('crm-documents/media', 'CrmDocumentApiController@storeMedia')->name('crm-documents.storeMedia');
    Route::apiResource('crm-documents', 'CrmDocumentApiController');

    Route::get('customers','CustomersApiController@customers')->name('customers');
});
