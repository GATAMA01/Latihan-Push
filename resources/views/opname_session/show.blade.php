@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Sesi: {{ $opnameSession->name }}</h1>
    <p><strong>Keterangan:</strong> {{ $opnameSession->keterangan }}</p>

    <h4>Data Stock Opname</h4>
    @if($stockOpnames->count())
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nama Barang</th>
                    <th>Stok Sistem</th>
                    <th>Stok Fisik</th>
                    <th>Selisih</th>
                    <th>Unit</th>
                    <th>Kategori</th>
                    <th>Lokasi</th>
                    <th>Petugas</th>
                </tr>
            </thead>
            <tbody>
                @foreach($stockOpnames as $opname)
                    <tr>
                        <td>{{ $opname->item->name ?? '-' }}</td>
                        <td>{{ $opname->stock_sistem }}</td>
                        <td>{{ $opname->stock_fisik }}</td>
                        <td>{{ $opname->selisih }}</td>
                        <td>{{ $opname->unit }}</td>
                        <td>{{ $opname->kategori }}</td>
                        <td>{{ $opname->lokasi }}</td>
                        <td>{{ $opname->user->name ?? '-' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Tidak ada data stock opname pada sesi ini.</p>
    @endif
</div>
@endsection
