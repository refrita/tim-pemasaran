<?php

namespace App\Http\Controllers;

use App\Models\BiayaPemasaran; // Tambahkan ini
use App\Models\Platform;
use App\Models\TimPemasaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Throwable;

class TimPemasaranController extends Controller
{
    public function index()
    {
        $tim = TimPemasaran::with(['biayaPemasaran', 'platform'])
              ->paginate(10); // 10 item per halaman
        return view('tim-pemasaran.index', compact('tim'));
    }

    public function create()
    {
        return view('tim-pemasaran.create', [
        'biaya_pemasarans' => BiayaPemasaran::where('total_anggaran', '>', 0)
                                ->orderBy('bulan_berlaku', 'desc')
                                ->get(),
        'platforms' => Platform::all()
        ]);
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'id_biaya_pemasaran' => 'required|exists:biaya_pemasarans,id,total_anggaran,>0',
                'id_platform'        => 'required|exists:platforms,id',
                'nama_anggota'       => 'required|string|max:100',
                'jabatan_anggota'    => 'required|string|max:100',
                'nama_pengguna'      => 'required|string|max:100|unique:tim_pemasarans,nama_pengguna',
                'kata_sandi'         => 'required|string|min:8|confirmed',
            ]);

            // Enkripsi password
            $validated['kata_sandi'] = Hash::make($validated['kata_sandi']);

            TimPemasaran::create($validated);

            return redirect()->route('tim-pemasaran.index')
                   ->with('success', 'Data tim pemasaran berhasil disimpan.');
        } catch (Throwable $e) {
            Log::error('Gagal menyimpan tim pemasaran', [
                'input' => $request->all(),
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return redirect()->back()
                   ->withInput()
                   ->with('error', 'Data tim pemasaran gagal disimpan.');
        }
    }

    public function show($id)
    {
        $tim = TimPemasaran::with(['biayaPemasaran', 'platform'])->findOrFail($id);
        return view('tim-pemasaran.show', compact('tim'));
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
            $rules = [
                'id_biaya_pemasaran' => 'required|exists:biaya_pemasarans,id',
                'id_platform'        => 'required|exists:platforms,id',
                'nama_anggota'       => 'required|string|max:100',
                'jabatan_anggota'    => 'required|string|max:100',
                'nama_pengguna'      => 'required|string|max:100|unique:tim_pemasarans,nama_pengguna,'.$id,
            ];

            // Tambahkan validasi password jika diisi
            if ($request->filled('kata_sandi')) {
                $rules['kata_sandi'] = 'string|min:8|confirmed';
            }

            $validated = $request->validate($rules);

            $tim = TimPemasaran::findOrFail($id);

            // Update password hanya jika diisi
            if ($request->filled('kata_sandi')) {
                $validated['kata_sandi'] = Hash::make($validated['kata_sandi']);
            } else {
                unset($validated['kata_sandi']);
            }

            $tim->update($validated);

            return redirect()->route('tim-pemasaran.index')
                   ->with('success', 'Data tim pemasaran berhasil diperbarui.');
        } catch (ModelNotFoundException $e) {
            return redirect()->route('tim-pemasaran.index')
                   ->with('error', 'Data tim pemasaran tidak ditemukan.');
        } catch (Throwable $e) {
            Log::error('Gagal memperbarui tim pemasaran', [
                'id' => $id,
                'input' => $request->all(),
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return redirect()->back()
                   ->withInput()
                   ->with('error', 'Terjadi kesalahan saat memperbarui data.');
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
