<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function create()
    {
        return view('upload');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $path = $request->file('image')->store('images', 'public');

        $image = Image::create([
            'title' => $request->title,
            'image_path' => $path
        ]);

        return view('upload', [
            'image' => $image
        ])->with('success', 'Gambar berhasil diupload.');
    }

    public function destroy($id)
    {
        $image = Image::findOrFail($id);

        // Hapus file dari storage
        Storage::disk('public')->delete($image->image_path);

        // Hapus data dari database
        $image->delete();

        return redirect('/upload')->with('success', 'Gambar berhasil dihapus.');
    }
}
