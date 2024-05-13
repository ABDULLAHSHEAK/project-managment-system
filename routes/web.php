<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\OthersController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\ExpenseCategoryController;
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




Route::middleware(['auth',  'IsAdmin'])->prefix('dashboard')->group(function () {

    // ------- User Route ------
    Route::get('all-user', [UserController::class, 'index'])->name('user.view');
    Route::get('add-user', [UserController::class, 'AddUser'])->name('add.user');
    Route::post('store-user', [UserController::class, 'StoreUser'])->name('store.user');

    Route::get('edit-user/{id}', [UserController::class, 'EditUser'])->name('edit.user');
    Route::post('edit-user/{id}', [UserController::class, 'UpdateUser'])->name('update.user');
    Route::get('profile-user', [UserController::class, 'ProfileUser'])->name('profile.user');
    Route::get('delete-user/{id}', [UserController::class, 'DeleteUser'])->name('delete.user');


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


    // -------- Project Route ------------
    Route::resource('project', ProjectController::class);
    Route::get('project/{id}/delete', [ProjectController::class, 'destroy']);
    Route::get('project/{id}/details', [ProjectController::class, 'details']);


    // -------- Note Route ------------
    Route::resource('note', NoteController::class);
    Route::post('project/{id}/details', [NoteController::class, 'AddNote'])->name('add.note');
    Route::get('note-add/{id}', [NoteController::class, 'NoteAdd']);
    Route::post('note-add/{id}', [NoteController::class, 'SaveNote']);
    Route::get('note/{id}/delete', [NoteController::class, 'destroy']);
    Route::get('note/{id}/details', [NoteController::class, 'details']);


    // -------- Task Route ------------
    Route::resource('task', TaskController::class);
    Route::post('project/{id}/details', [NoteController::class, 'AddNote'])->name('add.note');
    Route::get('task-add/{id}', [TaskController::class, 'TaskAdd']);
    Route::post('task-add/{id}', [TaskController::class, 'SaveTask']);
    Route::get('task/{id}/delete', [TaskController::class, 'destroy']);
    Route::get('task/{id}/details', [TaskController::class, 'details']);



    // -------- Collection Route ------------
    Route::resource('collection', CollectionController::class);

    Route::post('project/{id}/details', [NoteController::class, 'AddNote'])->name('add.note');
    Route::get('collection-add/{id}', [CollectionController::class, 'CollectionAdd']);
    Route::post('task-add/{id}', [TaskController::class, 'SaveTask']);
    Route::get('collection/{id}/delete', [CollectionController::class, 'destroy']);
    Route::get('task/{id}/details', [TaskController::class, 'details']);


    // -------- Expense Category Route ------------
    Route::resource('expense-category', ExpenseCategoryController::class);
    Route::get('expense-category/{id}/delete', [ExpenseCategoryController::class, 'destroy']);
    Route::get('expense-category/{id}/details', [ExpenseCategoryController::class, 'details']);


    // -------- Expense Route ------------
    Route::resource('expense', ExpenseController::class);
    Route::get('expense/{id}/delete', [ExpenseController::class, 'destroy']);
    Route::get('expense/{id}/details', [ExpenseController::class, 'details']);


});

Route::middleware(['auth'])->prefix('employer-dashboard')->group(function (){
    Route::get('project', [OthersController::class, 'index'])->name('project.view');
    Route::get('project/{id}/details', [OthersController::class, 'details']);
    Route::get('task/{id}/details', [OthersController::class, 'Taskdetails']);
    Route::get('task/{id}', [OthersController::class, 'TaskEdit'])->name('task.edit');
    Route::post('task/{id}', [OthersController::class, 'TaskUpdate'])->name('task.update');
    Route::post('project/{id}/details', [OthersController::class, 'AddNote'])->name('add.note');
    Route::get('profile-user', [OthersController::class, 'ProfileUser'])->name('profile.user');

});
