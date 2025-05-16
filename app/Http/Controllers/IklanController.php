<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Iklan;

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
        $request->validate([
            'id_biaya_pemasaran' => 'required|exists:biaya_pemasarans,id',
            'id_platform' => 'required|exists:platforms,id',
            'nama' => 'required|string|max:50',
            'kategori' => 'required|string|max:100',
            'tanggal_peluncuran' => 'required|date',
            'tanggal_selesai' => 'required|date',
        ]);

        Iklan::create([
            'id_biaya_pemasaran' => $request->input('id_biaya_pemasaran'),
            'id_platform' => $request->input('id_platform'),
            'nama' => $request->input('nama'),
            'kategori' => $request->input('kategori'),
            'tanggal_peluncuran' => $request->input('tanggal_peluncuran'),
            'tanggal_selesai' => $request->input('tanggal_selesai'),
        ]);

        return redirect()->route('iklan.index');
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
        $request->validate([
            'id_biaya_pemasaran' => 'required|exists:biaya_pemasarans,id',
            'id_platform' => 'required|exists:platforms,id',
            'nama' => 'required|string|max:50',
            'kategori' => 'required|string|max:100',
            'tanggal_peluncuran' => 'required|date',
            'tanggal_selesai' => 'required|date',
        ]);

        $iklan = Iklan::findOrFail($id);

        $iklan->update([
            'id_biaya_pemasaran' => $request->input('id_biaya_pemasaran'),
            'id_platform' => $request->input('id_platform'),
            'nama' => $request->input('nama'),
            'kategori' => $request->input('kategori'),
            'tanggal_peluncuran' => $request->input('tanggal_peluncuran'),
            'tanggal_selesai' => $request->input('tanggal_selesai'),
        ]);

        return redirect()->route('iklan.show', $id);
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

        return redirect()->route('iklan.index');
    }
}
