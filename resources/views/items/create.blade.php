@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Tambah Barang</h1>

    <form action="{{ route('items.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nama Barang</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="mb-3">
            <label for="unit" class="form-label">Satuan</label>
            <input type="text" class="form-control" id="unit" name="unit" required>
        </div>

        <div class="mb-3">
            <label for="stock_sistem" class="form-label">Stok Sistem</label>
            <input type="number" class="form-control" id="stock_sistem" name="stock_sistem" value="0" required>
        </div>

        <div class="mb-3">
            <label for="kategori" class="form-label">Kategori</label>
            <input type="text" class="form-control" id="kategori" name="kategori">
        </div>

        <div class="mb-3">
            <label for="lokasi" class="form-label">Lokasi</label>
            <input type="text" class="form-control" id="lokasi" name="lokasi">
        </div>

        <div class="d-flex gap-2 mb-4">
            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="{{ route('items.index') }}" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>
@endsection
