<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
{
    $items = Item::all()->map(function ($item) {
        return [
            'nama' => $item->name,
            'stokSistem' => $item->stock_sistem,
            'satuan' => $item->unit,
            'kategori' => $item->kategori ?? '-',
            'lokasi' => $item->lokasi ?? '-',
        ];
    });

    return response()->json([
        'status' => 'success',
        'data' => $items
    ]);
}

}
