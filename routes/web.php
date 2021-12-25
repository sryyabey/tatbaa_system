<?php

Route::view('/', 'welcome');
Route::get('userVerification/{token}', 'UserVerificationController@approve')->name('userVerification');
Auth::routes();

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth', '2fa', 'admin']], function () {
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

    // Crm Status
    Route::delete('crm-statuses/destroy', 'CrmStatusController@massDestroy')->name('crm-statuses.massDestroy');
    Route::resource('crm-statuses', 'CrmStatusController');

    // Crm Customer
    Route::delete('crm-customers/destroy', 'CrmCustomerController@massDestroy')->name('crm-customers.massDestroy');
    Route::post('crm-customers/media', 'CrmCustomerController@storeMedia')->name('crm-customers.storeMedia');
    Route::post('crm-customers/ckmedia', 'CrmCustomerController@storeCKEditorImages')->name('crm-customers.storeCKEditorImages');
    Route::resource('crm-customers', 'CrmCustomerController');

    // Crm Note
    Route::delete('crm-notes/destroy', 'CrmNoteController@massDestroy')->name('crm-notes.massDestroy');
    Route::resource('crm-notes', 'CrmNoteController');

    // Crm Document
    Route::delete('crm-documents/destroy', 'CrmDocumentController@massDestroy')->name('crm-documents.massDestroy');
    Route::post('crm-documents/media', 'CrmDocumentController@storeMedia')->name('crm-documents.storeMedia');
    Route::post('crm-documents/ckmedia', 'CrmDocumentController@storeCKEditorImages')->name('crm-documents.storeCKEditorImages');
    Route::resource('crm-documents', 'CrmDocumentController');

    // Transactions
    Route::delete('transactions/destroy', 'TransactionsController@massDestroy')->name('transactions.massDestroy');
    Route::resource('transactions', 'TransactionsController');

    // Tracking
    Route::delete('trackings/destroy', 'TrackingController@massDestroy')->name('trackings.massDestroy');
    Route::resource('trackings', 'TrackingController');

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // Slider
    Route::delete('sliders/destroy', 'SliderController@massDestroy')->name('sliders.massDestroy');
    Route::post('sliders/media', 'SliderController@storeMedia')->name('sliders.storeMedia');
    Route::post('sliders/ckmedia', 'SliderController@storeCKEditorImages')->name('sliders.storeCKEditorImages');
    Route::resource('sliders', 'SliderController');

    // About Us
    Route::delete('aboutuses/destroy', 'AboutUsController@massDestroy')->name('aboutuses.massDestroy');
    Route::post('aboutuses/media', 'AboutUsController@storeMedia')->name('aboutuses.storeMedia');
    Route::post('aboutuses/ckmedia', 'AboutUsController@storeCKEditorImages')->name('aboutuses.storeCKEditorImages');
    Route::resource('aboutuses', 'AboutUsController');

    // Healty
    Route::delete('healties/destroy', 'HealtyController@massDestroy')->name('healties.massDestroy');
    Route::resource('healties', 'HealtyController');

    // Staff
    Route::delete('staff/destroy', 'StaffController@massDestroy')->name('staff.massDestroy');
    Route::post('staff/media', 'StaffController@storeMedia')->name('staff.storeMedia');
    Route::post('staff/ckmedia', 'StaffController@storeCKEditorImages')->name('staff.storeCKEditorImages');
    Route::resource('staff', 'StaffController');

    // Galery
    Route::delete('galeries/destroy', 'GaleryController@massDestroy')->name('galeries.massDestroy');
    Route::post('galeries/media', 'GaleryController@storeMedia')->name('galeries.storeMedia');
    Route::post('galeries/ckmedia', 'GaleryController@storeCKEditorImages')->name('galeries.storeCKEditorImages');
    Route::resource('galeries', 'GaleryController');

    // Faq
    Route::delete('faqs/destroy', 'FaqController@massDestroy')->name('faqs.massDestroy');
    Route::post('faqs/media', 'FaqController@storeMedia')->name('faqs.storeMedia');
    Route::post('faqs/ckmedia', 'FaqController@storeCKEditorImages')->name('faqs.storeCKEditorImages');
    Route::resource('faqs', 'FaqController');

    // Contact
    Route::delete('contacts/destroy', 'ContactController@massDestroy')->name('contacts.massDestroy');
    Route::resource('contacts', 'ContactController');

    // Comments
    Route::delete('comments/destroy', 'CommentsController@massDestroy')->name('comments.massDestroy');
    Route::post('comments/media', 'CommentsController@storeMedia')->name('comments.storeMedia');
    Route::post('comments/ckmedia', 'CommentsController@storeCKEditorImages')->name('comments.storeCKEditorImages');
    Route::resource('comments', 'CommentsController');

    Route::get('global-search', 'GlobalSearchController@search')->name('globalSearch');
    Route::get('messenger', 'MessengerController@index')->name('messenger.index');
    Route::get('messenger/create', 'MessengerController@createTopic')->name('messenger.createTopic');
    Route::post('messenger', 'MessengerController@storeTopic')->name('messenger.storeTopic');
    Route::get('messenger/inbox', 'MessengerController@showInbox')->name('messenger.showInbox');
    Route::get('messenger/outbox', 'MessengerController@showOutbox')->name('messenger.showOutbox');
    Route::get('messenger/{topic}', 'MessengerController@showMessages')->name('messenger.showMessages');
    Route::delete('messenger/{topic}', 'MessengerController@destroyTopic')->name('messenger.destroyTopic');
    Route::post('messenger/{topic}/reply', 'MessengerController@replyToTopic')->name('messenger.reply');
    Route::get('messenger/{topic}/reply', 'MessengerController@showReply')->name('messenger.showReply');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth', '2fa']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
        Route::post('profile/two-factor', 'ChangePasswordController@toggleTwoFactor')->name('password.toggleTwoFactor');
    }
});
Route::group(['as' => 'frontend.', 'namespace' => 'Frontend', 'middleware' => ['auth', '2fa']], function () {
    Route::get('/home', 'HomeController@index')->name('home');

    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Crm Status
    Route::delete('crm-statuses/destroy', 'CrmStatusController@massDestroy')->name('crm-statuses.massDestroy');
    Route::resource('crm-statuses', 'CrmStatusController');

    // Crm Customer
    Route::delete('crm-customers/destroy', 'CrmCustomerController@massDestroy')->name('crm-customers.massDestroy');
    Route::post('crm-customers/media', 'CrmCustomerController@storeMedia')->name('crm-customers.storeMedia');
    Route::post('crm-customers/ckmedia', 'CrmCustomerController@storeCKEditorImages')->name('crm-customers.storeCKEditorImages');
    Route::resource('crm-customers', 'CrmCustomerController');

    // Crm Note
    Route::delete('crm-notes/destroy', 'CrmNoteController@massDestroy')->name('crm-notes.massDestroy');
    Route::resource('crm-notes', 'CrmNoteController');

    // Crm Document
    Route::delete('crm-documents/destroy', 'CrmDocumentController@massDestroy')->name('crm-documents.massDestroy');
    Route::post('crm-documents/media', 'CrmDocumentController@storeMedia')->name('crm-documents.storeMedia');
    Route::post('crm-documents/ckmedia', 'CrmDocumentController@storeCKEditorImages')->name('crm-documents.storeCKEditorImages');
    Route::resource('crm-documents', 'CrmDocumentController');

    // Transactions
    Route::delete('transactions/destroy', 'TransactionsController@massDestroy')->name('transactions.massDestroy');
    Route::resource('transactions', 'TransactionsController');

    // Tracking
    Route::delete('trackings/destroy', 'TrackingController@massDestroy')->name('trackings.massDestroy');
    Route::resource('trackings', 'TrackingController');

    // Slider
    Route::delete('sliders/destroy', 'SliderController@massDestroy')->name('sliders.massDestroy');
    Route::post('sliders/media', 'SliderController@storeMedia')->name('sliders.storeMedia');
    Route::post('sliders/ckmedia', 'SliderController@storeCKEditorImages')->name('sliders.storeCKEditorImages');
    Route::resource('sliders', 'SliderController');

    // About Us
    Route::delete('aboutuses/destroy', 'AboutUsController@massDestroy')->name('aboutuses.massDestroy');
    Route::post('aboutuses/media', 'AboutUsController@storeMedia')->name('aboutuses.storeMedia');
    Route::post('aboutuses/ckmedia', 'AboutUsController@storeCKEditorImages')->name('aboutuses.storeCKEditorImages');
    Route::resource('aboutuses', 'AboutUsController');

    // Healty
    Route::delete('healties/destroy', 'HealtyController@massDestroy')->name('healties.massDestroy');
    Route::resource('healties', 'HealtyController');

    // Staff
    Route::delete('staff/destroy', 'StaffController@massDestroy')->name('staff.massDestroy');
    Route::post('staff/media', 'StaffController@storeMedia')->name('staff.storeMedia');
    Route::post('staff/ckmedia', 'StaffController@storeCKEditorImages')->name('staff.storeCKEditorImages');
    Route::resource('staff', 'StaffController');

    // Galery
    Route::delete('galeries/destroy', 'GaleryController@massDestroy')->name('galeries.massDestroy');
    Route::post('galeries/media', 'GaleryController@storeMedia')->name('galeries.storeMedia');
    Route::post('galeries/ckmedia', 'GaleryController@storeCKEditorImages')->name('galeries.storeCKEditorImages');
    Route::resource('galeries', 'GaleryController');

    // Faq
    Route::delete('faqs/destroy', 'FaqController@massDestroy')->name('faqs.massDestroy');
    Route::post('faqs/media', 'FaqController@storeMedia')->name('faqs.storeMedia');
    Route::post('faqs/ckmedia', 'FaqController@storeCKEditorImages')->name('faqs.storeCKEditorImages');
    Route::resource('faqs', 'FaqController');

    // Contact
    Route::delete('contacts/destroy', 'ContactController@massDestroy')->name('contacts.massDestroy');
    Route::resource('contacts', 'ContactController');

    // Comments
    Route::delete('comments/destroy', 'CommentsController@massDestroy')->name('comments.massDestroy');
    Route::post('comments/media', 'CommentsController@storeMedia')->name('comments.storeMedia');
    Route::post('comments/ckmedia', 'CommentsController@storeCKEditorImages')->name('comments.storeCKEditorImages');
    Route::resource('comments', 'CommentsController');

    Route::get('frontend/profile', 'ProfileController@index')->name('profile.index');
    Route::post('frontend/profile', 'ProfileController@update')->name('profile.update');
    Route::post('frontend/profile/destroy', 'ProfileController@destroy')->name('profile.destroy');
    Route::post('frontend/profile/password', 'ProfileController@password')->name('profile.password');
    Route::post('profile/toggle-two-factor', 'ProfileController@toggleTwoFactor')->name('profile.toggle-two-factor');
});
Route::group(['namespace' => 'Auth', 'middleware' => ['auth', '2fa']], function () {
    // Two Factor Authentication
    if (file_exists(app_path('Http/Controllers/Auth/TwoFactorController.php'))) {
        Route::get('two-factor', 'TwoFactorController@show')->name('twoFactor.show');
        Route::post('two-factor', 'TwoFactorController@check')->name('twoFactor.check');
        Route::get('two-factor/resend', 'TwoFactorController@resend')->name('twoFactor.resend');
    }
});
