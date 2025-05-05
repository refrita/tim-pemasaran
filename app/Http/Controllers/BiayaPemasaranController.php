<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BiayaPemasaran;

class BiayaPemasaranController extends Controller
{
    public function index()
    {
        return view('biaya-pemasaran.index', [
            'biaya' => BiayaPemasaran::all()
        ]);
    }

    public function create()
    {
        return view('biaya-pemasaran.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'total_anggaran' => 'required|integer',
            'anggaran_tersedia' => 'required|integer',
            'bulan_berlaku' => 'required|date',
            'status' => 'required|string|max:50',
        ]);

        BiayaPemasaran::create($request->all());

        return redirect()->route('biaya-pemasaran.index')->with('success', 'Data biaya berhasil disimpan');
    }

    public function show($id)
    {
        $biaya = BiayaPemasaran::findOrFail($id);
        return view('biaya-pemasaran.show', compact('biaya'));
    }

    public function edit($id)
    {
        $biaya = BiayaPemasaran::findOrFail($id);
        return view('biaya-pemasaran.edit', compact('biaya'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'total_anggaran' => 'required|integer',
            'anggaran_tersedia' => 'required|integer',
            'bulan_berlaku' => 'required|date',
            'status' => 'required|string|max:50',
        ]);

        $biaya = BiayaPemasaran::findOrFail($id);
        $biaya->update($request->all());

        return redirect()->route('biaya-pemasaran.show', $id)->with('success', 'Data biaya berhasil diperbarui');
    }

    public function delete($id)
    {
        $biaya = BiayaPemasaran::findOrFail($id);
        return view('biaya-pemasaran.delete', compact('biaya'));
    }

    public function destroy($id)
    {
        $biaya = BiayaPemasaran::findOrFail($id);
        $biaya->delete();

        return redirect()->route('biaya-pemasaran.index')->with('success', 'Data biaya berhasil dihapus');
    }
}
