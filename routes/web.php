<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//
//
//Route::get('/register', function () {
//
//    return view('auth/register');
//});
//Route::get('/login', function () {
//
//    return view('auth/login');
//});
//Route::get('/password/reset', function () {
//
//    return view('auth/passwords/reset');
//});
//Route::get('/password/email', function () {
//
//    return view('auth/passwords/email');
//});

Auth::routes();


Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/FAQ', 'HomeController@faq')->name('faq');
Route::get('/category/{id}', 'HomeController@getCategory')->name('getCategory');
Route::get('/country/{id}', 'HomeController@getCountry')->name('getCountry');
Route::get('/menu/{id}', 'HomeController@showMenu')->name('showMenu');
Route::get('/show/{id}', 'HomeController@showBusiness')->name('showBusiness');
Route::post('/show/add-comment/{id}', 'HomeController@addComment')->name('addComment');


Route::group(['prefix'=>'mybusiness'],function(){

// favorite URLs
    Route::get('/favorite','BusinessController@showFavorite')->name('showFavorite');
    Route::put('/favorite/add/{business_id}','BusinessController@addToFavorite')->name('addToFavorite');


// ticket URLs
    Route::get('/ticket','BusinessController@ticket')->name('ticket');
    Route::post('/ticket/store-subject','BusinessController@storeTicketSubject')->name('storeTicketSubject');
    Route::get('/ticket/subject/{subject_id}','BusinessController@ticketSubject')->name('ticketSubject');
    Route::post('/ticket/store-ticket/{subject_id}','BusinessController@storeTicket')->name('storeTicket');
    Route::post('/ticket/file-upload/{subject_id}/','BusinessController@storeTicketFile')->name('storeTicketFile');
    Route::put('/ticket/change-status/{subject_id}','BusinessController@changeTicketStatus')->name('changeTicketStatus');


// business URLs
    Route::get('/','BusinessController@index')->name('index');
    Route::post('/','BusinessController@store')->name('store');
    Route::get('/create','BusinessController@create')->name('create');
    Route::get('/{business_id}','BusinessController@show')->name('show');
    Route::get('/edit/{business_id}','BusinessController@edit')->name('edit');
    Route::put('/{business_id}','BusinessController@update')->name('update');
    Route::delete('/{business_id}','BusinessController@destroy')->name('destroy');
    Route::post('/image-upload/{business_id}','BusinessController@businessImageUpload')->name('businessImageUpload');
    Route::put('/change-status/{business_id}','BusinessController@businessStatus')->name('businessStatus');
    Route::delete('/image-delete/{business_image_id}','BusinessController@businessImageDestroy')->name('businessImageDestroy');

});



Route::group(['prefix'=>'admin'],function(){

// admin dashboard URLs
    Route::get('/','AdminController@index')->name('admin');


// admin country URLs
    Route::get('/form', 'admin\FormController@index')->name('form');
    Route::post('/form', 'admin\FormController@store')->name('storeForm');
    Route::get('/form/{id}', 'admin\FormController@createFormItem')->name('createFormItem');
    Route::post('/form/store/{id}','admin\FormController@storeFormItem')->name('storeFormItem');
    //Route::put('/country/update/{id}','admin\CountryController@update')->name('updateCountry');
    //Route::delete('/country/delete/{country_id}', 'admin\CountryController@destroy')->name('countryDestroy');


// admin country URLs
    Route::get('/country', 'admin\CountryController@index')->name('country');
    Route::get('/country/edit/{id}', 'admin\CountryController@edit')->name('editCountry');
    Route::post('/country/store','admin\CountryController@store')->name('storeCountry');
    Route::put('/country/update/{id}','admin\CountryController@update')->name('updateCountry');
    Route::delete('/country/delete/{country_id}', 'admin\CountryController@destroy')->name('countryDestroy');


// admin category URLs
    Route::get('/category', 'admin\CategoryController@index')->name('category');
    Route::get('/category/edit/{id}', 'admin\CategoryController@edit')->name('editCategory');
    Route::post('/category/store','admin\CategoryController@store')->name('storeCategory');
    Route::put('/category/update/{id}','admin\CategoryController@update')->name('updateCategory');
    Route::delete('/category/delete/{category_id}', 'admin\CategoryController@destroy')->name('categoryDestroy');


// admin FAQ URLs
    Route::get('/FAQ', 'admin\FaqController@index')->name('FAQ');
    Route::get('/FAQ/edit/{id}', 'admin\FaqController@edit')->name('editFAQ');
    Route::post('/FAQ/store','admin\FaqController@store')->name('storeFAQ');
    Route::put('/FAQ/update/{id}','admin\FaqController@update')->name('updateFAQ');
    Route::delete('/FAQ/delete/{id}','admin\FaqController@destroy')->name('destroyFAQ');


// admin menu URLs
    Route::get('/menu', 'admin\MenuController@index')->name('menu');
    Route::post('/menu', 'admin\MenuController@store')->name('storeMenu');
    Route::get('/menu/show/{id}', 'admin\MenuController@show')->name('showMenu');
    Route::get('/menu/edit/{id}', 'admin\MenuController@edit')->name('editMenu');
    Route::put('/menu/update/{id}', 'admin\MenuController@update')->name('updateMenu');
    Route::put('/menu/change-status/{id}', 'admin\MenuController@changeStatus')->name('changeStatus');
    Route::delete('/menu/delete/{id}', 'admin\MenuController@destroy')->name('destroyMenu');


// admin comment URLs
    Route::get('/comment','admin\CommentController@index')->name('comment');
    Route::put('/comment/change-status/{comment_id}','admin\CommentController@commentStatus')->name('commentStatus');
    Route::delete('/comment/delete/{comment_id}','admin\CommentController@destroy')->name('commentDestroy');


// admin slideshow URLs
    Route::get('/slideshow','admin\SlideshowController@index')->name('slideshow');
    Route::post('/slideshow/store','admin\SlideshowController@store')->name('storeSlide');
    Route::delete('/slideshow/delete/{id}','admin\SlideshowController@destroy')->name('destroySlide');


// admin social-network URLs
    Route::get('/social-network','admin\SocialNetworkController@index')->name('socialNetwork');
    Route::get('/social-network/edit/{id}', 'admin\SocialNetworkController@edit')->name('editSocialNetwork');
    Route::post('/social-network/store','admin\SocialNetworkController@store')->name('storeSocialNetwork');
    Route::put('/social-network/update/{id}','admin\SocialNetworkController@update')->name('updateSocialNetwork');
    Route::delete('/social-network/delete/{id}','admin\SocialNetworkController@destroy')->name('deleteSocialNetwork');


// admin ticket URLs
    Route::get('/ticket','admin\TicketController@index')->name('tickets');
    Route::get('/ticket/subject/{subject_id}','admin\TicketController@ticketSubject')->name('adminTicketSubject');
    Route::post('/ticket/store/{subject_id}','admin\TicketController@store')->name('adminStoreTicket');
    Route::put('/ticket/change-status/{subject_id}','admin\TicketController@changeTicketStatus')->name('changeTicketStatus');

});
