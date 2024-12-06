<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\Book;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    // Menampilkan form peminjaman untuk buku tertentu
    public function create($bookId)
    {
        // Mencari buku berdasarkan ID
        $book = Book::findOrFail($bookId);
        
        // Menampilkan form peminjaman dengan data buku yang dipilih
        return view('loans.create', compact('book'));
    }

    // Menyimpan data peminjaman buku
    public function store(Request $request, $bookId)
    {
        // Validasi input
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',  // Pastikan user_id ada di tabel users
            'borrowed_at' => 'required|date',  // Tanggal peminjaman harus valid
        ]);

        // Mencari buku berdasarkan ID
        $book = Book::findOrFail($bookId);

        // Menyimpan data peminjaman ke database
        $loan = new Loan();
        $loan->user_id = $validated['user_id'];
        $loan->book_id = $book->id;
        $loan->borrowed_at = $validated['borrowed_at'];
        $loan->save();

        // Mengupdate status buku yang dipinjam
        $book->update(['is_borrowed' => true]);

        // Redirect dengan pesan sukses
        return redirect()->route('books.index')->with('success', 'Buku berhasil dipinjam.');
    }

    // Menampilkan semua peminjaman
    public function index()
    {
        $loans = Loan::all();  // Ambil semua peminjaman
        return view('loans.index', compact('loans'));
    }
}