<?php

namespace App\Http\Controllers;

use App\Models\RumahSakit;
use Illuminate\Http\Request;

class RumahSakitController extends Controller
{
    public function index()
    {
        $rumahSakits = RumahSakit::all();
        return view('rumahsakit.index', compact('rumahSakits'));
    }

    public function create()
    {
        return view('rumahsakit.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'email' => 'required|email',
            'telepon' => 'required|string|max:20',
        ]);

        RumahSakit::create($validated);

        return redirect()->route('rumahsakit.index')
            ->with('success', 'Data rumah sakit berhasil ditambahkan!');
    }



    public function edit(RumahSakit $rumahsakit)
    {
        return view('rumahsakit.edit', compact('rumahsakit'));
    }

    public function update(Request $request, RumahSakit $rumahsakit)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'email' => 'nullable|email',
            'telepon' => 'nullable',
        ]);

        $rumahsakit->update($request->all());

        return redirect()->route('rumahsakit.index')->with('success', 'Data Rumah Sakit berhasil diperbarui');
    }

    public function destroy(RumahSakit $rumahsakit)
    {
        $rumahsakit->delete();

        return redirect()->route('rumahsakit.index')->with('success', 'Data Rumah Sakit berhasil dihapus');
    }
}
