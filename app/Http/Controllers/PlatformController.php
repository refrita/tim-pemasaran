<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Platform;

class PlatformController extends Controller
{
    // Menampilkan daftar semua platform
    public function index()
    {
        return view('platform.index', [
            'platform' => Platform::all()
        ]);
    }

    // Menampilkan form tambah platform
    public function create()
    {
        return view('platform.create');
    }

    // Menyimpan data platform baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_platform' => 'required|string|max:255',
            'jenis_platform' => 'required|string|max:255',
        ]);

        Platform::create([
            'nama' => $request->input('nama_platform'),
            'jenis' => $request->input('jenis_platform'),
        ]);        

        return redirect()->route('platform.index')->with('success', 'Data platform berhasil disimpan');
    }

    // Menampilkan detail platform
    public function show($id)
    {
        $platform = Platform::findOrFail($id);
        return view('platform.show', compact('platform'));
    }

    // Menampilkan form edit platform
    public function edit($id)
    {
        $platform = Platform::findOrFail($id);
        return view('platform.edit', compact('platform'));
    }

    // Memproses update data platform
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_platform' => 'required|string|max:255',
            'jenis_platform' => 'required|string|max:255',
        ]);

        $platform = Platform::findOrFail($id);

        $platform->update([
            'nama' => $request->input('nama_platform'),
            'jenis' => $request->input('jenis_platform'),
        ]);

        return redirect()->route('platform.show', $id)->with('success', 'Data platform berhasil diperbarui');
    }

    // Menampilkan halaman konfirmasi hapus
    public function delete($id)
    {
        $platform = Platform::findOrFail($id);
        return view('platform.delete', compact('platform'));
    }

    // Menghapus data platform
    public function destroy($id)
    {
        $platform = Platform::findOrFail($id);
        $platform->delete();

        return redirect()->route('platform.index')->with('success', 'Data platform berhasil dihapus');
    }
}
