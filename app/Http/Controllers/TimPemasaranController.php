<?php

namespace App\Http\Controllers;

use App\Models\TimPemasaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;
use Throwable;

class TimPemasaranController extends Controller
{
    public function index()
    {
        $tim = TimPemasaran::all();
        return view('tim-pemasaran.index', compact('tim'));
    }

    public function create()
    {
        return view('tim-pemasaran.create');
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'id_biaya_pemasaran' => 'required|exists:biaya_pemasarans,id',
                'id_platform'        => 'required|exists:platforms,id',
                'nama_pengguna' => 'required|string|max:100|unique:tim_pemasarans,nama_pengguna', // store
                'jabatan_anggota'    => 'required|string|max:100',
                'nama_pengguna'      => 'required|string|max:100',
                'kata_sandi'         => 'required|string|max:100',
            ]);

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

    public function show($id)
    {
        try {
            $tim = TimPemasaran::findOrFail($id);
            return view('tim-pemasaran.show', compact('tim'));
        } catch (ModelNotFoundException $e) {
            return redirect()->route('tim-pemasaran.index')->with('error', 'Data tim pemasaran tidak ditemukan.');
        }
    }

    public function edit($id)
    {
        try {
            $tim = TimPemasaran::findOrFail($id);
            return view('tim-pemasaran.edit', compact('tim'));
        } catch (ModelNotFoundException $e) {
            return redirect()->route('tim-pemasaran.index')->with('error', 'Data tim pemasaran tidak ditemukan.');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $validated = $request->validate([
                'id_biaya_pemasaran' => 'required|exists:biaya_pemasarans,id',
                'id_platform'        => 'required|exists:platforms,id',
                'nama_anggota'       => 'required|string|max:100',
                'jabatan_anggota'    => 'required|string|max:100',
                'nama_pengguna' => 'required|string|max:100|unique:tim_pemasarans,nama_pengguna,' . $id, // update
                'kata_sandi'         => 'nullable|string|max:100',
            ]);

            $tim = TimPemasaran::findOrFail($id);

            if (empty($validated['kata_sandi'])) {
                unset($validated['kata_sandi']);
            }

            $tim->update($validated);

            return redirect()->route('tim-pemasaran.index')->with('success', 'Data tim pemasaran berhasil diperbarui.');
        } catch (ModelNotFoundException $e) {
            return redirect()->route('tim-pemasaran.index')->with('error', 'Data tim pemasaran tidak ditemukan.');
        } catch (Throwable $e) {
            Log::error('Gagal memperbarui tim pemasaran', [
                'id' => $id,
                'input' => $request->all(),
                'message' => $e->getMessage(),
            ]);

            return redirect()->back()->withInput()->with('error', 'Terjadi kesalahan saat memperbarui data.');
        }
    }

    public function delete($id)
    {
        try {
            $tim = TimPemasaran::findOrFail($id);
            return view('tim-pemasaran.delete', compact('tim'));
        } catch (ModelNotFoundException $e) {
            return redirect()->route('tim-pemasaran.index')->with('error', 'Data tim pemasaran tidak ditemukan.');
        }
    }

    public function destroy($id)
    {
        try {
            $tim = TimPemasaran::findOrFail($id);
            $tim->delete();

            return redirect()->route('tim-pemasaran.index')->with('success', 'Data tim pemasaran berhasil dihapus.');
        } catch (ModelNotFoundException $e) {
            return redirect()->route('tim-pemasaran.index')->with('error', 'Data tim pemasaran tidak ditemukan.');
        } catch (Throwable $e) {
            Log::error('Gagal menghapus tim pemasaran', [
                'id' => $id,
                'message' => $e->getMessage(),
            ]);

            return redirect()->route('tim-pemasaran.index')->with('error', 'Terjadi kesalahan saat menghapus data.');
        }
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        $tim = TimPemasaran::where(function ($query) use ($keyword) {
            if (is_numeric($keyword)) {
                $query->where('id', $keyword);
            }

            $query->orWhere('nama_pengguna', 'LIKE', "%$keyword%")
                  ->orWhere('nama_anggota', 'LIKE', "%$keyword%");
        })->first();

        if (!$tim) {
            return redirect()->route('tim-pemasaran.index')->with('error', "Data tidak ditemukan untuk kata kunci: \"$keyword\"");
        }

        return view('tim-pemasaran.show', compact('tim'));
    }
}
