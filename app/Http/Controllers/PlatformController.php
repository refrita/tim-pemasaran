<?php

namespace App\Http\Controllers;

use App\Models\Platform;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;
use Throwable;

class PlatformController extends Controller
{
    public function index()
    {
        return view('platform.index', [
            'platform' => Platform::all()
        ]);
    }

    public function create()
    {
        return view('platform.create');
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'nama_platform'  => 'required|string|max:255',
                'jenis_platform' => 'required|string|max:255',
            ]);

            Platform::create([
                'nama'  => $validated['nama_platform'],
                'jenis' => $validated['jenis_platform'],
            ]);

            return redirect()->route('platform.index')->with('success', 'Data platform berhasil disimpan.');
        } catch (Throwable $e) {
            Log::error('Gagal menyimpan platform', [
                'input' => $request->all(),
                'message' => $e->getMessage(),
            ]);

            return redirect()->back()->withInput()->with('error', 'Terjadi kesalahan saat menyimpan data.');
        }
    }

    public function show($id)
    {
        try {
            $platform = Platform::findOrFail($id);
            return view('platform.show', compact('platform'));
        } catch (ModelNotFoundException $e) {
            return redirect()->route('platform.index')->with('error', 'Data platform tidak ditemukan.');
        }
    }

    public function edit($id)
    {
        try {
            $platform = Platform::findOrFail($id);
            return view('platform.edit', compact('platform'));
        } catch (ModelNotFoundException $e) {
            return redirect()->route('platform.index')->with('error', 'Data platform tidak ditemukan.');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $validated = $request->validate([
                'nama_platform'  => 'required|string|max:255',
                'jenis_platform' => 'required|string|max:255',
            ]);

            $platform = Platform::findOrFail($id);

            $platform->update([
                'nama'  => $validated['nama_platform'],
                'jenis' => $validated['jenis_platform'],
            ]);

            return redirect()->route('platform.index')->with('success', 'Data platform berhasil diperbarui.');
        } catch (ModelNotFoundException $e) {
            return redirect()->route('platform.index')->with('error', 'Data platform tidak ditemukan.');
        } catch (Throwable $e) {
            Log::error('Gagal memperbarui platform', [
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
            $platform = Platform::findOrFail($id);
            return view('platform.delete', compact('platform'));
        } catch (ModelNotFoundException $e) {
            return redirect()->route('platform.index')->with('error', 'Data platform tidak ditemukan.');
        }
    }

    public function destroy($id)
    {
        try {
            $platform = Platform::findOrFail($id);
            $platform->delete();

            return redirect()->route('platform.index')->with('success', 'Data platform berhasil dihapus.');
        } catch (ModelNotFoundException $e) {
            return redirect()->route('platform.index')->with('error', 'Data platform tidak ditemukan.');
        } catch (Throwable $e) {
            Log::error('Gagal menghapus platform', [
                'id' => $id,
                'message' => $e->getMessage(),
            ]);
            return redirect()->route('platform.index')->with('error', 'Terjadi kesalahan saat menghapus data.');
        }
    }
}
