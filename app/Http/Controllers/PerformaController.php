<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PerformaController extends Controller
{
    private $data = [
        ['id' => 401, 'jumlah_tayang' => 10000, 'jumlah_klik' => 450, 'konversi' => 60, 'tanggal' => '2025-04-15', 'id_iklan' => 201],
        ['id' => 402, 'jumlah_tayang' => 15000, 'jumlah_klik' => 700, 'konversi' => 120, 'tanggal' => '2025-04-16', 'id_iklan' => 202],
    ];

    private $iklan = [
        201 => 'Iklan Game A',
        202 => 'Iklan Game B',
    ];

    public function index()
    {
        $performa = collect($this->data)->map(function ($item) {
            $item['nama_iklan'] = $this->iklan[$item['id_iklan']] ?? 'Unknown';
            return $item;
        });
        return view('performa.index', compact('performa'));
    }

    public function show($id)
    {
        $item = collect($this->data)->firstWhere('id', $id);
        $item['nama_iklan'] = $this->iklan[$item['id_iklan']] ?? 'Unknown';
        return view('performa.show', compact('item'));
    }

    public function create()
    {
        $iklan = $this->iklan;
        return view('performa.create', compact('iklan'));
    }

    public function store(Request $request)
    {
        return redirect('/performa')->with('success', 'Data performa disimpan (simulasi)');
    }

    public function edit($id)
    {
        $item = collect($this->data)->firstWhere('id', $id);
        $iklan = $this->iklan;
        return view('performa.edit', compact('item', 'iklan'));
    }

    public function update(Request $request, $id)
    {
        return redirect('/performa')->with('success', 'Data performa diupdate (simulasi)');
    }

    public function delete($id)
    {
        $item = collect($this->data)->firstWhere('id', $id);
        return view('performa.delete', compact('item'));
    }

    public function destroy($id)
    {
        return redirect('/performa')->with('success', 'Data performa dihapus (simulasi)');
    }
}
