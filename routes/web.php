<?php

use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\Position\PositionContoller;
use App\Http\Controllers\Admin\Project\ProjectDeletedController;
use App\Http\Controllers\Admin\Worker\WorkerController;
use App\Http\Controllers\Admin\Project\ProjectController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Worker\WorkerDeletedController;
use App\Http\Controllers\Admin\Position\PositionDeletedController;

Route::get('/', function () {
    return view('welcome');
});

Route::redirect('/', '/admin');

Route::group(['prefix' => 'admin'], function(){
    Route::get('/', MainController::class)
        ->name('admin.index');
    Route::resource('/workers', WorkerController::class)
    ->missing(function(){
        return redirect()->route('workers.index');
    });
    Route::resource('/positions', PositionContoller::class)
        ->missing(function(){
            return redirect()->route('positions.index');
        });
    Route::resource('/projects', ProjectController::class)
        ->missing(function() {
            return redirect()->route('projects.index');
        });
    Route::view('/data', 'admin.data.index')
        ->name('data.index');
    Route::get('/workers-deleted', [WorkerDeletedController::class, 'indexDeleted'])
        ->name('workers.index.deleted');
    Route::get('/workers-deleted/{id}', [WorkerDeletedController::class, 'showDeleted'])
        ->name('workers.show.deleted');
    Route::put('/workers-deleted/{id}', [WorkerDeletedController::class, 'restoreDeleted'])
        ->name('workers.restore.deleted');
    Route::get('/positions-deleted', [PositionDeletedController::class, 'indexDeleted'])
        ->name('positions.index.deleted');
    Route::get('/positions-deleted/{id}', [PositionDeletedController::class, 'showDeleted'])
        ->name('positions.show.deleted');
    Route::put('positions-deleted/{id}', [PositionDeletedController::class, 'restoreDeleted'])
        ->name('positions.restore.deleted');
    Route::get('/projects-deleted', [ProjectDeletedController::class, 'indexDeleted'])
        ->name('projects.index.deleted');
    Route::get('/projects-deleted/{id}', [ProjectDeletedController::class, 'showDeleted'])
        ->name('projects.show.deleted');
    Route::put('/projects-deleted/{id}', [ProjectDeletedController::class, 'restoreDeleted'])
        ->name('projects.restore.deleted');
});
