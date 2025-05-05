<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TimPemasaran;

class TimPemasaranController extends Controller
{
    public function index()
    {
        return view('tim-pemasaran.index', [
            'tim' => TimPemasaran::all()
        ]);
    }

    public function create()
    {
        return view('tim-pemasaran.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_biaya_pemasaran' => 'required|integer',
            'id_platform' => 'required|integer',
            'nama_anggota' => 'required|string|max:100',
            'jabatan_anggota' => 'required|string|max:100',
            'nama_pengguna' => 'required|string|max:100',
            'kata_sandi' => 'required|string|max:100',
        ]);

        TimPemasaran::create($request->all());

        return redirect()->route('tim-pemasaran.index')->with('success', 'Data tim berhasil disimpan');
    }

    public function show($id)
    {
        $tim = TimPemasaran::findOrFail($id);
        return view('tim-pemasaran.show', compact('tim'));
    }

    public function edit($id)
    {
        $tim = TimPemasaran::findOrFail($id);
        return view('tim-pemasaran.edit', compact('tim'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_biaya_pemasaran' => 'required|integer',
            'id_platform' => 'required|integer',
            'nama_anggota' => 'required|string|max:100',
            'jabatan_anggota' => 'required|string|max:100',
            'nama_pengguna' => 'required|string|max:100',
            'kata_sandi' => 'required|string|max:100',
        ]);

        $tim = TimPemasaran::findOrFail($id);
        $tim->update($request->all());

        return redirect()->route('tim-pemasaran.show', $id)->with('success', 'Data tim berhasil diperbarui');
    }

    public function delete($id)
    {
        $tim = TimPemasaran::findOrFail($id);
        return view('tim-pemasaran.delete', compact('tim'));
    }

    public function destroy($id)
    {
        $tim = TimPemasaran::findOrFail($id);
        $tim->delete();

        return redirect()->route('tim-pemasaran.index')->with('success', 'Data tim berhasil dihapus');
    }
}
