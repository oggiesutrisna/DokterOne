<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAntreanRequest;
use App\Http\Requests\UpdateAntreanRequest;
use App\Models\Antrean;

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
        $pasienId = $request->query('pasien_id');
        $searchQuery = $request->query('search', '');

        // Search patients for step 1
        $pasiens = collect();
        if ($step == 1 && $searchQuery) {
            $pasiens = \App\Models\Pasien::where('nama', 'like', "%{$searchQuery}%")
                ->orWhere('nomor_pid', 'like', "%{$searchQuery}%")
                ->limit(10)
                ->get();
        }

        // Get selected patient
        $selectedPasien = null;
        if ($pasienId) {
            $selectedPasien = \App\Models\Pasien::find($pasienId);
        }

        // Validate patient is selected before proceeding past step 1
        if ($step >= 2 && ! $selectedPasien) {
            return redirect()->route('antrean.wizard', ['step' => 1])
                ->with('error', 'Please identify the patient first.');
        }

        $takenNumbers = [];
        if ($step >= 3) {
            $takenNumbers = Antrean::whereDate('created_at', now())->pluck('no_antrean')->toArray();
        }

        $antrean = null;
        if ($step == 5 && $antreanId) {
            $antrean = Antrean::with('pasien')->find($antreanId);
        }

        return view('antreans', compact(
            'step',
            'service',
            'number',
            'takenNumbers',
            'pasienId',
            'selectedPasien',
            'pasiens',
            'searchQuery',
            'antrean'
        ));
    }

    public function storeWizard(StoreAntreanRequest $request)
    {
        $exists = Antrean::whereDate('created_at', now())
            ->where('no_antrean', $request->no_antrean)
            ->exists();

        if ($exists) {
            return back()->with('error', 'Number already taken')->withInput();
        }

        $antrean = Antrean::create($request->validated());

        return redirect()->route('antrean.wizard', [
            'step' => 5,
            'antrean_id' => $antrean->id,
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
