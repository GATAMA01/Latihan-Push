@extends('layouts.app')

@section('content')

<style>
    html, body {
        margin: 0;
        padding: 0;
        width: 100%;
        height: 100 %;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f1f3f5;
    }

    .admin-wrapper {
        display: flex;
        min-height: 90vh;
    }

    .sidebar {
        width: 260px;
        background-color: #212529;
        color: #fff;
        padding: 1.5rem 1rem;
        position: fixed;
        top: 0;
        bottom: 0;
        left: 0;
        z-index: 1000;
    }

    .sidebar .nav-link {
        color: #adb5bd;
        padding: 10px 15px;
        margin-bottom: 8px;
        border-radius: 4px;
        transition: 0.3s;
        display: flex;
        align-items: center;
    }

    .sidebar .nav-link:hover,
    .sidebar .nav-link.active {
        background-color: #343a40;
        color: #fff;
    }

    .sidebar i {
        margin-right: 10px;
    }

    .main-content {
        margin-left: 260px;
        padding: 2rem;
        width: calc(100% - 260px);
        min-height: 100vh;
    }

    .card {
        border: none;
        transition: 0.3s;
    }

    .card:hover {
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
    }
</style>

<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

<div class="admin-wrapper">
    <!-- Sidebar -->
    <div class="sidebar">
        <h4 class="text-white mb-4">Admin Panel</h4>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <i class="bi bi-house-door"></i> Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('users.index') }}" class="nav-link {{ request()->routeIs('users.*') ? 'active' : '' }}">
                    <i class="bi bi-people"></i> Kelola Pengguna
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('items.index') }}" class="nav-link {{ request()->routeIs('items.*') ? 'active' : '' }}">
                    <i class="bi bi-box"></i> Kelola Barang
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('stock-opname.index') }}" class="nav-link {{ request()->routeIs('stock-opname.index') ? 'active' : '' }}">
                    <i class="bi bi-clipboard-data me-2"></i> Hasil Stok Opname
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="bi bi-arrow-left-right"></i> Export Data Stok
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="bi bi-box-arrow-right"></i> Logout
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <h2 class="mb-4 fw-bold">Dashboard</h2>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="card bg-primary text-white">
                    <div class="card-body">
                        <h5 class="card-title">Total Barang</h5>
                        <p class="card-text fs-4">{{ \App\Models\Item::count() }} barang</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card bg-success text-white">
                    <div class="card-body">
                        <h5 class="card-title">Total Pengguna</h5>
                        <p class="card-text fs-4">{{ \App\Models\User::count() }} user</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card bg-warning text-dark">
                    <div class="card-body">
                        <h5 class="card-title">Data Opname</h5>
                        <p class="card-text fs-4">Coming soon</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
