<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\StockOpname;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Validator;

class StockOpnameController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|exists:items,name',
            'stock_fisik' => 'required|integer',
            'stock_sistem' => 'required|integer',
            'selisih' => 'required|integer',
            'unit' => 'required|string',
            'kategori' => 'required|string',
            'lokasi' => 'nullable|string',
            'keterangan' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $validated = $validator->validated();

        $opname = StockOpname::create([
            'name' => $validated['name'],
            'stock_fisik' => $validated['stock_fisik'],
            'stock_sistem' => $validated['stock_sistem'],
            'selisih' => $validated['selisih'],
            'unit' => $validated['unit'],
            'kategori' => $validated['kategori'],
            'lokasi' => $validated['lokasi'] ?? null,
            'keterangan' => $validated['keterangan'] ?? null,
            'user_id' => $request->user()->id,
        ]);

        return response()->json([
            'message' => 'Stock opname berhasil disimpan',
            'data' => $opname,
        ], 201);
    }
}
