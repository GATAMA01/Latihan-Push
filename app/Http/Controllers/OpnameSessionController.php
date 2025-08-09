<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OpnameSessionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sessions = OpnameSession::withCount('stockOpnames')->latest()->get();
        return view('opname_sessions.index', compact('sessions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('opname_sessions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'keterangan' => 'nullable|string',
        ]);

        $session = OpnameSession::create($request->all());

        return redirect()->route('opname-sessions.show', $session->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $stockOpnames = $opnameSession->stockOpnames()->with(['item', 'user'])->get();
        return view('opname_sessions.show', compact('opnameSession', 'stockOpnames'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
