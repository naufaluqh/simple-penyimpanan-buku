<!-- resources/views/loans/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Daftar Peminjaman Buku</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Buku</th>
                <th>User</th>
                <th>Tanggal Peminjaman</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($loans as $index => $loan)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $loan->book->title }}</td>
                    <td>{{ $loan->user->name }}</td>
                    <td>{{ $loan->borrowed_at }}</td>
                    <td>{{ $loan->book->is_borrowed ? 'Dipinjam' : 'Tersedia' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('books.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
