@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Sesi Stock Opname</h1>

    <a href="{{ route('opname-sessions.create') }}" class="btn btn-primary mb-3">+ Buat Sesi Baru</a>

    @if($sessions->count())
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama Sesi</th>
                    <th>Keterangan</th>
                    <th>Jumlah Item</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sessions as $session)
                    <tr>
                        <td>{{ $session->name }}</td>
                        <td>{{ $session->keterangan }}</td>
                        <td>{{ $session->stock_opnames_count }}</td>
                        <td>
                            <a href="{{ route('opname-sessions.show', $session->id) }}" class="btn btn-info btn-sm">Lihat</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Belum ada sesi opname.</p>
    @endif
</div>
@endsection
