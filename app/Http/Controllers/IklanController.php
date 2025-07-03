<?php

namespace App\Http\Controllers;

use App\Models\Iklan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Throwable;

class IklanController extends Controller
{
    public function index()
    {
        return view('iklan.index', [
            'iklans' => Iklan::all()
        ]);
    }

    public function create()
    {
        return view('iklan.create');
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'id_biaya_pemasaran' => 'required|integer',
                'id_platform' => 'required|integer',
                'nama' => 'required|string|max:50',
                'kategori' => 'required|string|max:100',
                'tanggal_peluncuran' => 'required|date',
                'tanggal_selesai' => 'required|date|after_or_equal:tanggal_peluncuran',
            ], [
                'tanggal_selesai.after_or_equal' => 'Tanggal selesai harus sama atau setelah tanggal peluncuran.',
            ]);

            Iklan::create($validated);

            return redirect()->route('iklan.index')
                ->with('success', 'Iklan berhasil ditambahkan!');
        } catch (Throwable $e) {
            Log::error('Error tambah iklan: '.$e->getMessage(), [
                'trace' => $e->getTraceAsString(),
                'input' => $request->all()
            ]);

            return back()->withInput()
                ->with('error', 'Gagal menambahkan iklan: '.$e->getMessage());
        }
    }
    public function show($id)
    {
        try {
            $iklan = Iklan::findOrFail($id);
            return view('iklan.show', compact('iklan'));
        } catch (ModelNotFoundException $e) {
            return redirect()->route('iklan.index')->with('error', 'Data iklan tidak ditemukan.');
        }
    }

    public function edit($id)
    {
        try {
            $iklan = Iklan::findOrFail($id);
            return view('iklan.edit', compact('iklan'));
        } catch (ModelNotFoundException $e) {
            return redirect()->route('iklan.index')->with('error', 'Data iklan tidak ditemukan.');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $validated = $request->validate([
                'id_biaya_pemasaran' => 'required|exists:biaya_pemasarans,id',
                'id_platform'        => 'required|exists:platforms,id',
                'nama'               => 'required|string|max:50',
                'kategori'           => 'required|string|max:100',
                'tanggal_peluncuran' => 'required|date',
                'tanggal_selesai'    => 'required|date|after_or_equal:tanggal_peluncuran',
            ], [
                'tanggal_selesai.after_or_equal' => 'Tanggal selesai harus sama atau setelah tanggal peluncuran.',
            ]);

            $iklan = Iklan::findOrFail($id);
            $iklan->update($validated);

            return redirect()->route('iklan.index')->with('success', 'Data iklan berhasil diperbarui.');
        } catch (ModelNotFoundException $e) {
            return redirect()->route('iklan.index')->with('error', 'Data iklan tidak ditemukan.');
        } catch (Throwable $e) {
            Log::error('Gagal memperbarui data iklan', [
                'message' => $e->getMessage(),
                'input' => $request->all(),
                'trace' => $e->getTraceAsString(),
            ]);

            return redirect()->back()->withInput()->with('error', 'Terjadi kesalahan saat memperbarui data.');
        }
    }

    public function delete($id)
    {
        try {
            $iklan = Iklan::findOrFail($id);
            return view('iklan.delete', compact('iklan'));
        } catch (ModelNotFoundException $e) {
            return redirect()->route('iklan.index')->with('error', 'Data iklan tidak ditemukan.');
        }
    }

    public function destroy($id)
    {
        try {
            $iklan = Iklan::findOrFail($id);
            $iklan->delete();

            return redirect()->route('iklan.index')->with('success', 'Data iklan berhasil dihapus.');
        } catch (ModelNotFoundException $e) {
            return redirect()->route('iklan.index')->with('error', 'Data iklan tidak ditemukan.');
        } catch (Throwable $e) {
            Log::error('Gagal menghapus data iklan', [
                'id' => $id,
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            return redirect()->route('iklan.index')->with('error', 'Terjadi kesalahan saat menghapus data.');
        }
    }
}
