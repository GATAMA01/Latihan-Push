@extends('layouts.app')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4 mb-3 fw-bold">Dashboard Stock Opname</h1>

    <!-- Kartu Ringkasan -->
    <div class="row">
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card bg-primary text-white shadow h-100 py-3 border-0">
                <div class="card-body">
                    <h6 class="card-title text-uppercase">Total Barang</h6>
                    <p class="fs-3 fw-bold">{{ $totalBarang }}</p>
                    <p class="mb-0">Barang yang terdaftar</p>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card bg-success text-white shadow h-100 py-3 border-0">
                <div class="card-body">
                    <h6 class="card-title text-uppercase">Total Pengguna</h6>
                    <p class="fs-3 fw-bold">{{ $totalUser }}</p>
                    <p class="mb-0">User aktif</p>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card bg-warning text-dark shadow h-100 py-3 border-0">
                <div class="card-body">
                    <h6 class="card-title text-uppercase">Total Stock Opname</h6>
                    <p class="fs-3 fw-bold">{{ $totalOpname }}</p>
                    <p class="mb-0">Kegiatan stock opname</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Grafik & Kalender -->
    <div class="row mt-4">
        <!-- Grafik -->
        <div class="col-lg-8">
            <div class="card shadow mb-4 border-0">
                <div class="card-header bg-info text-white fw-semibold">
                    Grafik Stock Opname / Bulan
                </div>
                <div class="card-body">
                    <canvas id="opnameChart" height="150"></canvas>
                </div>
            </div>
        </div>

        <!-- Kalender -->
        <div class="col-lg-4">
            <div class="card shadow mb-4 border-0">
                <div class="card-header bg-secondary text-white fw-semibold">
                    Kalender
                </div>
                <div class="card-body">
                    <input type="date" class="form-control">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
const ctx = document.getElementById('opnameChart').getContext('2d');
const opnameChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: {!! json_encode($labels) !!},
        datasets: [{
            label: 'Jumlah Opname',
            data: {!! json_encode($data) !!},
            backgroundColor: 'rgba(54, 162, 235, 0.7)',
            borderRadius: 6
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: { display: false }
        },
        scales: {
            y: {
                beginAtZero: true,
                ticks: { stepSize: 1 }
            }
        }
    }
});
</script>
@endpush
