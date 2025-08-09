@extends('layouts.app')

@section('title', 'Impor Data Barang')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">📥 Impor Data Barang</h2>

    {{-- Tampilkan pesan sukses --}}
    @if (session('success'))
        <div class="alert alert-success">
            ✅ {{ session('success') }}
        </div>
    @endif

    {{-- Tampilkan error validasi --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>⚠️ Terjadi kesalahan:</strong>
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>🚫 {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Form Upload --}}
    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('items.import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-3">
                    <label for="file">Pilih file Excel (.xlsx, .xls)</label>
                    <input type="file" name="file" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-success">
                    <i class="fas fa-file-import"></i> Impor Sekarang
                </button>
                <a href="{{ route('items.index') }}" class="btn btn-secondary ms-2">← Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection
