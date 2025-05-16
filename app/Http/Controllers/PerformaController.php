<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Performa;

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
        $request->validate([
            'jumlah_tayang' => 'required|integer',
            'jumlah_klik' => 'required|integer',
            'konversi' => 'required|numeric',
            'tanggal' => 'required|date',
            'id_platform' => 'required|exists:platforms,id',
        ]);

        Performa::create([
            'jumlah_tayang' => $request->input('jumlah_tayang'),
            'jumlah_klik' => $request->input('jumlah_klik'),
            'konversi' => $request->input('konversi'),
            'tanggal' => $request->input('tanggal'),
            'id_platform' => $request->input('id_platform'),
        ]);

        return redirect()->route('performa.index');
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
        $request->validate([
            'jumlah_tayang' => 'required|integer',
            'jumlah_klik' => 'required|integer',
            'konversi' => 'required|numeric',
            'tanggal' => 'required|date',
            'id_platform' => 'required|exists:platforms,id',
        ]);

        $performa = Performa::findOrFail($id);

        $performa->update([
            'jumlah_tayang' => $request->input('jumlah_tayang'),
            'jumlah_klik' => $request->input('jumlah_klik'),
            'konversi' => $request->input('konversi'),
            'tanggal' => $request->input('tanggal'),
            'id_platform' => $request->input('id_platform'),
        ]);

        return redirect()->route('performa.show', $id);
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

        return redirect()->route('performa.index');
    }
}
