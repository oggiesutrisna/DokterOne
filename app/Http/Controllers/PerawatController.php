<?php

namespace App\Http\Controllers;

use App\Models\Perawat;
use App\Http\Requests\StorePerawatRequest;
use App\Http\Requests\UpdatePerawatRequest;

class PerawatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $perawats = Perawat::latest()->paginate(10);
        return view('perawats.index', compact('perawats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('perawats.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePerawatRequest $request)
    {
        Perawat::create($request->validated());

        return redirect()->route('perawats.index')->with('success', 'Perawat created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Perawat $perawat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Perawat $perawat)
    {
        return view('perawats.edit', compact('perawat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePerawatRequest $request, Perawat $perawat)
    {
        $perawat->update($request->validated());

        return redirect()->route('perawats.index')->with('success', 'Perawat updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Perawat $perawat)
    {
        //
    }
}
