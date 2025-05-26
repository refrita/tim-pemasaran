<?php

namespace App\Http\Controllers;

use App\Models\BiayaPemasaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class BiayaPemasaranController extends Controller
{
    public function index()
    {
        $biaya = BiayaPemasaran::all();
        return view('biaya-pemasaran.index', compact('biaya'));
    }

    public function create()
    {
        return view('biaya-pemasaran.create');
    }

    public function store(Request $request)
    {
        // rules & custom messages (jika perlu)
        $rules = [
            'total_anggaran'   => 'required|integer|min:0',
            'anggaran_tersedia'=> 'required|integer|min:0',
            'bulan_berlaku'    => 'required|date',
            'status'           => 'required|string|max:50',
        ];
        $messages = [
            // contoh custom message:
            'bulan_berlaku.date' => 'Format tanggal bulan berlaku tidak valid.',
        ];

        // buat validator manual
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()
                ->with('error', 'Data biaya tidak berhasil disimpan, data tidak valid:')
                ->withErrors($validator)
                ->withInput();
        }

        BiayaPemasaran::create($validator->validated());

        return redirect()->route('biaya-pemasaran.index')
            ->with('success', 'Data biaya berhasil disimpan.');
    }

    public function show($id)
    {
        $biaya = BiayaPemasaran::findOrFail($id);
        return view('biaya-pemasaran.show', compact('biaya'));
    }

    public function edit($id)
    {
        $biaya = BiayaPemasaran::findOrFail($id);
        return view('biaya-pemasaran.edit', compact('biaya'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'total_anggaran'   => 'required|integer|min:0',
            'anggaran_tersedia'=> 'required|integer|min:0',
            'bulan_berlaku'    => 'required|date',
            'status'           => 'required|string|max:50',
        ];
        $messages = [
            'bulan_berlaku.date' => 'Format tanggal bulan berlaku tidak valid.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()
                ->with('error', 'Data biaya tidak berhasil diperbarui, data tidak valid:')
                ->withErrors($validator)
                ->withInput();
        }

        $biaya = BiayaPemasaran::findOrFail($id);
        $biaya->update($validator->validated());

        return redirect()->route('biaya-pemasaran.index')
            ->with('success', 'Data biaya berhasil diperbarui.');
    }

    public function delete($id)
    {
        $biaya = BiayaPemasaran::findOrFail($id);
        return view('biaya-pemasaran.delete', compact('biaya'));
    }

    public function destroy($id)
    {
        $biaya = BiayaPemasaran::findOrFail($id);
        $biaya->delete();

        return redirect()->route('biaya-pemasaran.index')
            ->with('success', 'Data biaya berhasil dihapus.');
    }
}
