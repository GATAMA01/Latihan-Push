<?php

namespace App\Http\Controllers;

use App\Models\OpnameSession;
use Illuminate\Http\Request;

class StockOpnameController extends Controller
{
    public function index()
    {
        // Ambil semua sesi beserta relasi stock_opnames-nya
        $sessions = OpnameSession::with('stockOpnames')->latest()->get();

        return view('stock_opname.index', compact('sessions'));
    }
}
