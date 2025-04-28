<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BiayaPemasaranController extends Controller
{
    private $data = [
        ['id' => 301, 'total_anggaran' => 10000000, 'anggaran_tersedia' => 2500000, 'bulan_berlaku' => '2025-04-01', 'status' => 'Aktif'],
        ['id' => 302, 'total_anggaran' => 15000000, 'anggaran_tersedia' => 5000000, 'bulan_berlaku' => '2025-05-01', 'status' => 'Menunggu'],
    ];

    public function index()
    {
        return view('biaya-pemasaran.index', ['biaya' => $this->data]);
    }

    public function show($id)
    {
        $item = collect($this->data)->firstWhere('id', $id);
        return view('biaya-pemasaran.show', compact('item'));
    }

    public function create()
    {
        return view('biaya-pemasaran.create');
    }

    public function store(Request $request)
    {
        return redirect('/biaya-pemasaran')->with('success', 'Data berhasil disimpan (simulasi)');
    }

    public function edit($id)
    {
        $item = collect($this->data)->firstWhere('id', $id);
        return view('biaya-pemasaran.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        return redirect('/biaya-pemasaran')->with('success', 'Data berhasil diupdate (simulasi)');
    }

    public function delete($id)
    {
        $item = collect($this->data)->firstWhere('id', $id);
        return view('biaya-pemasaran.delete', compact('item'));
    }

    public function destroy($id)
    {
        return redirect('/biaya-pemasaran')->with('success', 'Data berhasil dihapus (simulasi)');
    }
}
