<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TimPemasaranController extends Controller
{
    private $data = [
        ['id' => 101, 'nama_anggota' => 'Aditya', 'jabatan' => 'Leader', 'nama_pengguna' => 'aditya01', 'id_platform' => 201, 'id_pemasaran' => 301],
        ['id' => 102, 'nama_anggota' => 'Budi', 'jabatan' => 'SEO Specialist', 'nama_pengguna' => 'budi99', 'id_platform' => 202, 'id_pemasaran' => 301],
    ];

    public function index()
    {
        return view('tim-pemasaran.index', ['tim' => $this->data]);
    }

    public function show($id)
    {
        $item = collect($this->data)->firstWhere('id', $id);
        return view('tim-pemasaran.show', compact('item'));
    }

    public function create()
    {
        return view('tim-pemasaran.create');
    }

    public function store(Request $request)
    {
        return redirect('/tim-pemasaran')->with('success', 'Data berhasil disimpan (simulasi)');
    }

    public function edit($id)
    {
        $item = collect($this->data)->firstWhere('id', $id);
        return view('tim-pemasaran.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        return redirect('/tim-pemasaran')->with('success', 'Data berhasil diupdate (simulasi)');
    }

    // ✅ Tambahan untuk konfirmasi hapus
    public function delete($id)
    {
        $item = collect($this->data)->firstWhere('id', $id);
        return view('tim-pemasaran.delete', compact('item'));
    }

    public function destroy($id)
    {
        return redirect('/tim-pemasaran')->with('success', 'Data berhasil dihapus (simulasi)');
    }
}
