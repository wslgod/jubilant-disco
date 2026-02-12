<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\MaterialManagementController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\SubjectManagementController;
use App\Http\Controllers\Admin\SubscriptionManagementController;
use App\Http\Controllers\Admin\TopicManagementController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DisciplineController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\MaterialController;
use Illuminate\Support\Facades\Route;

Route::get('/', LandingController::class)->name('landing');

Route::middleware('guest')->group(function (): void {
    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store']);
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store']);
    Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
    Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');
});

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

Route::middleware(['auth', 'check.subscription'])->group(function (): void {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');
    Route::get('/disciplinas', [DisciplineController::class, 'index'])->name('disciplines.index');
    Route::get('/disciplinas/{subject}', [DisciplineController::class, 'show'])->name('disciplines.show');
    Route::get('/materiais', [MaterialController::class, 'index'])->name('materials.index');
    Route::get('/materiais/{material}', [MaterialController::class, 'show'])->name('materials.show');
    Route::get('/materiais/{material}/stream', [MaterialController::class, 'stream'])
        ->middleware('signed')
        ->name('materials.stream');
    Route::get('/minha-conta', [AccountController::class, 'show'])->name('account.show');
});

Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth', 'can:access-admin'])
    ->group(function (): void {
        Route::get('/dashboard', AdminDashboardController::class)->name('dashboard');
        Route::resource('subjects', SubjectManagementController::class)->except(['show']);
        Route::resource('topics', TopicManagementController::class)->except(['show']);
        Route::resource('materials', MaterialManagementController::class)->except(['show']);
        Route::get('/students', [StudentController::class, 'index'])->name('students.index');
        Route::patch('/students/{user}/toggle-status', [StudentController::class, 'toggleStatus'])->name('students.toggle-status');
        Route::get('/subscriptions', [SubscriptionManagementController::class, 'index'])->name('subscriptions.index');
    });
