<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', 'WelcomeController@getIndex');

/*
|--------------------------------------------------------------------------
| /login, /logout, /signup
|--------------------------------------------------------------------------
*/
# Show login form
Route::get('/login', 'Auth\AuthController@getLogin');

# Process login form
Route::post('/login', 'Auth\AuthController@postLogin');

# Process logout
Route::get('/logout', 'Auth\AuthController@getLogout');

# Show registration form
Route::get('/register', 'Auth\AuthController@getRegister');

# Process registration form
Route::post('/register', 'Auth\AuthController@postRegister');

Route::get('/confirm-login-worked', function() {

    # You may access the authenticated user via the Auth facade
    $user = Auth::user();

    if($user) {
        echo 'You are logged in.';
        dump($user->toArray());
    } else {
        echo 'You are not logged in.';
    }

    return;

});

/*
|--------------------------------------------------------------------------
| /store
| Restricting multiple routes with Middleware
|--------------------------------------------------------------------------
*/
Route::group(['middleware' => 'auth'], function () {
    Route::get('/store', 'StoreController@getIndex');
    Route::get('/store/create-store', 'StoreController@getCreateStore');
    Route::post('/store/create-store', 'StoreController@postCreateStore');
    Route::get('/store/{id?}/create-item', 'StoreController@getCreateItem');
    Route::post('/store/create-item', 'StoreController@postCreateItem');
    Route::get('/store/{id?}/items', 'StoreController@getItems');
    Route::get('/store/{id?}/edit','StoreController@getEdit');
    Route::post('/store/edit','StoreController@postEdit');
    Route::get('/store/edit-item/{id?}','StoreController@getEditItem');
    Route::post('/store/edit-item','StoreController@postEditItem');
    Route::get('/store/delete-item/{id?}','StoreController@getDeleteItem');
    Route::get('/store/{id?}/delete-store','StoreController@getDeleteStore');
    Route::get('/store/item-checked/{id?}','StoreController@getItemChecked');
    Route::get('/store/{id?}/share-storelist','StoreController@getShareStorelist');
    Route::post('/store/share-storelist','StoreController@postShareStorelist');
});
/*
|--------------------------------------------------------------------------
| Test database connection
|--------------------------------------------------------------------------
*/
Route::get('/debug', function() {

    echo '<pre>';

    echo '<h1>Environment</h1>';
    echo App::environment().'</h1>';

    echo '<h1>Debugging?</h1>';
    if(config('app.debug')) echo "Yes"; else echo "No";

    echo '<h1>Database Config</h1>';
    /*
    The following line will output your MySQL credentials.
    Uncomment it only if you're having a hard time connecting to the database and you
    need to confirm your credentials.
    When you're done debugging, comment it back out so you don't accidentally leave it
    running on your live server, making your credentials public.
    */
    //print_r(config('database.connections.mysql'));

    echo '<h1>Test Database Connection</h1>';
    try {
        $results = DB::select('SHOW DATABASES;');
        echo '<strong style="background-color:green; padding:5px;">Connection confirmed</strong>';
        echo "<br><br>Your Databases:<br><br>";
        print_r($results);
    }
    catch (Exception $e) {
        echo '<strong style="background-color:crimson; padding:5px;">Caught exception: ', $e->getMessage(), "</strong>\n";
    }

    echo '</pre>';

});
