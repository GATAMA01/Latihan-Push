<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\User;
use App\Models\OpnameSession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $totalBarang = Item::count();
        $totalUser = User::count();
        $totalOpname = OpnameSession::distinct('session_code')->count();

        // Jika pakai Chart per bulan
        $opnameChart = DB::table('stock_opnames')
            ->selectRaw("strftime('%m', created_at) as bulan, COUNT(*) as jumlah")
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->get();

        $labels = $opnameChart->pluck('bulan')->map(function ($bulan) {
            return date("M", mktime(0, 0, 0, $bulan, 1));
        });
        $data = $opnameChart->pluck('jumlah');

        return view('dashboard', compact(
            'totalBarang',
            'totalUser',
            'totalOpname',
            'labels',
            'data'
        ));
    }
}
