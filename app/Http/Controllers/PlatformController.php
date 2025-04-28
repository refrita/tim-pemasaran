<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlatformController extends Controller
{
    private $data = [
        ['id' => 201, 'nama_platform' => 'Google Ads', 'jenis_platform' => 'Search Engine'],
        ['id' => 202, 'nama_platform' => 'Facebook Ads', 'jenis_platform' => 'Social Media'],
    ];

    public function index()
    {
        return view('platform.index', ['platform' => $this->data]);
    }

    public function show($id)
    {
        $item = collect($this->data)->firstWhere('id', $id);
        return view('platform.show', compact('item'));
    }

    public function create()
    {
        return view('platform.create');
    }

    public function store(Request $request)
    {
        return redirect('/platform')->with('success', 'Data platform berhasil disimpan (simulasi)');
    }

    public function edit($id)
    {
        $item = collect($this->data)->firstWhere('id', $id);
        return view('platform.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        return redirect('/platform')->with('success', 'Data platform berhasil diupdate (simulasi)');
    }

    public function delete($id)
    {
        $item = collect($this->data)->firstWhere('id', $id);
        return view('platform.delete', compact('item'));
    }

    public function destroy($id)
    {
        return redirect('/platform')->with('success', 'Data platform berhasil dihapus (simulasi)');
    }
}
