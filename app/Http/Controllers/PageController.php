<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function dashboard()
{
    $totalBarang = \App\Models\Item::count();
    $totalUser = \App\Models\User::count();
    $totalOpname = \App\Models\OpnameSession::count();

    // Data dummy untuk grafik
    $labels = ['Jan', 'Feb', 'Mar'];
    $data = [3, 2, 4];

    return view('dashboard', compact(
        'totalBarang',
        'totalUser',
        'totalOpname',
        'labels',
        'data'
    ));
}


    public function items()
    {
        return view('items.index');
    }

    public function stockOpnames()
    {
        return view('stock.index');
    }
}
