<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pasiens = Pasien::orderBy('id', 'DESC')->paginate(5);
        return view('pasiens.index', compact('pasiens'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pasiens.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nosurat' => 'required|max:255',
            'nama' => 'required|max:255',
            'sampling_time' => 'required|max:255',
            'dob' => 'required|max:255',
            'nomor_pid' => 'required|max:255',
            'jenis_kelamin' => 'required|max:255',
            'nationality' => 'required|max:255',
            'jenis_pemeriksaan' => 'required|max:255',
            'result' => 'required|max:255',
        ]);
        Pasien::create($request->all());
        return redirect()->route('pasiens.index')->with('success', 'Data pasien berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function show(Pasien $pasien)
    {
        return view('pasiens.show', compact('pasien'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function edit(Pasien $pasien)
    {
        return view('pasiens.edit', compact('pasien'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pasien $pasien)
    {
        $request->validate([
            'nama' => 'required|max:255',
            'dob' => 'required|max:255',
            'jenis_kelamin' => 'required|max:255',
            'jenis_pemeriksaan' => 'required|max:255',
            'sampling_time' => 'required|max:255',
            'nomor_pid' => 'required|max:255',
            'nationality' => 'required|max:255',
            'result' => 'required|max:255',
        ]);
        $pasien->update($request->all());
        return redirect()->route('pasiens.index')->with('success', 'Data pasien berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pasien $pasien)
    {
        $pasien->delete();
        return redirect()->route('pasiens.index')->with('success', 'Data pasien berhasil dihapus!');
    }
}
