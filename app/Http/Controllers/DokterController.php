<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Http\Requests\StoreDokterRequest;
use App\Http\Requests\UpdateDokterRequest;

class DokterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dokters = Dokter::latest()->paginate(10);
        return view('dokters.index', compact('dokters'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dokters.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDokterRequest $request)
    {
        Dokter::create($request->validated());

        return redirect()->route('dokters.index')->with('success', 'Dokter created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Dokter $dokter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dokter $dokter)
    {
        return view('dokters.edit', compact('dokter'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDokterRequest $request, Dokter $dokter)
    {
        $dokter->update($request->validated());

        return redirect()->route('dokters.index')->with('success', 'Dokter updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dokter $dokter)
    {
        //
    }
}
