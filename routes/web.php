<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\AdminController;
use App\Http\Controllers\Dashboard\AnggotaController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Dashboard\BukuController;
use App\Http\Controllers\Dashboard\KategoriController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\PeminjamanController;
use App\Http\Controllers\SessionController;

Route::middleware('guest')->group((function () {
    Route::get('/', function () {
        return view('pages.landing-page.welcome.index');
    });
    
    Route::get('/as', function () {
        return view('pages.landing-page.roles.index');
    });
    
    Route::prefix('login')->group(function () {
        Route::prefix('/admin')->group((function () {
            Route::get('/', [AuthController::class, 'admin']);
            Route::post('/', [AuthController::class, 'login']);
        }));
    
        Route::prefix('/anggota')->group((function () {
            Route::get('/', [AuthController::class, 'anggota']);
            Route::post('/', [AuthController::class, 'login']);
        }));
    
        Route::prefix('/pustakawan')->group((function () {
            Route::get('/', [AuthController::class, 'pustakawan']);
            Route::post('/', [AuthController::class, 'login']);
        }));
    });

}));

Route::middleware('auth')->group((function () {
    Route::post('/session/forget',[SessionController::class, 'forget']);

    Route::middleware('is_admin')->group((function () {
        Route::prefix('/admin')->group((function () {
            Route::get('/', [DashboardController::class, 'index']);

            Route::prefix('/kategori')->group((function () {
                Route::get('/', [KategoriController::class, 'index']);

                // create
                Route::post('/', [KategoriController::class, 'store']);
                Route::get('/add', [KategoriController::class, 'create']);
                
                // update
                Route::get('/{id}', [KategoriController::class, 'edit'])->where('id', '[0-9]+');
                Route::post('/edit/{id}', [KategoriController::class, 'update'])->where('id', '[0-9]+');
                
                // delete
                Route::post('/delete', [KategoriController::class, 'delete']);
                Route::post('/delete/{id}', [KategoriController::class, 'destroy'])->where('id', '[0-9]+');
            }));
            
            Route::prefix('/buku')->group((function () {
                Route::get('/', [BukuController::class, 'index']);
                Route::get('/add', [BukuController::class, 'create']);
            }));

            Route::prefix('/anggota')->group((function () {
                Route::get('/', [AnggotaController::class, 'index']);
                Route::get('/add', [AnggotaController::class, 'create']);
            }));

            Route::prefix('/admin')->group((function () {
                Route::get('/', [AdminController::class, 'index']);
                Route::get('/add', [AdminController::class, 'create']);
            }));

            Route::prefix('/peminjaman')->group((function () {
                Route::get('/', [PeminjamanController::class, 'index']);
                
                // create
                Route::post('/', [PeminjamanController::class, 'store']);
                Route::get('/add', [PeminjamanController::class, 'create']);
            }));
        }));
    }));

    Route::middleware('is_anggota')->group((function () { 
        Route::prefix('/anggota')->group((function () {
            Route::get('/', [DashboardController::class, 'index']);
            Route::get('/peminjaman', [PeminjamanController::class, 'index']);
        }));
    }));

    Route::middleware('is_pustakawan')->group((function () { 
        Route::prefix('/pustakawan')->group((function () {
            Route::get('/', [DashboardController::class, 'index']);
            Route::get('/peminjaman', [PeminjamanController::class, 'index']);
            Route::get('/laporan', [DashboardController::class, 'index']);
        }));
    }));
    
    Route::post('/logout', [AuthController::class, 'logout']);
}));
