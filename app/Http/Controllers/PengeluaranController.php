<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengeluaran;

class PengeluaranController extends Controller
{
    public function index()
    {
        $pengeluarans = Pengeluaran::all();
        return view('pengeluarans.index', compact('pengeluarans'));
    }

    public function create()
    {
        return view('pengeluarans.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'keterangan' => 'required|string|max:255',
            'jumlah' => 'required|numeric',
            'tanggal_pengeluaran' => 'required|date',
        ]);

        Pengeluaran::create([
            'keterangan' => $request->keterangan,
            'jumlah' => $request->jumlah,
            'tanggal_pengeluaran' => $request->tanggal_pengeluaran,
        ]);

        return redirect()->route('pengeluarans.index')->with('success', 'Pengeluaran created successfully.');
    }

    public function show($id)
    {
        $pengeluaran = Pengeluaran::findOrFail($id);
        return view('pengeluarans.show', compact('pengeluaran'));
    }

    public function edit($id)
    {
        $pengeluaran = Pengeluaran::findOrFail($id);
        return view('pengeluarans.edit', compact('pengeluaran'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'keterangan' => 'required|string|max:255',
            'jumlah' => 'required|numeric',
            'tanggal_pengeluaran' => 'required|date',
        ]);

        $pengeluaran = Pengeluaran::findOrFail($id);
        $pengeluaran->update([
            'keterangan' => $request->keterangan,
            'jumlah' => $request->jumlah,
            'tanggal_pengeluaran' => $request->tanggal_pengeluaran,
        ]);

        return redirect()->route('pengeluarans.index')->with('success', 'Pengeluaran updated successfully.');
    }

    public function destroy($id)
    {
        $pengeluaran = Pengeluaran::findOrFail($id);
        $pengeluaran->delete();
        return redirect()->route('pengeluarans.index')->with('success', 'Pengeluaran deleted successfully.');
    }
}
