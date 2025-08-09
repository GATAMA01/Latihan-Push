@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Hasil Stock Opname Per Sesi</h1>

    @forelse ($sessions as $session)
        <div class="card mb-3">
            <div class="card-header d-flex justify-content-between align-items-center">
                <strong>{{ $session->name }}</strong>
                <button class="btn btn-sm btn-primary" data-bs-toggle="collapse" data-bs-target="#detail-{{ $session->id }}">
                    Tampilkan Detail
                </button>
            </div>
            <div class="card-body collapse" id="detail-{{ $session->id }}">
                <p><strong>Keterangan:</strong> {{ $session->keterangan ?? '-' }}</p>

                @if ($session->stockOpnames->isEmpty())
                    <p class="text-muted">Tidak ada item dalam sesi ini.</p>
                @else
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm">
                            <thead class="table-light">
                                <tr>
                                    <th>Item</th>
                                    <th>Stok Fisik</th>
                                    <th>Stok Sistem</th>
                                    <th>Selisih</th>
                                    <th>Unit</th>
                                    <th>Kategori</th>
                                    <th>Lokasi</th>
                                    <th>Petugas</th>
                                    <th>Keterangan</th>
                                    <th>Tanggal / Waktu</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($session->stockOpnames as $opname)
                                    <tr>
                                        <td>{{ $opname->name }}</td>
                                        <td>{{ $opname->stock_fisik }}</td>
                                        <td>{{ $opname->stock_sistem }}</td>
                                        <td>{{ $opname->selisih }}</td>
                                        <td>{{ $opname->unit }}</td>
                                        <td>{{ $opname->kategori }}</td>
                                        <td>{{ $opname->lokasi }}</td>
                                        <td>{{ $opname->user->name ?? '-' }}</td>
                                        <td>{{ $opname->keterangan ?? '-' }}</td>
                                        <td>{{ $opname->created_at->format('d-m-Y H:i') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    @empty
        <div class="alert alert-warning">Tidak ada sesi stock opname ditemukan.</div>
    @endforelse
</div>
@endsection
