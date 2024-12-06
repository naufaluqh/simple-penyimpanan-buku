<!-- resources/views/loans/edit.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Peminjaman Buku</h1>

    <!-- Menampilkan error validasi -->
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('loans.update', $loan->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="user_id">Peminjam:</label>
            <select name="user_id" class="form-control" id="user_id" required>
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ $loan->user_id == $user->id ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="borrowed_at">Tanggal Peminjaman:</label>
            <input type="date" name="borrowed_at" class="form-control" id="borrowed_at" value="{{ $loan->borrowed_at->format('Y-m-d') }}" required>
        </div>

        <button type="submit" class="btn btn-success">Simpan Perubahan</button>
    </form>

    <a href="{{ route('loans.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
