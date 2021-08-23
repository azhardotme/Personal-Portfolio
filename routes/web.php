<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Backend\BackendController;
use App\Http\Controllers\Backend\MainPagesController;
use App\Http\Controllers\Backend\ServicePagesController;
use App\Http\Controllers\Backend\PortfolioPagesController;
use App\Http\Controllers\Backend\AboutPagesController;
use App\Http\Controllers\ContactFormController;
use Illuminate\Support\Facades\Auth;
//Frontend Route
Route::get('/', [FrontendController::class, 'index'])->name('visitor_home');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Backend Route
Route::prefix('admin')->group(function () {

    Route::get('/dashboard', [BackendController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/service', [BackendController::class, 'service'])->name('admin.service');
    Route::get('/portfolio', [BackendController::class, 'portfolio'])->name('admin.portfolio');
    Route::get('/about', [BackendController::class, 'about'])->name('admin.about');
    Route::get('/contact', [BackendController::class, 'contact'])->name('admin.contact');

    //MainPagesController route
    Route::get('/main', [MainPagesController::class, 'index'])->name('admin.main');
    Route::put('/main', [MainPagesController::class, 'update'])->name('admin.main.update');

    //ServicePagesController route
    Route::get('/services/create', [ServicePagesController::class, 'create'])->name('admin.service.create');
    Route::post('/services/store', [ServicePagesController::class, 'store'])->name('admin.service.store');
    Route::get('/services/list', [ServicePagesController::class, 'list'])->name('admin.service.list');
    Route::get('/services/edit/{id}', [ServicePagesController::class, 'edit'])->name('admin.service.edit');
    Route::post('/services/update/{id}', [ServicePagesController::class, 'update'])->name('admin.service.update');
    Route::delete('/services/destroy/{id}', [ServicePagesController::class, 'destroy'])->name('admin.service.destroy');

    //PortfolioPagesController route
    Route::get('/portfolios/create', [PortfolioPagesController::class, 'create'])->name('admin.portfolios.create');
    Route::put('/portfolios/store', [PortfolioPagesController::class, 'store'])->name('admin.portfolios.store');
    Route::get('/portfolios/list', [PortfolioPagesController::class, 'list'])->name('admin.portfolios.list');
    Route::get('/portfolios/edit/{id}', [PortfolioPagesController::class, 'edit'])->name('admin.portfolios.edit');
    Route::post('/portfolios/update/{id}', [PortfolioPagesController::class, 'update'])->name('admin.portfolios.update');
    Route::delete('/portfolios/destroy/{id}', [PortfolioPagesController::class, 'destroy'])->name('admin.portfolios.destroy');

    //AboutPagesController route
    Route::get('/about/create', [AboutPagesController::class, 'create'])->name('admin.about.create');
    Route::put('/about/store', [AboutPagesController::class, 'store'])->name('admin.about.store');
    Route::get('/about/list', [AboutPagesController::class, 'list'])->name('admin.about.list');
    Route::get('/about/edit/{id}', [AboutPagesController::class, 'edit'])->name('admin.about.edit');
    Route::post('/about/update/{id}', [AboutPagesController::class, 'update'])->name('admin.about.update');
    Route::delete('/about/destroy/{id}', [AboutPagesController::class, 'destroy'])->name('admin.about.destroy');
});

Route::post('/contact', [ContactFormController::class, 'store'])->name('contact.store');
