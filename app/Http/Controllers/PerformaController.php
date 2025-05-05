<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Performa;

class PerformaController extends Controller
{
    // Menampilkan daftar semua performa
    public function index()
    {
        return view('performa.index', [
            'performa' => Performa::all()
        ]);
    }

    // Menampilkan form tambah performa
    public function create()
    {
        return view('performa.create');
    }

    // Menyimpan data performa baru
    public function store(Request $request)
    {
        $request->validate([
            'jumlah_tayang' => 'required|integer',
            'jumlah_klik' => 'required|integer',
            'konversi' => 'required|numeric',
            'tanggal' => 'required|date',
        ]);

        Performa::create([
            'jumlah_tayang' => $request->jumlah_tayang,
            'jumlah_klik' => $request->jumlah_klik,
            'konversi' => $request->konversi,
            'tanggal' => $request->tanggal,
        ]);
                
        return redirect()->route('performa.index')->with('success', 'Data performa berhasil disimpan');
    }

        // Menampilkan detail performa
    public function show($id)
    {
        $performa = Performa::findOrFail($id);
        return view('performa.show', compact('performa'));
    }

    // Menampilkan form edit performa
    public function edit($id)
    {
        $performa = Performa::findOrFail($id);
        return view('performa.edit', compact('performa'));
    }

    // Memproses update data performa
    public function update(Request $request, $id)
    {
        $request->validate([
            'jumlah_tayang' => 'required|integer',
            'jumlah_klik' => 'required|integer',
            'konversi' => 'required|numeric',
            'tanggal' => 'required|date',
        ]);

        $performa = Performa::findOrFail($id);

        $performa->update([
            'jumlah_tayang' => $request->input('jumlah_tayang'),
            'jumlah_klik' => $request->input('jumlah_klik'),
            'konversi' => $request->input('konversi'),
            'tanggal' => $request->input('tanggal'),
        ]);

        return redirect()->route('performa.show', $id)->with('success', 'Data performa berhasil diperbarui');
    }

    // Menampilkan halaman konfirmasi hapus
    public function delete($id)
    {
        $performa = Performa::findOrFail($id);
        return view('performa.delete', compact('performa'));
    }

    // Menghapus data performa
    public function destroy($id)
    {
        $performa = Performa::findOrFail($id);
        $performa->delete();

        return redirect()->route('performa.index')->with('success', 'Data performa berhasil dihapus');
    }
}
