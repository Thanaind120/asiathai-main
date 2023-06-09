<?php

use Illuminate\Support\Facades\Route;
use App\LanguageModel;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('frontend.index');
// });
##### require frontend route #######

require_once('web-frontend.php');
// require_once('web-frontend22.php');
require_once('backend.php');
require_once('web-partner.php');

require_once('max-backend.php');
// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
