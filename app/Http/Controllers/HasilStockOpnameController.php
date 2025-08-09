<?php

namespace App\Http\Controllers;

use App\Models\OpnameSession;

class HasilStockOpnameController extends Controller
{
    /**
     * Menampilkan hasil stock opname per sesi.
     */
    public function index()
    {
        // Ambil semua sesi beserta data stock opname dan user yang terkait
        $sessions = OpnameSession::with(['stockOpnames.user'])->latest()->get();

        return view('stock_opname.index', compact('sessions'));
    }
}
