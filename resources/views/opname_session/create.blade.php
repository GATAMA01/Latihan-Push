@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Buat Sesi Stock Opname</h1>

    <form action="{{ route('opname-sessions.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nama Sesi</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan</label>
            <textarea class="form-control" id="keterangan" name="keterangan" rows="3"></textarea>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('opname-sessions.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
