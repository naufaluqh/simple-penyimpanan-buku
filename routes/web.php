<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\LoanController;

// Menampilkan daftar buku di halaman utama
Route::get('/', [BookController::class, 'index'])->name('books.index');

// Route untuk CRUD buku
Route::resource('books', BookController::class)->except(['show']); // Mengatur semua rute kecuali show

// Route untuk CRUD peminjaman buku
Route::resource('loans', LoanController::class)->except(['show']); // Mengatur semua rute kecuali show

// Route untuk menampilkan form peminjaman buku
Route::get('/loan/create/{bookId}', [LoanController::class, 'create'])->name('loan.create');

// Route untuk menyimpan peminjaman
Route::post('/loan/store/{bookId}', [LoanController::class, 'store'])->name('loan.store');

// Route untuk melihat daftar peminjaman
Route::get('/loans', [LoanController::class, 'index'])->name('loans.index');

// Route tambahan jika Anda membutuhkan halaman khusus untuk buku
Route::get('books/create', [BookController::class, 'create'])->name('books.create');

Route::get('books/{book}/edit', [BookController::class, 'edit'])->name('books.edit');

Route::resource('books', BookController::class);

// Routes untuk menampilkan form edit
Route::get('/books/{id}/edit', [BookController::class, 'edit'])->name('books.edit');

// Routes untuk mengupdate data buku
Route::put('/books/{id}', [BookController::class, 'update'])->name('books.update');

