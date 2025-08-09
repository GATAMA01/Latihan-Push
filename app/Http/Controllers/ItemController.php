<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ItemsImport;

class ItemController extends Controller
{
    public function showImportForm()
    {
        return view('items.import');
    }

    public function import(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'file' => 'required|mimes:xlsx,xls',
        ])->validate();

        Excel::import(new ItemsImport, $request->file('file'));

        return redirect()->route('items.index')->with('success', 'Data berhasil diimpor!');
    }

    public function index()
    {
        $items = Item::all();
        return view('items.index', compact('items'));
    }

    public function create()
    {
        return view('items.create');
    }

    public function store(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'name'          => 'required',
            'unit'          => 'required',
            'stock_sistem'  => 'required|integer',
            'kategori'      => 'nullable|string',
            'lokasi'        => 'nullable|string',
            'supplier'      => 'nullable|string',
        ])->validate();

        Item::create($validated);

        return redirect()->route('items.index')->with('success', 'Barang berhasil ditambahkan.');
    }

    public function edit(Item $item)
    {
        return view('items.edit', compact('item'));
    }

    public function update(Request $request, Item $item)
    {
        $validated = Validator::make($request->all(), [
            'name'          => 'required',
            'unit'          => 'required',
            'stock_sistem'  => 'required|integer',
            'kategori'      => 'nullable|string',
            'lokasi'        => 'nullable|string',
        ])->validate();

        $item->update($validated);

        return redirect()->route('items.index')->with('success', 'Barang berhasil diupdate.');
    }

    public function destroy(Item $item)
    {
        $item->delete();
        return redirect()->route('items.index')->with('success', 'Barang berhasil dihapus.');
    }
}
