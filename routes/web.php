<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CvController;
use App\Http\Controllers\CertificateController;

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/journal', function () {
    return Inertia::render('Journal');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/journal', function () {
        return Inertia::render('Journal');
    })->name('journal');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/upload-cv', [CvController::class, 'uploadForm'])->name('cv.uploadForm');
    Route::post('/upload-cv', [CvController::class, 'upload'])->name('cv.upload');
});

Route::get('/cv', [CvController::class, 'view'])->name('cv.view');

// Admin-only upload
Route::middleware(['auth'])->group(function () {
    Route::get('/upload-certificate', [CertificateController::class, 'uploadForm'])->name('cert.uploadForm');
    Route::post('/upload-certificate', [CertificateController::class, 'upload'])->name('cert.upload');
});

// Public viewer
Route::get('/certificates', [CertificateController::class, 'list'])->name('cert.view');
Route::get('/certificates/file/{filename}', [CertificateController::class, 'file'])->name('cert.file');

require __DIR__ . '/auth.php';
