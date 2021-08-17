<?php

use App\Http\Controllers\InvitationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SigninController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\VerificationMddleware;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [SigninController::class, 'showLoginForm']);


Route::get("/dashboard", function() {
    if ( !Auth::user()->verify_pin &&  Auth::user()->role == 1 ) {
        return view("dashboard");
    } else {
        return redirect()->route("profile");
    }
})->name("dashboard")->middleware(["auth"]);


Route::get("login",[SigninController::class, 'showLoginForm'])->name("login");
Route::post("login",[SigninController::class, 'login'])->name("signin");
Route::get("logout",[SigninController::class, 'logout'])->name("logout");


Route::get("register",[SigninController::class, 'showSignUpForm'])->name("register");
Route::post("register",[SigninController::class, 'register'])->name("register");

Route::get('profile/verify/page', [ProfileController::class, 'showVerifyPage'])->name('verifypage');
Route::get('profile/verifypin/page', [ProfileController::class, 'showvVerifypinPage'])->name('verifypinPage');
Route::post('profile/verify', [ProfileController::class, 'verify'])->name('verify');


Route::get('profile', [ProfileController::class, 'show'])->name("profile")->middleware('auth');


Route::post('/sendinvitation', [InvitationController::class, "invite"]);


//
