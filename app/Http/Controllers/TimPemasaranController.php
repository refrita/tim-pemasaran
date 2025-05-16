<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TimPemasaran;

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
        $request->validate([
            'id_biaya_pemasaran' => 'required|exists:biaya_pemasarans,id',
            'id_platform' => 'required|exists:platforms,id',
            'nama_anggota' => 'required|string|max:100',
            'jabatan_anggota' => 'required|string|max:100',
            'nama_pengguna' => 'required|string|max:100',
            'kata_sandi' => 'required|string|max:100',
        ]);

        TimPemasaran::create([
            'id_biaya_pemasaran' => $request->input('id_biaya_pemasaran'),
            'id_platform' => $request->input('id_platform'),
            'nama_anggota' => $request->input('nama_anggota'),
            'jabatan_anggota' => $request->input('jabatan_anggota'),
            'nama_pengguna' => $request->input('nama_pengguna'),
            'kata_sandi' => $request->input('kata_sandi'),
        ]);

        return redirect()->route('tim-pemasaran.index');
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
            'id_biaya_pemasaran' => 'required|exists:biaya_pemasarans,id',
            'id_platform' => 'required|exists:platforms,id',
            'nama_anggota' => 'required|string|max:100',
            'jabatan_anggota' => 'required|string|max:100',
            'nama_pengguna' => 'required|string|max:100',
            'kata_sandi' => 'nullable|string|max:100',
        ]);

        $tim = TimPemasaran::findOrFail($id);

        $data = [
            'id_biaya_pemasaran' => $request->input('id_biaya_pemasaran'),
            'id_platform' => $request->input('id_platform'),
            'nama_anggota' => $request->input('nama_anggota'),
            'jabatan_anggota' => $request->input('jabatan_anggota'),
            'nama_pengguna' => $request->input('nama_pengguna'),
        ];

        if (!empty($request->input('kata_sandi'))) {
            $data['kata_sandi'] = $request->input('kata_sandi');
        }

        $tim->update($data);

        return redirect()->route('tim-pemasaran.show', $id);
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

        return redirect()->route('tim-pemasaran.index');
    }
}
