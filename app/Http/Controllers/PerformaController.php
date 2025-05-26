<?php

namespace App\Http\Controllers;

use App\Models\Performa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        $rules = [
            'jumlah_tayang' => 'required|integer|min:0',
            'jumlah_klik'   => 'required|integer|min:0',
            'konversi'      => 'required|numeric|min:0',
            'tanggal'       => 'required|date',
            'id_platform'   => 'required|exists:platforms,id',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()
                ->with('error', 'Data performa tidak berhasil disimpan, data tidak valid:')
                ->withErrors($validator)
                ->withInput();
        }

        Performa::create($validator->validated());

        return redirect()->route('performa.index')
            ->with('success', 'Data performa berhasil disimpan.');
    }

    public function show($id)
    {
        $performa = Performa::findOrFail($id);
        return view('performa.show', compact('performa'));
    }

    public function edit($id)
    {
        $performa = Performa::findOrFail($id);
        return view('performa.edit', compact('performa'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'jumlah_tayang' => 'required|integer|min:0',
            'jumlah_klik'   => 'required|integer|min:0',
            'konversi'      => 'required|numeric|min:0',
            'tanggal'       => 'required|date',
            'id_platform'   => 'required|exists:platforms,id',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()
                ->with('error', 'Data performa tidak berhasil diperbarui, data tidak valid:')
                ->withErrors($validator)
                ->withInput();
        }

        $performa = Performa::findOrFail($id);
        $performa->update($validator->validated());

        return redirect()->route('performa.index', $id)
            ->with('success', 'Data performa berhasil diperbarui.');
    }

    public function delete($id)
    {
        $performa = Performa::findOrFail($id);
        return view('performa.delete', compact('performa'));
    }

    public function destroy($id)
    {
        $performa = Performa::findOrFail($id);
        $performa->delete();

        return redirect()->route('performa.index')
            ->with('success', 'Data performa berhasil dihapus.');
    }
}
