<?php

namespace App\Http\Controllers;

use App\Models\Performa;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;
use Throwable;

class PerformaController extends Controller
{
    public function index()
    {
        $performa = Performa::all();
        return view('performa.index', compact('performa'));
    }

    public function create()
    {
        return view('performa.create');
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'jumlah_tayang' => 'required|integer|min:0',
                'jumlah_klik'   => 'required|integer|min:0',
                'konversi'      => 'required|numeric|min:0',
                'tanggal'       => 'required|date',
                'id_platform'   => 'required|exists:platforms,id',
            ]);

            Performa::create($validated);

            return redirect()->route('performa.index')->with('success', 'Data performa berhasil disimpan.');
        } catch (Throwable $e) {
            Log::error('Gagal menyimpan data performa', [
                'message' => $e->getMessage(),
                'input'   => $request->all(),
                'trace'   => $e->getTraceAsString(),
            ]);

            return redirect()->back()->withInput()->with('error', 'Terjadi kesalahan saat menyimpan data.');
        }
    }

    public function show($id)
    {
        try {
            $performa = Performa::findOrFail($id);
            return view('performa.show', compact('performa'));
        } catch (ModelNotFoundException $e) {
            return redirect()->route('performa.index')->with('error', 'Data performa tidak ditemukan.');
        }
    }

    public function edit($id)
    {
        try {
            $performa = Performa::findOrFail($id);
            return view('performa.edit', compact('performa'));
        } catch (ModelNotFoundException $e) {
            return redirect()->route('performa.index')->with('error', 'Data performa tidak ditemukan.');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $validated = $request->validate([
                'jumlah_tayang' => 'required|integer|min:0',
                'jumlah_klik'   => 'required|integer|min:0',
                'konversi'      => 'required|numeric|min:0',
                'tanggal'       => 'required|date',
                'id_platform'   => 'required|exists:platforms,id',
            ]);

            $performa = Performa::findOrFail($id);
            $performa->update($validated);

            return redirect()->route('performa.index')->with('success', 'Data performa berhasil diperbarui.');
        } catch (ModelNotFoundException $e) {
            return redirect()->route('performa.index')->with('error', 'Data performa tidak ditemukan.');
        } catch (Throwable $e) {
            Log::error('Gagal memperbarui data performa', [
                'message' => $e->getMessage(),
                'input'   => $request->all(),
                'trace'   => $e->getTraceAsString(),
            ]);

            return redirect()->back()->withInput()->with('error', 'Terjadi kesalahan saat memperbarui data.');
        }
    }

    public function delete($id)
    {
        try {
            $performa = Performa::findOrFail($id);
            return view('performa.delete', compact('performa'));
        } catch (ModelNotFoundException $e) {
            return redirect()->route('performa.index')->with('error', 'Data performa tidak ditemukan.');
        }
    }

    public function destroy($id)
    {
        try {
            TimPemasaran::create($validated);

            return redirect()->route('tim-pemasaran.index')->with('success', 'Data tim pemasaran berhasil disimpan.');
        } catch (Throwable $e) {
            Log::error('Gagal menyimpan tim pemasaran', [
                'input' => $request->all(),
                'message' => $e->getMessage(),
            ]);

            return redirect()->back()->withInput()->with('error', 'Terjadi kesalahan saat menyimpan data.');
        }
    }
}
