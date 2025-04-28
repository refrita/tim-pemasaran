<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IklanController extends Controller
{
    private $data = [
        ['id' => 601, 'judul_iklan' => 'Promo Game A', 'deskripsi' => 'Diskon besar-besaran!', 'tanggal_mulai' => '2025-04-01', 'tanggal_selesai' => '2025-04-15', 'status' => 'Aktif', 'id_tim_pemasaran' => 101],
        ['id' => 602, 'judul_iklan' => 'Event Game B', 'deskripsi' => 'Turnamen dan hadiah menarik!', 'tanggal_mulai' => '2025-04-05', 'tanggal_selesai' => '2025-04-20', 'status' => 'Nonaktif', 'id_tim_pemasaran' => 102],
    ];

    private $tim = [
        101 => 'Aditya (Leader)',
        102 => 'Budi (SEO Specialist)',
    ];

    public function index()
    {
        $iklan = collect($this->data)->map(function ($item) {
            $item['nama_tim'] = $this->tim[$item['id_tim_pemasaran']] ?? 'Unknown';
            return $item;
        });
        return view('iklan.index', compact('iklan'));
    }

    public function show($id)
    {
        $item = collect($this->data)->firstWhere('id', $id);
        $item['nama_tim'] = $this->tim[$item['id_tim_pemasaran']] ?? 'Unknown';
        return view('iklan.show', compact('item'));
    }

    public function create()
    {
        $tim = $this->tim;
        return view('iklan.create', compact('tim'));
    }

    public function store(Request $request)
    {
        return redirect('/iklan')->with('success', 'Data iklan disimpan (simulasi)');
    }

    public function edit($id)
    {
        $item = collect($this->data)->firstWhere('id', $id);
        $tim = $this->tim;
        return view('iklan.edit', compact('item', 'tim'));
    }

    public function update(Request $request, $id)
    {
        return redirect('/iklan')->with('success', 'Data iklan diupdate (simulasi)');
    }

    public function delete($id)
    {
        $item = collect($this->data)->firstWhere('id', $id);
        return view('iklan.delete', compact('item'));
    }

    public function destroy($id)
    {
        return redirect('/iklan')->with('success', 'Data iklan dihapus (simulasi)');
    }
}
