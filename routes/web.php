<?php

use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AffiliationRequestController;
use App\Http\Controllers\AffilieController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FournisseurController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/api/auth/admin/login', [AuthController::class, 'adminLogin']);
Route::post('/api/auth/affilie/login', [AuthController::class, 'affilieLogin']);
Route::post('/api/affiliation-requests', [AffiliationRequestController::class, 'store']);
Route::get('/api/affiliation-requests/next-code', [AffiliationRequestController::class, 'nextCode']);

Route::get('/api/catalogue/products', [ProductController::class, 'catalogue'])
    ->name('catalogue.products');

Route::middleware('admin')->group(function () {
    Route::get('/admin', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::post('/api/auth/admin/logout', [AuthController::class, 'adminLogout']);
    Route::get('/api/auth/admin/me', [AuthController::class, 'adminMe']);

    Route::get('/api/admin/products', [ProductController::class, 'index']);
    Route::post('/api/admin/products', [ProductController::class, 'store']);
    Route::post('/api/admin/products/{product}', [ProductController::class, 'update']);
    Route::delete('/api/admin/products/{product}', [ProductController::class, 'destroy']);

    Route::get('/api/admin/affiliation-requests', [AffiliationRequestController::class, 'index']);
    Route::patch('/api/admin/affiliation-requests/{affiliationRequest}/status', [AffiliationRequestController::class, 'updateStatus']);

    Route::get('/api/admin/affilies', [AffilieController::class, 'index']);
    Route::post('/api/admin/affilies', [AffilieController::class, 'store']);
    Route::post('/api/admin/affilies/{affilie}', [AffilieController::class, 'update']);
    Route::patch('/api/admin/affilies/{affilie}', [AffilieController::class, 'patch']);
    Route::delete('/api/admin/affilies/{affilie}', [AffilieController::class, 'destroy']);

    Route::get('/api/admin/fournisseurs', [FournisseurController::class, 'index']);
    Route::post('/api/admin/fournisseurs', [FournisseurController::class, 'store']);
    Route::post('/api/admin/fournisseurs/{fournisseur}', [FournisseurController::class, 'update']);
    Route::delete('/api/admin/fournisseurs/{fournisseur}', [FournisseurController::class, 'destroy']);

    Route::get('/api/admin/users', [AdminUserController::class, 'index']);
    Route::post('/api/admin/users', [AdminUserController::class, 'store']);
    Route::post('/api/admin/users/{user}', [AdminUserController::class, 'update']);
    Route::delete('/api/admin/users/{user}', [AdminUserController::class, 'destroy']);

    Route::get('/api/admin/orders', [OrderController::class, 'index']);
    Route::get('/api/admin/stats', [OrderController::class, 'stats']);
    Route::patch('/api/admin/orders/{order}', [OrderController::class, 'update']);
});

Route::middleware('affilie')->group(function () {
    Route::get('/affilie', function () {
        return view('affilie.dashboard');
    })->name('affilie.dashboard');

    Route::post('/api/auth/affilie/logout', [AuthController::class, 'affilieLogout']);
    Route::get('/api/auth/affilie/me', [AuthController::class, 'affilieMe']);

    Route::post('/api/catalogue/products/{product}/order', [OrderController::class, 'storeFromCatalogue']);
    Route::get('/api/affilie/orders', [OrderController::class, 'mine']);
    Route::get('/api/affilie/messages', [MessageController::class, 'index']);
    Route::post('/api/affilie/messages/{message}/read', [MessageController::class, 'markRead']);
    Route::post('/api/affilie/messages/read-all', [MessageController::class, 'markAllRead']);
});
