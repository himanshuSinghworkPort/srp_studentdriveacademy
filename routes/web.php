<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware(['auth', 'role:student'])->group(function () {
    Route::get('/', function () {
        return view('welcome');
    })->name('welcome');

    Route::get('/courses', function () {
        return view('courses');
    })->name('courses');

    Route::get('/schedule', function () {
        return view('schedule');
    })->name('schedule');

    Route::get('/resources', function () {
        return view('resources');
    })->name('resources');

    Route::get('/profile', function () {
        return view('profile');
    })->name('profile');

    Route::get('/about', function () {
        return view('about');
    })->name('about');

    Route::get('/contact', function () {
        return view('contact');
    })->name('contact');

    Route::post('/contact', function (Illuminate\Http\Request $request) {
        return redirect()->back()->with('success', 'Thank you for your message! We will get back to you soon.');
    })->name('contact.submit');

    Route::post('/profile/edit', function (Illuminate\Http\Request $request) {
        return redirect()->back()->with('success', 'Profile edit function will be implemented here.');
    })->name('profile.edit');

    // Course action routes
    Route::post('/enroll/{courseId}', function ($courseId) {
        return redirect()->back()->with('success', "Successfully enrolled in course: $courseId");
    })->name('enroll');

    Route::get('/quotes/{courseId}', function ($courseId) {
        return redirect()->back()->with('success', "Fees for enrolled course: $courseId is Rs.7500");
    })->name('quotes');

    Route::get('/access-course/{courseId}', function ($courseId) {
        return redirect()->back()->with('success', "Accessing course materials for: $courseId");
    })->name('access-course');
});

Route::get('/auth', function () {
    return view('auth.login');
})->name('auth');

Route::get('/auth', [AuthController::class, 'showAuthPage'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'adminIndex'])->name('admin.dashboard');
});
