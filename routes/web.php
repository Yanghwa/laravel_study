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

// Route::get('/', 'IndexController@index');

// Route::resource('posts.comments', 'PostCommentController');

// Route::get('auth', function () {
//     $credentials = [
//         'email'    => 'john@example.com',
//         'password' => 'password'
//     ];

//     if (! Auth::attempt($credentials)) {
//         return 'Incorrect username and password combination';
//     }

//     return redirect('protected');
// });

// Route::get('auth/logout', function () {
//     Auth::logout();

//     return 'See you again~';
// });

// Route::get('protected', function () {
//     if (! Auth::check()) {
//         return 'Illegal access !!! Get out of here~';
//     }
//     return 'Welcome back, ' . Auth::user()->name;
// });

// Route::get('protected', [
//     'middleware' => 'auth',
//     function () {
//         return 'Welcome back, ' . Auth::user()->name;
//     }
// ]);

// Route::get('auth/login', function() {
//     return "You've reached to the login page~";
// });

Route::get('/', function() {
    return 'See you soon~';
});

Route::get('home', [
    'middleware' => 'auth',
    function() {
        return 'Welcome back, ' . Auth::user()->name;
    }
]);

// Authentication routes...
Route::get('auth/login', 'Auth\LoginController@showLoginForm');
Route::post('auth/login', 'Auth\LoginController@login');
Route::get('auth/logout', 'Auth\LoginController@logout');

// Registration routes...
Route::get('auth/register', 'Auth\RegisterController@showRegistrationForm');
Route::post('auth/register', 'Auth\RegisterController@register');

// Route::resource('posts', 'PostsController');

// Route::get('posts', function() {
//     $posts = App\Post::get();

//     return view('posts.index', compact('posts'));
// });

//Eager loading
// Route::get('posts', function() {
//     $posts = App\Post::with('user')->get();

//     return view('posts.index', compact('posts'));
// });

Route::get('posts', function() {
    $posts = App\Post::with('user')->paginate(10);

    return view('posts.index', compact('posts'));
});

//lazy Eager loading
// Route::get('posts', function() {
//     $posts = App\Post::get();
//     $posts->load('user');

//     return view('posts.index', compact('posts'));
// });

// Route::get('posts', [
//     'as'   => 'posts.index',
//     'uses' => 'PostsController@index'
// ]);

Route::get('mail', function() {
    $to = 'kellerj87@hotmail.com';
    $subject = 'Studying sending email in Laravel';
    $data = [
        'title' => 'Hi there',
        'body' => 'This is the body of an email message',
        'user' => App\User::find(1)
    ];
    return Mail::send('emails.welcome', $data, function($message) use($to, $subject) {
        $message->to($to)->subject($subject);
    });
});


// Route::get('/', function () {
//     $view = view('index');
//     $view->greeting = "Hey~ What's up";
//     $view->name = 'everyone';
//     $view->items = [
//         'Apple',
//         'Banana'
//     ];
//     return $view;
// });

// Route::get('/', function () {
//     return view('index', [
//         'greeting' => 'Ola~',
//         'name'     => 'Laravelians'
//     ]);
// });

// Route::get('/', function () {
//     return view('index')->with([
//         'greeting' => 'Good morning ^^/',
//         'name'     => 'Appkr'
//     ]);
// });

// Route::get('/', function () {
//     $greeting = 'Hello';

//     return view('index')->with('greeting', $greeting);
// });


// Route::get('/', function () {
//     return view('welcome');
// });

DB::listen(function($event) {
    var_dump($event->sql);
    // dd($event->sql);
});
