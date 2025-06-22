<?php

namespace App\Http\Controllers;

use App\Models\TimPemasaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;

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
        try {
            $tim = TimPemasaran::findOrFail($id);
            return view('tim-pemasaran.show', compact('tim'));
        } catch (ModelNotFoundException $e) {
            return response()->view('errors.custom_not_found', ['message' => 'Data Tim Pemasaran tidak ditemukan.'], 404);
        }
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
            return response()->view('errors.custom_not_found', [
                'message' => "Data tidak ditemukan untuk kata kunci: \"$keyword\""
            ], 404);
        }

        return view('tim-pemasaran.show', ['tim' => $tim]);
    }



}
