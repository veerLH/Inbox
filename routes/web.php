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

Route::get('/', 'Admin\AdminAuth@loginform');
Route::post('/','Auth\LoginController@login');

//---------------for Auth Register ------------//
Route::get('/register','Admin\AdminAuth@registerform');
Route::post('/register','Auth\RegisterController@register');
Route::get('/logout','Auth\LoginController@logout');
Route::get('/login','Admin\AdminAuth@loginform');
Route::post('/login','Auth\LoginController@login');

//===================for department -------------------//
Route::group(['prefix' =>'admin','namespace' =>'AdminAction' ,'middleware' => 'adminmiddleware'], function () {

    
        ///==========inbox show============//

        Route::get('/inbox','mainInbox@inboxshow');
        Route::get('/inboxsearch','mainInbox@inboxsearch');
        Route::post('/inboxsearch','mainInbox@inboxsearch');

        Route::get('/deptsearch','mainInbox@inboxdeptsearch');
        Route::post('/deptsearch','mainInbox@inboxdeptsearch');

        Route::get('/datesearch','mainInbox@datesearch');
        Route::post('/datesearch','mainInbox@datesearch');

        Route::get('/outbox','mainInbox@outboxshow');
        Route::get('/outboxsearch','mainInbox@outboxsearch');
        Route::post('/outboxsearch','mainInbox@outboxsearch');

        Route::get('/outdeptsearch','mainInbox@outboxdeptsearch');
        Route::post('/outdeptsearch','mainInbox@outboxdeptsearch');

        Route::get('/outboxdatesearch','mainInbox@outboxdatesearch');
        Route::post('/outboxdatesearch','mainInbox@outboxdatesearch');


        Route::get('/department','deptaction@department');
        Route::post('/department','deptaction@departmentinsert');

        Route::get('/dashboard/{id}/edit','deptaction@edit');
        Route::post('/dashboard/{id}/edit','deptaction@update');

        Route::get('/dashboard/{id}/delete','deptaction@delete');

        //===================for create Account ==================//

        Route::get('/create/Account','Accountcreate@accountform');
        Route::post('/create/Account','Accountcreate@createaccount');
        //====================for show Account ===================//
        Route::get('/account/show','Accountcreate@show');
        Route::post('/account/show','Accountcreate@update');
        Route::get('account/{id}/delete','Accountcreate@delete');
        //-------------------------for Inbox -------------------//
        Route::get('create/inbox','DefineInbox@allinbox');
        Route::get('create/inbox/{id}/detail','DefineInbox@inboxdetail');
        Route::post('create/inbox/{id}/detail','DefineInbox@inserttodo');
        Route::get('/tempinbox/{id}/detail/{name}','DefineInbox@fileread');


        //================inbox more==============================//
        Route::get('inbox/{id}/more','mainInbox@inboxmore');
        Route::post('inbox/{id}/more','mainInbox@edittodo');
        Route::get('inbox/{id}/detail/{name}','mainInbox@infileread');
        //===============outbox more =========================//
        Route::get('outbox/{id}/more','mainInbox@outboxmore');
        Route::get('outbox/{id}/detail/{name}','mainInbox@outfileread');


        //-------------//=====================//
        Route::get('unioutbox/show','DefineInbox@unioutbox');
        Route::post('unioutbox/{id}/edit','DefineInbox@unioutboxedit');

        Route::get('unioutbox/{id}/detail/{name}','DefineInbox@readuniout');



        //============feedback===============//
        Route::get('/feedback','DefineInbox@feedback');
        Route::post('/feedback/{id}/edit','DefineInbox@feedbackrecontent');
        Route::get('/feedback/{id}/delete','DefineInbox@feedbackdelete');
        Route::get('/feedback/{id}/detail/{name}','DefineInbox@readfeedback');
        Route::get('/outbox/{id}/disagree','DefineInbox@disagreestatus');

});
// Route::get('users/', function () {
//      $department=Inbox::onlyTrashed()->restore();
//     //  $department=department::withTrashed()->where('id',4)->restore();


//     return $department;

// });

