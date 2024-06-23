<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penghuni;
use Illuminate\Support\Facades\Storage;

class PenghuniController extends Controller
{
    public function index()
    {
        $penghunis = Penghuni::all();
        return view('penghunis.index', compact('penghunis'));
    }

    public function create()
    {
        return view('penghunis.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'foto_ktp' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required|in:tetap,kontrak',
            'nomor_telepon' => 'required|string|max:15',
            'sudah_menikah' => 'required|boolean',
        ]);

        if ($request->hasFile('foto_ktp')) {
            $path = $request->file('foto_ktp')->store('ktp');
        } else {
            $path = null;
        }

        Penghuni::create([
            'nama_lengkap' => $request->nama_lengkap,
            'foto_ktp' => $path,
            'status' => $request->status,
            'nomor_telepon' => $request->nomor_telepon,
            'sudah_menikah' => $request->sudah_menikah,
        ]);

        return redirect()->route('penghunis.index')->with('success', 'Penghuni created successfully.');
    }

    public function show($id)
    {
        $penghuni = Penghuni::findOrFail($id);
        return view('penghunis.show', compact('penghuni'));
    }

    public function edit($id)
    {
        $penghuni = Penghuni::findOrFail($id);
        return view('penghunis.edit', compact('penghuni'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'foto_ktp' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required|in:tetap,kontrak',
            'nomor_telepon' => 'required|string|max:15',
            'sudah_menikah' => 'required|boolean',
        ]);

        $penghuni = Penghuni::findOrFail($id);

        if ($request->hasFile('foto_ktp')) {
            if ($penghuni->foto_ktp) {
                Storage::delete($penghuni->foto_ktp);
            }
            $path = $request->file('foto_ktp')->store('ktp');
        } else {
            $path = $penghuni->foto_ktp;
        }

        $penghuni->update([
            'nama_lengkap' => $request->nama_lengkap,
            'foto_ktp' => $path,
            'status' => $request->status,
            'nomor_telepon' => $request->nomor_telepon,
            'sudah_menikah' => $request->sudah_menikah,
        ]);

        return redirect()->route('penghunis.index')->with('success', 'Penghuni updated successfully.');
    }

    public function destroy($id)
    {
        $penghuni = Penghuni::findOrFail($id);
        if ($penghuni->foto_ktp) {
            Storage::delete($penghuni->foto_ktp);
        }
        $penghuni->delete();
        return redirect()->route('penghunis.index')->with('success', 'Penghuni deleted successfully.');
    }
}
