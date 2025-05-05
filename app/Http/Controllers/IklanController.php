<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Iklan;

class IklanController extends Controller
{
    // Menampilkan daftar semua iklan
    public function index()
    {
        return view('iklan.index', [
            'iklan' => Iklan::all()
        ]);
    }

    // Menampilkan form tambah iklan
    public function create()
    {
        return view('iklan.create');
    }

    // Menyimpan data iklan baru
    public function store(Request $request)
    {
        $request->validate([
            'id_biaya_pemasaran' => 'required|integer',
            'id_platform' => 'required|integer',
            'nama' => 'required|string|max:50',
            'kategori' => 'required|string|max:100',
            'tanggal_peluncuran' => 'required|date',
            'tanggal_selesai' => 'required|date',
        ]);

        Iklan::create([
            'id_biaya_pemasaran' => $request->id_biaya_pemasaran,
            'id_platform' => $request->id_platform,
            'nama' => $request->nama,
            'kategori' => $request->kategori,
            'tanggal_peluncuran' => $request->tanggal_peluncuran,
            'tanggal_selesai' => $request->tanggal_selesai,
        ]);

        return redirect()->route('iklan.index')->with('success', 'Data iklan berhasil disimpan');
    }

    // Menampilkan detail iklan
    public function show($id)
    {
        $iklan = Iklan::findOrFail($id);
        return view('iklan.show', compact('iklan'));
    }

    // Menampilkan form edit iklan
    public function edit($id)
    {
        $iklan = Iklan::findOrFail($id);
        return view('iklan.edit', compact('iklan'));
    }

    // Memproses update data iklan
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_biaya_pemasaran' => 'required|integer',
            'id_platform' => 'required|integer',
            'nama' => 'required|string|max:50',
            'kategori' => 'required|string|max:100',
            'tanggal_peluncuran' => 'required|date',
            'tanggal_selesai' => 'required|date',
        ]);

        $iklan = Iklan::findOrFail($id);

        $iklan->update([
            'id_biaya_pemasaran' => $request->id_biaya_pemasaran,
            'id_platform' => $request->id_platform,
            'nama' => $request->nama,
            'kategori' => $request->kategori,
            'tanggal_peluncuran' => $request->tanggal_peluncuran,
            'tanggal_selesai' => $request->tanggal_selesai,
        ]);

        return redirect()->route('iklan.show', $id)->with('success', 'Data iklan berhasil diperbarui');
    }

    // Menampilkan halaman konfirmasi hapus
    public function delete($id)
    {
        $iklan = Iklan::findOrFail($id);
        return view('iklan.delete', compact('iklan'));
    }

    // Menghapus data iklan
    public function destroy($id)
    {
        $iklan = Iklan::findOrFail($id);
        $iklan->delete();

        return redirect()->route('iklan.index')->with('success', 'Data iklan berhasil dihapus');
    }
}
