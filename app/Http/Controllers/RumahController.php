<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rumah;
use App\Models\Penghuni;

class RumahController extends Controller
{
    public function index()
    {
        $rumahs = Rumah::with('penghuni')->get();
        return view('rumahs.index', compact('rumahs'));
    }

    public function create()
    {
        $penghunis = Penghuni::all();
        return view('rumahs.create', compact('penghunis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'alamat' => 'required|string|max:255',
            'status' => 'required|in:dihuni,tidak_dihuni',
            'penghuni_id' => 'nullable|exists:penghunis,id',
        ]);

        Rumah::create([
            'alamat' => $request->alamat,
            'status' => $request->status,
            'penghuni_id' => $request->penghuni_id,
        ]);

        return redirect()->route('rumahs.index')->with('success', 'Rumah created successfully.');
    }

    public function show($id)
    {
        $rumah = Rumah::with('penghuni')->findOrFail($id);
        return view('rumahs.show', compact('rumah'));
    }

    public function edit($id)
    {
        $rumah = Rumah::findOrFail($id);
        $penghunis = Penghuni::all();
        return view('rumahs.edit', compact('rumah', 'penghunis'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'alamat' => 'required|string|max:255',
            'status' => 'required|in:dihuni,tidak_dihuni',
            'penghuni_id' => 'nullable|exists:penghunis,id',
        ]);

        $rumah = Rumah::findOrFail($id);
        $rumah->update([
            'alamat' => $request->alamat,
            'status' => $request->status,
            'penghuni_id' => $request->penghuni_id,
        ]);

        return redirect()->route('rumahs.index')->with('success', 'Rumah updated successfully.');
    }

    public function destroy($id)
    {
        $rumah = Rumah::findOrFail($id);
        $rumah->delete();
        return redirect()->route('rumahs.index')->with('success', 'Rumah deleted successfully.');
    }
}
