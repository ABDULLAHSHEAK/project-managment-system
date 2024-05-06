<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ShiftController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\HealthController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\TrainerController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\ProjectCategoryController;
use App\Http\Controllers\EmployerCategoryController;

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

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');


Route::middleware(['auth'])->prefix('dashboard')->group(function () {

    // ------- User Route ------
    Route::get('all-user', [UserController::class, 'index'])->name('user.view');
    Route::get('add-user', [UserController::class, 'AddUser'])->name('add.user');
    Route::post('store-user', [UserController::class, 'StoreUser'])->name('store.user');

    Route::get('edit-user/{id}', [UserController::class, 'EditUser'])->name('edit.user');
    Route::get('profile-user', [UserController::class, 'ProfileUser'])->name('profile.user');
    Route::get('delete-user/{id}', [UserController::class, 'DeleteUser'])->name('delete.user');


    // ---------- Shift Route -----------
    Route::get('all-shift', [ShiftController::class, 'index'])->name('view.shift');
    Route::get('add-shift', [ShiftController::class, 'AddShift'])->name('add.shift');
    Route::post('store-shift', [ShiftController::class, 'StoreShift'])->name('store.shift');
    Route::get('edit-shift/{id}', [ShiftController::class, 'EditShift'])->name('edit.shift');
    Route::post('edit-shift/{id}', [ShiftController::class, 'UpdateShift'])->name('update.shift');
    Route::get('delete-shift/{id}', [ShiftController::class, 'DeleteShift'])->name('delete.shift');


    // -------- Employer Category Route ------------
    Route::resource('employer-category', EmployerCategoryController::class);
    Route::get('employer-category/{id}/delete', [EmployerCategoryController::class, 'destroy']);

    // -------- Project Category Route ------------
    Route::resource('project-category', ProjectCategoryController::class);
    Route::get('project-category/{id}/delete', [ProjectCategoryController::class, 'destroy']);


    // -------- Client Route ------------
    Route::resource('client', ClientController::class);
    Route::get('client/{id}/delete', [ClientController::class, 'destroy']);
    Route::get('client/{id}/details', [ClientController::class, 'details']);

    // -------- Employer Route ------------
    Route::resource('employer', EmployerController::class);
    Route::get('employer/{id}/delete', [EmployerController::class, 'destroy']);
    Route::get('employer/{id}/details', [EmployerController::class, 'details']);


    // -------- Package Route ------------
    Route::resource('package', PackageController::class);
    Route::get('package/{id}/delete', [PackageController::class, 'destroy'])->name('delete.package');



    // -------- Member Route ------------
    Route::resource('member', MemberController::class);
    Route::get('old-member', [MemberController::class, 'oldMember'])->name('old.member');
    Route::get('member/{id}/delete', [MemberController::class, 'destroy'])->name('delete.member');


    // -------- Health Status Route ------------
    Route::resource('health-status', HealthController::class);
    Route::get('health-details/{id}',[HealthController::class ,'details'])->name('health.details');
    Route::get('health-create/{id}',[HealthController::class ,'create'])->name('health.create');
    Route::post('health-store', [HealthController::class, 'HealthStore'])->name('health.store');
    Route::get('health-print/{id}',[HealthController::class ,'Print'])->name('health.print');
    Route::get('health-delete/{id}',[HealthController::class ,'HealthDelete'])->name('health.delete');

    // ------------- Transaction Route ----------
    Route::get('all-transactions',[TransactionController::class,'index'])->name('tran.view');
});