Route::group(['prefix' => 'super','namespace' =>'AdminAction' ,'middleware' => 'supermiddleware'], function () {

    Route::get('/inbox','AdminInbox@show');
    Route::get('/deptinbox','AdminInbox@showdept');
    Route::post('/deptinbox','AdminInbox@showdept');

    Route::get('/outbox','Adminoutbox@outboxshow');

    Route::get('/review/inbox','AdminInbox@inboxshow');
    Route::get('/review/inbox/{id}/more','AdminInbox@inboxreviewmores');
    Route::post('/review/inbox/{id}/more','AdminInbox@inboxedit');
    Route::get('/delete/{id}/more','AdminInbox@inboxdelete');
    Route::get('/review/inbox/{id}/detail/{name}','AdminInbox@reviewfileread');


    Route::get('/review/outbox','Adminoutbox@insertoutboxshow');
    Route::get('/reviewoutdept','Adminoutbox@insertoutboxshowdept');
    Route::post('/reviewoutdept','Adminoutbox@insertoutboxshowdept');

    Route::get('/review/outbox/{id}/more','Adminoutbox@outboxreviewmores');
    Route::post('/review/outbox/{id}/more','Adminoutbox@outboxedits');

    Route::get('outbox/{id}/delete','Adminoutbox@outboxdelete');

    Route::get('/writeinbox','AdminInbox@showinsertinbox');

    Route::post('/writeinbox','AdminInbox@insertinbox');

    Route::get('/writeoutbox','AdminInbox@showinsertoutbox');
    Route::post('/writeoutbox','Adminoutbox@insertoutbox');

    //===========searching============//
    Route::get('/inboxsearch','AdminInbox@inboxsearch');
    Route::post('/inboxsearch','AdminInbox@inboxsearch');

    Route::get('/outboxsearch','Adminoutbox@outboxsearch');
    Route::post('/outboxsearch','Adminoutbox@outboxsearch');

    //===========search date =====//
    Route::get('/inboxdatesearch','AdminInbox@inboxdatesearch');
    Route::post('/inboxdatesearch','AdminInbox@inboxdatesearch');

    Route::get('/outboxdatesearch','Adminoutbox@outboxdatesearch');
    Route::post('/outboxdatesearch','Adminoutbox@outboxdatesearch');

    //===========unioutbocxes ------=-----------//
    Route::get('/unioutboxes','Adminoutbox@unioutbox');
    Route::post('/unioutboxes','Adminoutbox@postuni');

    //=======inbox more=====/
    Route::get('inbox/{id}/more','AdminInbox@inboxmores');
    Route::post('inbox/{id}/more','AdminInbox@feedback');
    Route::get('inbox/{id}/detail/{name}','AdminInbox@fileread');
    //=========outbox more=======//
    Route::get('outbox/{id}/more','Adminoutbox@outboxmore');
    Route::post('outbox/{id}/more','Adminoutbox@outboxedits');
    Route::get('outbox/{id}/detail/{name}','Adminoutbox@fileread');

    //===========feed back =============//

    Route::get('outbox/todo','Adminoutbox@outtodo');
    Route::get('feedback/{id}/read/{name}','Adminoutbox@readtodo');

    //=====================uni out boxes=============//

    Route::get('/unioutbox','Adminoutbox@unioutboxto');
    Route::get('/unioutbox/{id}/read/{name}','Adminoutbox@readunioutbox');


    Route::get('/outdeptinbox','Adminoutbox@deptsearchout');
    Route::post('/outdeptinbox','Adminoutbox@deptsearchout');


    Route::get('delete/{id}/uniout','Adminoutbox@unidelete');
    Route::get('delete/{id}/todout','Adminoutbox@tododelete');

    Route::post('/inbox/{id}/edit','AdminInbox@finalinboxedit');
});

// Route::get('/file',function(){
//     return view('file');
// });
// Route::post('/file','Accountcreate@fileupload');

// Route::get('/fileread','Accountcreate@fileread');

// Route::get('/readid/{id}/fileid/{name}','Accountcreate@read');

Route::group(['prefix' => 'normal','namespace' =>'AdminAction' ,'middleware' => 'normalmiddleware'], function () {


    Route::get('/inbox','Normal@normalinbox');
    Route::get('/inboxsearch','Normal@searchinbox');
    Route::post('/inboxsearch','Normal@searchinbox');

    Route::get('/inboxdatesearch','Normal@searchdate');
    Route::post('/inboxdatesearch','Normal@searchdate');

    Route::get('/outbox','Normal@normaloutbox');
    Route::get('/outboxsearch','Normal@normaloutboxsearch');
    Route::post('/outboxsearch','Normal@normaloutboxsearch');

    Route::get('/outboxdatesearch','Normal@outboxsearchdate');
    Route::post('/outboxdatesearch','Normal@outboxsearchdate');

    Route::get('inbox/{id}/more','Normal@normalinboxmore');
    Route::get('/inbox/{id}/detail/{name}','Normal@read');
    Route::get('outbox/{id}/more','Normal@outmore');

    Route::get('/outdeptinbox','Normal@outboxlist');
    Route::post('/outdeptinbox','Normal@outboxlist');
    Route::get('/deptinbox','Normal@showdept');
    Route::post('/deptinbox','Normal@showdept');
});

// Route::get('ss',function()
// {
//     $dd=Inbox::onlyTrashed()->where('id', 1)->get();

//     foreach ($dd->departments as $value) {
//         # code...
//         echo $value->name;
//     }
// });
