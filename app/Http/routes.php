<?php
use App\User;
use App\Client;
use App\Network;
use App\Category;
use App\Packet;
use App\Ticket;


Route::get('searchajax',array('as'=>'searchajax','uses'=>'ClientController@autoComplete'));











 //auth
Route::get('/', ['as' => 'auth.login', 'uses' => 'Auth\AuthController@showLoginForm']);
Route::post('login', ['as' => 'auth.login', 'uses' => 'Auth\AuthController@login']);
Route::get('logout', ['as' => 'auth.logout', 'uses' => 'Auth\AuthController@logout']);


Route::group(array('middleware' => array('auth'), 'prefix' => 'controll'), function() {


    Route::get('/dashboard', function () {
      $users     =User::count();//here we get  the users numbers
      $clients   =Client::count();
      $networks  =Network::count();
      $categorys =Category::count();
      $packages   =Packet::count();
      $ticket   =Ticket::count();
      
      //dd($clients);
        return view('dashboard',compact('users','clients','networks','categorys','packages','ticket'));
    });

    //dashboard
    Route::resource('users', 'UserController');
    Route::resource('categories', 'CategoryController');
    Route::resource('tags', 'TagController');
    Route::resource('clients', 'ClientController');
    Route::resource('packets', 'PacketController');
    Route::get('my-ticket', 'TicketController@myTicket');
    Route::resource('tickets', 'TicketController');
    Route::resource('networks', 'NetworkController');

    Route::post('save-ticket', 'TicketController@saveTicket');
    Route::post('change-type', 'TicketController@changeType');
    Route::post('change-status', 'TicketController@changeStatus');
//  Route::post('change-status-supports', 'TicketController@changeStatusSupports');

//export excel sheet

    Route::get('importExport', 'MaatwebsiteDemoController@importExport');
    Route::get('downloadExcel/{type}', 'MaatwebsiteDemoController@downloadExcel');
    Route::post('importExcel', 'MaatwebsiteDemoController@importExcel');

});
