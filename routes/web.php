<?php

use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\Position\PositionContoller;
use App\Http\Controllers\Admin\Worker\WorkerController;
use App\Http\Controllers\Admin\Worker\WorkerDeletedController;
use App\Http\Controllers\Admin\Project\ProjectController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

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
});
