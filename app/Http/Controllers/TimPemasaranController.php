<?php

namespace App\Http\Controllers;

use App\Models\TimPemasaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        $rules = [
            'id_biaya_pemasaran' => 'required|exists:biaya_pemasarans,id',
            'id_platform'        => 'required|exists:platforms,id',
            'nama_anggota'       => 'required|string|max:100',
            'jabatan_anggota'    => 'required|string|max:100',
            'nama_pengguna'      => 'required|string|max:100',
            'kata_sandi'         => 'required|string|max:100',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()
                ->with('error', 'Data tim pemasaran tidak berhasil disimpan, data tidak valid:')
                ->withErrors($validator)
                ->withInput();
        }

        TimPemasaran::create($validator->validated());

        return redirect()->route('tim-pemasaran.index')
            ->with('success', 'Data tim pemasaran berhasil disimpan.');
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
        $rules = [
            'id_biaya_pemasaran' => 'required|exists:biaya_pemasarans,id',
            'id_platform'        => 'required|exists:platforms,id',
            'nama_anggota'       => 'required|string|max:100',
            'jabatan_anggota'    => 'required|string|max:100',
            'nama_pengguna'      => 'required|string|max:100',
            'kata_sandi'         => 'nullable|string|max:100',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()
                ->with('error', 'Data tim pemasaran tidak berhasil diperbarui, data tidak valid:')
                ->withErrors($validator)
                ->withInput();
        }

        $tim  = TimPemasaran::findOrFail($id);
        $data = $validator->validated();

        // Jika kata_sandi dikosongkan, biarkan password lama
        if (empty($data['kata_sandi'])) {
            unset($data['kata_sandi']);
        }

        $tim->update($data);

        return redirect()->route('tim-pemasaran.index', $id)
            ->with('success', 'Data tim pemasaran berhasil diperbarui.');
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

        return redirect()->route('tim-pemasaran.index')
            ->with('success', 'Data tim pemasaran berhasil dihapus.');
    }
}
