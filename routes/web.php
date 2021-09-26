<?php

//

Route::get('/signup','DemoController@up');

Route::get('/signin','DemoController@in');

//Route::post('/saved','DemoController@saved');



Route::post('/saved','DemoController@signin');



Route::post('/s','DemoController@s');

Route::get('/h','DemoController@home');

Route::get('/signout','DemoController@signout');

//Route::get('/t',return view('test.master'));

Route::get('hash',function(){
  echo \Hash::make("admin");
});


Route::get('/t', function () {
    return view('test.master');
 });


 Route::get('/poc', function () {
    return view('test.poc');
 });


 Route::get('/tb', function () {
    return view('test.table');
 });

 Route::post('getForm','EngineController@getForm');

 Route::get('/main','EngineController@count');


 

 Route::get('/content', function () {
   return view('test.content');
});


Route::get('/dummy', function () {
   return view('profile.index');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('profile','ProfileController');


////////
Route::post('/ajax_upload/action', 'ProfileController@action')->name('ajaxupload.action');

//////


/////react

Route::get('/react', function () {
   return view('react.index');

});
///end react



Route::get('/p', function () {
   return view('Client.form');
//return 'op';
});





?>
