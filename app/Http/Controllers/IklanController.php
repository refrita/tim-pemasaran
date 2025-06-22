<?php

namespace App\Http\Controllers;

use App\Models\Iklan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;

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
        $rules = [
            'id_biaya_pemasaran' => 'required|exists:biaya_pemasarans,id',
            'id_platform'        => 'required|exists:platforms,id',
            'nama'               => 'required|string|max:50',
            'kategori'           => 'required|string|max:100',
            'tanggal_peluncuran' => 'required|date',
            'tanggal_selesai'    => 'required|date|after_or_equal:tanggal_peluncuran',
        ];
        $messages = [
            'tanggal_selesai.after_or_equal' => 'Tanggal selesai harus sama atau setelah tanggal peluncuran.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()
                ->with('error', 'Data iklan tidak berhasil disimpan, data tidak valid:')
                ->withErrors($validator)
                ->withInput();
        }

        Iklan::create($validator->validated());

        return redirect()->route('iklan.index')
            ->with('success', 'Data iklan berhasil disimpan.');
    }

    public function show($id)
    {
        $iklan = Iklan::findOrFail($id);
        return view('iklan.show', compact('iklan'));
    }

    public function edit($id)
    {
        $iklan = Iklan::findOrFail($id);
        return view('iklan.edit', compact('iklan'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'id_biaya_pemasaran' => 'required|exists:biaya_pemasarans,id',
            'id_platform'        => 'required|exists:platforms,id',
            'nama'               => 'required|string|max:50',
            'kategori'           => 'required|string|max:100',
            'tanggal_peluncuran' => 'required|date',
            'tanggal_selesai'    => 'required|date|after_or_equal:tanggal_peluncuran',
        ];
        $messages = [
            'tanggal_selesai.after_or_equal' => 'Tanggal selesai harus sama atau setelah tanggal peluncuran.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()
                ->with('error', 'Data iklan tidak berhasil diperbarui, data tidak valid:')
                ->withErrors($validator)
                ->withInput();
        }

        $iklan = Iklan::findOrFail($id);
        $iklan->update($validator->validated());

        return redirect()->route('iklan.index', $id)
            ->with('success', 'Data iklan berhasil diperbarui.');
    }

    public function delete($id)
    {
        $iklan = Iklan::findOrFail($id);
        return view('iklan.delete', compact('iklan'));
    }

    public function destroy($id)
    {
        $iklan = Iklan::findOrFail($id);
        $iklan->delete();

        return redirect()->route('iklan.index')
            ->with('success', 'Data iklan berhasil dihapus.');
    }

    // ✅ Tambahan untuk tugas Pertemuan 13:

    // a. findOrFail biasa (404 otomatis)
    public function showErrorA($id)
    {
        $iklan = Iklan::findOrFail($id);
        return view('iklan.show', compact('iklan'));
    }

    // b. try-catch (menangani error secara manual)
    public function showErrorB($id)
    {
        try {
            $iklan = Iklan::findOrFail($id);
            return view('iklan.show', compact('iklan'));
        } catch (ModelNotFoundException $e) {
            return response()->view('errors.custom_not_found', [], 404);
        }
    }

    // c. firstOrFail (cari berdasarkan nama iklan)
    public function searchByNama($nama)
    {
        $iklan = Iklan::where('nama', $nama)->firstOrFail();
        return view('iklan.show', compact('iklan'));
    }
}
