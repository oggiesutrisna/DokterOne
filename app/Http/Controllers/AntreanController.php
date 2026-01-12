<?php

namespace App\Http\Controllers;

use App\Models\Antrean;
use App\Http\Requests\StoreAntreanRequest;
use App\Http\Requests\UpdateAntreanRequest;

class AntreanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $antreans = Antrean::with('pasien')->latest()->paginate(10);
        return view('antreans.index', compact('antreans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pasiens = \App\Models\Pasien::all();
        return view('antreans.create', compact('pasiens'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAntreanRequest $request)
    {
        Antrean::create($request->validated());

        return redirect()->route('antreans.index')->with('success', 'Antrean created successfully.');
    }

    public function wizard(\Illuminate\Http\Request $request)
    {
        $step = (int) $request->query('step', 1);
        $service = $request->query('service', '');
        $number = $request->query('number');
        $antreanId = $request->query('antrean_id');
        
        $takenNumbers = [];
        if ($step >= 2) {
            $takenNumbers = Antrean::whereDate('created_at', now())->pluck('no_antrean')->toArray();
        }

        // For demo, grab the first patient or null (safely)
        $defaultPasienId = optional(\App\Models\Pasien::first())->id;

        // For step 4 (success), load the stored antrean data
        $antrean = null;
        if ($step == 4 && $antreanId) {
            $antrean = Antrean::with('pasien')->find($antreanId);
        }

        return view('antreans', compact('step', 'service', 'number', 'takenNumbers', 'defaultPasienId', 'antrean'));
    }

    public function storeWizard(StoreAntreanRequest $request)
    {
        // For the wizard, we check if the number is already taken today
        $exists = Antrean::whereDate('created_at', now())
            ->where('no_antrean', $request->no_antrean)
            ->exists();

        if ($exists) {
            return back()->with('error', 'Number already taken')->withInput();
        }

        $antrean = Antrean::create($request->validated());

        // Redirect to step 4 (success) with the created antrean ID
        return redirect()->route('antrean.wizard', [
            'step' => 4,
            'antrean_id' => $antrean->id
        ])->with('success', 'Queue number reserved successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Antrean $antrean)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Antrean $antrean)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAntreanRequest $request, Antrean $antrean)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Antrean $antrean)
    {
        //
    }
}
