<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembayaran;
use App\Models\Penghuni;

class PembayaranController extends Controller
{
    public function index()
    {
        $pembayarans = Pembayaran::with('penghuni')->get();
        return view('pembayarans.index', compact('pembayarans'));
    }

    public function create()
    {
        $penghunis = Penghuni::all();
        return view('pembayarans.create', compact('penghunis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'penghuni_id' => 'required|exists:penghunis,id',
            'jenis_iuran' => 'required|in:kebersihan,satpam',
            'jumlah' => 'required|numeric',
            'tanggal_pembayaran' => 'required|date',
        ]);

        Pembayaran::create([
            'penghuni_id' => $request->penghuni_id,
            'jenis_iuran' => $request->jenis_iuran,
            'jumlah' => $request->jumlah,
            'tanggal_pembayaran' => $request->tanggal_pembayaran,
        ]);

        return redirect()->route('pembayarans.index')->with('success', 'Pembayaran created successfully.');
    }

    public function show($id)
    {
        $pembayaran = Pembayaran::with('penghuni')->findOrFail($id);
        return view('pembayarans.show', compact('pembayaran'));
    }

    public function edit($id)
    {
        $pembayaran = Pembayaran::findOrFail($id);
        $penghunis = Penghuni::all();
        return view('pembayarans.edit', compact('pembayaran', 'penghunis'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'penghuni_id' => 'required|exists:penghunis,id',
            'jenis_iuran' => 'required|in:kebersihan,satpam',
            'jumlah' => 'required|numeric',
            'tanggal_pembayaran' => 'required|date',
        ]);

        $pembayaran = Pembayaran::findOrFail($id);
        $pembayaran->update([
            'penghuni_id' => $request->penghuni_id,
            'jenis_iuran' => $request->jenis_iuran,
            'jumlah' => $request->jumlah,
            'tanggal_pembayaran' => $request->tanggal_pembayaran,
        ]);

        return redirect()->route('pembayarans.index')->with('success', 'Pembayaran updated successfully.');
    }

    public function destroy($id)
    {
        $pembayaran = Pembayaran::findOrFail($id);
        $pembayaran->delete();
        return redirect()->route('pembayarans.index')->with('success', 'Pembayaran deleted successfully.');
    }
}
