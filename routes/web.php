<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Home;
use App\Http\Livewire\Contact;
use App\Http\Livewire\Service;
use App\Http\Livewire\Chat;
use App\Http\Livewire\User;
use App\Http\Livewire\Adminchart;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\About;
use App\Http\Livewire\Resource;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Forgot;
use App\Http\Livewire\AppointmentComponent;
use App\Http\Livewire\Folderomponent;
use App\Http\Livewire\ShowFileComponent;
use App\Http\Livewire\AssignOfficerComponent;
use App\Http\Livewire\AutoAlert;
use App\Http\Livewire\BookAppointment;
use App\Http\Livewire\ChangePassword;
use App\Http\Livewire\RequestMSGComponent;
use App\Http\Livewire\ShareFile;
use App\Http\Livewire\Testing;
use Livewire\Livewire;
// Livewire::routes();

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
// Route::get('/login', App\Http\Livewire\Auth\Login::class)->name('login');
// Route::get('/register', App\Http\Livewire\Auth\Register::class)->name('register');
// Route::get('/password/reset', App\Http\Livewire\Auth\ResetPassword::class)->name('password.request');
// Route::get('/password/reset/{token}', App\Http\Livewire\Auth\ResetPassword::class)->name('password.reset');
// Route::get('/email/verify', App\Http\Livewire\Auth\VerifyEmail::class)->name('verification.notice');
Auth::routes();

Route::get('/', Home::class)->name('home');
Route::get('/testing', Testing::class)->name('testing');
Route::get('/contact', Contact::class);
Route::get('/service', Service::class);
Route::get('/chat', Chat::class);
Route::get('/register', Register::class)->name('register');
Route::get('/login', Login::class)->name('login');
Route::get('/change-password', [Login::class, 'changePassword'])->name('change-password');
// Route::get('/', Login::class)->name('homelogin');
Route::get('/forgot', Forgot::class);
Route::get('/about-us', About::class);
Route::group(['middleware' => ['auth']], function() {
    Route::get('/logout', function () {
		auth::logout();
       return redirect('/login');
	});
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/change-password', ChangePassword::class)->name('change-password');
    Route::get('/auto-alert', AutoAlert::class)->name('auto-alert');
    Route::get('/book-appointment', BookAppointment::class)->name('book-appointment');
    Route::get('/share-files', ShareFile::class)->name('share-files');

    Route::get('/admin/dashboard', Dashboard::class);
    Route::get('/admin/users', User::class);
    Route::get('/admin/users/{id}', User::class);
    Route::get('/admin/chat', Adminchart::class);
    Route::get('/admin/resource', Resource::class);
    Route::resource('roles', RoleController::class);
    Route::resource('/users', UserController::class);
    Route::resource('/products', ProductController::class);
    Route::get('/appointment', AppointmentComponent::class);
    Route::get('/folder-document', Folderomponent::class);
    Route::get('/assign-officer', AssignOfficerComponent::class);
    Route::get('/view-share', ShowFileComponent::class);
    Route::get('/make-request', RequestMSGComponent::class);

    // routes/web.php
    Route::get('files/{filename}', [App\Http\Controllers\FileController::class, 'show']);


});

