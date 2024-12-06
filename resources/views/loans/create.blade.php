<!-- resources/views/loans/create.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Form Peminjaman Buku</h2>

    <form action="{{ route('loan.store', $book->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="user_id">User ID</label>
            <input type="number" name="user_id" id="user_id" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="borrowed_at">Tanggal Peminjaman</label>
            <input type="date" name="borrowed_at" id="borrowed_at" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Pinjam Buku</button>
    </form>
</div>
@endsection
