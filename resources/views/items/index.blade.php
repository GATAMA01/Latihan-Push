@extends('layouts.app')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

<style>
    .table thead th {
        background-color: #343a40;
        color: white;
    }

    .table td, .table th {
        vertical-align: middle;
    }

    .btn-sm {
        padding: 0.25rem 0.5rem;
        font-size: 0.875rem;
    }

    .btn-outline-secondary:hover {
        color: white;
    }
</style>

<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="fw-bold">Kelola Barang</h4>
        <div>
            <a href="{{ route('items.create') }}" class="btn btn-primary me-2">
                <i class="bi bi-plus-circle"></i> Tambah Barang
            </a>
           <a href="{{ route('items.import.form') }}" class="btn btn-success">
                <i class="bi bi-file-earmark-arrow-up"></i> Import Excel
            </a>
        </div>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover align-middle">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Satuan</th>
                    <th>Stok Sistem</th>
                    <th>Kategori</th>
                    <th>Lokasi</th>
                    <th width="130">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->unit }}</td>
                        <td>{{ $item->stock_sistem }}</td>
                        <td>{{ $item->kategori ?? '-' }}</td>
                        <td>{{ $item->lokasi ?? '-' }}</td>
                        <td>
                            <a href="{{ route('items.edit', $item->id) }}" class="btn btn-sm btn-warning">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <form action="{{ route('items.destroy', $item->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Yakin ingin hapus barang ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                @if ($items->isEmpty())
                    <tr>
                        <td colspan="9" class="text-center text-muted">Belum ada barang.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection
