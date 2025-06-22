<?php

namespace App\Http\Controllers;

use App\Models\Platform;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PlatformController extends Controller
{
    public function index()
    {
        return view('platform.index', [
            'platform' => Platform::all()
        ]);
    }

    public function create()
    {
        return view('platform.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'nama_platform'  => 'required|string|max:255',
            'jenis_platform' => 'required|string|max:255',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()
                ->with('error', 'Data platform tidak berhasil disimpan, data tidak valid:')
                ->withErrors($validator)
                ->withInput();
        }

        Platform::create([
            'nama'  => $validator->validated()['nama_platform'],
            'jenis' => $validator->validated()['jenis_platform'],
        ]);

        return redirect()->route('platform.index')
            ->with('success', 'Data platform berhasil disimpan.');
    }

    public function show($id)
    {
        try {
            $platform = Platform::findOrFail($id);
            return view('platform.show', compact('platform'));
        } catch (ModelNotFoundException $e) {
            return response()->view('errors.custom_not_found', ['message' => 'Data Platform tidak ditemukan.'], 404);
        }
    }

    public function edit($id)
    {
        $platform = Platform::findOrFail($id);
        return view('platform.edit', compact('platform'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'nama_platform'  => 'required|string|max:255',
            'jenis_platform' => 'required|string|max:255',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()
                ->with('error', 'Data platform tidak berhasil diperbarui, data tidak valid:')
                ->withErrors($validator)
                ->withInput();
        }

        $platform = Platform::findOrFail($id);
        $data = $validator->validated();

        $platform->update([
            'nama'  => $data['nama_platform'],
            'jenis' => $data['jenis_platform'],
        ]);

        return redirect()->route('platform.index', $id)
            ->with('success', 'Data platform berhasil diperbarui.');
    }

    public function delete($id)
    {
        $platform = Platform::findOrFail($id);
        return view('platform.delete', compact('platform'));
    }

    public function destroy($id)
    {
        $platform = Platform::findOrFail($id);
        $platform->delete();

        return redirect()->route('platform.index')
            ->with('success', 'Data platform berhasil dihapus.');
    }
}
