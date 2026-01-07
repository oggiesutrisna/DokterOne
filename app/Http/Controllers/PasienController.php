<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePasienRequest;
use App\Http\Requests\UpdatePasienRequest;
use App\Models\Pasien;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $pasiens = Pasien::orderBy('id', 'DESC')->paginate(5);

        if(request('search')) {
            $pasiens->where('title' , 'like' , '%' . request('search') . '%');
        }

        return view('pasiens.index', compact('pasiens'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    public function create()
    {
        if (Pasien::count() >= 4) {
            return redirect()->route('pasiens.index')->with('error', 'Limit reached! You have reached the maximum of 4 patients. Please purchase the full package to add more.');
        }

        return view('pasiens.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePasienRequest $request)
    {
        if (Pasien::count() >= 4) {
            return redirect()->route('pasiens.index')->with('error', 'Limit reached! You have reached the maximum of 4 patients. Please purchase the full package to add more.');
        }

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
    public function update(UpdatePasienRequest $request, Pasien $pasien)
    {
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
