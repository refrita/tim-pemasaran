<?php

namespace App\Http\Controllers;

use App\Models\BiayaPemasaran;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;
use Throwable;

class BiayaPemasaranController extends Controller
{
    public function index(Request $request)
    {
        $biaya = BiayaPemasaran::all();
        return view('biaya-pemasaran.index', compact('biaya'));
    }

    public function create()
    {
        return view('biaya-pemasaran.create');
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'total_anggaran'    => 'required|integer|min:0',
                'anggaran_tersedia' => 'required|integer|min:0',
                'bulan_berlaku'     => 'required|date',
                'status'            => 'required|string|max:50',
            ], [
                'bulan_berlaku.date' => 'Format tanggal bulan berlaku tidak valid.',
            ]);

            BiayaPemasaran::create($validated);

            return redirect()->route('biaya-pemasaran.index')->with('success', 'Data biaya berhasil disimpan.');
        } catch (Throwable $e) {
            Log::error('Gagal menyimpan data biaya pemasaran', [
                'message' => $e->getMessage(),
                'input' => $request->all(),
                'trace' => $e->getTraceAsString(),
            ]);

            return redirect()->back()->withInput()->with('error', 'Terjadi kesalahan saat menyimpan data.');
        }
    }

    public function show($id)
    {
        try {
            $biaya = BiayaPemasaran::findOrFail($id);
            return view('biaya-pemasaran.show', compact('biaya'));
        } catch (ModelNotFoundException $e) {
            return redirect()->route('biaya-pemasaran.index')->with('error', 'Data biaya tidak ditemukan.');
        }
    }

    public function edit($id)
    {
        try {
            $biaya = BiayaPemasaran::findOrFail($id);
            return view('biaya-pemasaran.edit', compact('biaya'));
        } catch (ModelNotFoundException $e) {
            return redirect()->route('biaya-pemasaran.index')->with('error', 'Data biaya tidak ditemukan.');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $validated = $request->validate([
                'total_anggaran'    => 'required|integer|min:0',
                'anggaran_tersedia' => 'required|integer|min:0',
                'bulan_berlaku'     => 'required|date',
                'status'            => 'required|string|max:50',
            ], [
                'bulan_berlaku.date' => 'Format tanggal bulan berlaku tidak valid.',
            ]);

            $biaya = BiayaPemasaran::findOrFail($id);
            $biaya->update($validated);

            return redirect()->route('biaya-pemasaran.index')->with('success', 'Data biaya berhasil diperbarui.');
        } catch (ModelNotFoundException $e) {
            return redirect()->route('biaya-pemasaran.index')->with('error', 'Data biaya tidak ditemukan.');
        } catch (Throwable $e) {
            Log::error('Gagal memperbarui data biaya pemasaran', [
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
            $biaya = BiayaPemasaran::findOrFail($id);
            return view('biaya-pemasaran.delete', compact('biaya'));
        } catch (ModelNotFoundException $e) {
            return redirect()->route('biaya-pemasaran.index')->with('error', 'Data biaya tidak ditemukan.');
        }
    }

    public function destroy($id)
    {
        try {
            $biaya = BiayaPemasaran::findOrFail($id);
            $biaya->delete();

            return redirect()->route('biaya-pemasaran.index')->with('success', 'Data biaya berhasil dihapus.');
        } catch (ModelNotFoundException $e) {
            return redirect()->route('biaya-pemasaran.index')->with('error', 'Data biaya tidak ditemukan.');
        } catch (Throwable $e) {
            Log::error('Gagal menghapus data biaya pemasaran', [
                'id' => $id,
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            return redirect()->route('biaya-pemasaran.index')->with('error', 'Terjadi kesalahan saat menghapus data.');
        }
    }
}
