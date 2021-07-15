<?php



use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

//-------------------------------------
// CONTROLLERS
//-------------------------------------
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\LanguagesController;
use App\Http\Controllers\LocationsController;
use App\Http\Controllers\MapsController;

## OAuth Controllers ##
use App\Http\Controllers\Auth\SocialGoogleController;
use App\Http\Controllers\Auth\SocialGitHubController;
use App\Http\Controllers\Auth\SocialFacebookController;

use App\Http\Controllers\ContactController;


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

Route::get('/', [WelcomeController::class, 'index']);

Route::view('about', 'about.index')->name('about.index');
Route::view('about/book', 'about.book')->name('about.book');
Route::view('about/faq', 'about.faq')->name('about.faq');
Route::view('about/privacy', 'about.privacy')->name('about.privacy');
Route::view('about/tos', 'about.tos')->name('about.tos');

Route::view('contact', 'contact.index')->name('contact.index');

//Route::get('events', [EventsController::class, 'index'])->name('events.index');
//Route::get('events/{id}', [EventsController::class, 'show'])->name('events.show');
Route::resource('events', 'EventsController');
Route::resource('states', 'StatesController');
Route::resource('event_user', 'EventUserController');
Route::resource('users', 'UsersController');

// emails sending controllers
Route::get('contact', [ContactController::class, 'create'])->name('contact.create');
Route::post('contact', [ContactController::class, 'store'])->name('contact.store');
Route::get('ship', [ContactController::class, 'ship'])->name('contact.ship');

Route::get('send_test_email', [ContactController::class, 'sendemail']);

Route::get('languages', [LanguagesController::class, 'index'])->name('languages.index');

Route::get('locations', [LocationsController::class, 'index'])->name('locations.index');

Route::get('map', [MapsController::class, 'index'])->name('maps.index');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

## OAuth with Google ##
Route::get('auth/google', [SocialGoogleController::class, 'redirectToProvider']);
Route::get('auth/google/callback', [SocialGoogleController::class, 'handleProviderCallback']);

## OAuth with GitHub ##
Route::get('auth/github', [SocialGitHubController::class, 'redirectToProvider']);
Route::get('auth/github/callback', [SocialGitHubController::class, 'handleProviderCallback']);

# OAuth with Facebook ##
Route::get('auth/facebook', [SocialFacebookController::class, 'redirectToProvider']);
Route::get('auth/facebook/callback', [SocialFacebookController::class, 'handleProviderCallback']);

