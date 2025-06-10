<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\AlbumPhoto;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;

class FotoController extends Controller
{
    public function index()
    {
        $fotos = AlbumPhoto::with('album')->orderByDesc('id')->paginate(10);
        return view('admin.foto.index', compact('fotos'));
    }

    public function create()
    {
        $albums = Album::all();
        return view('admin.foto.create', compact('albums'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'album_id' => 'required|exists:albums,id',
            'file' => 'required|image|max:2048',
        ]);

        $path = $request->file('file')->store('uploads', 'public');

        AlbumPhoto::create([
            'album_id' => $request->album_id,
            'image_path' => $path,
        ]);

        return redirect()->route('foto.index')->with('success', 'Foto berhasil ditambahkan.');
    }

    public function tampilGaleri()
    {
        $albums = Album::with('photos')->get();

        return view('galeri.foto', compact('albums'));
    }

    public function edit($id)
    {
        $foto = AlbumPhoto::findOrFail($id);
        $albums = Album::all();
        return view('admin.foto.edit', compact('foto', 'albums'));
    }

    public function update(Request $request, $id)
    {
        $foto = AlbumPhoto::findOrFail($id);

        $request->validate([
            'album_id' => 'required|exists:albums,id',
            'file' => 'nullable|image|max:2048',
        ]);

        $data = ['album_id' => $request->album_id];

        if ($request->hasFile('file')) {
            // Hapus foto lama
            if ($foto->image_path) {
                Storage::disk('public')->delete($foto->image_path);
            }
            $data['image_path'] = $request->file('file')->store('uploads', 'public');
        }

        $foto->update($data);

        return redirect()->route('foto.index')->with('success', 'Foto berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $foto = AlbumPhoto::findOrFail($id);

        if ($foto->image_path) {
            Storage::disk('public')->delete($foto->image_path);
        }

        $foto->delete();

        return redirect()->back()->with('success', 'Foto berhasil dihapus.');
    }
}
