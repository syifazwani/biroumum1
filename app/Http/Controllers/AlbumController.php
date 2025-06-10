<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;

class AlbumController extends Controller
{
    public function index()
    {
        $albums = Album::all();
        return view('album.index', compact('albums'));
    }


    public function create()
    {
        return view('album.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'cover_image' => 'required|image|max:2048',
        ]);

        $path = $request->file('cover_image')->store('albums', 'public');

        Album::create([
            'title' => $request->title,
            'cover_image' => $path,
        ]);

        return redirect()->route('album.index')->with('success', 'Album berhasil ditambahkan.');
    }

    public function edit(Album $album)
    {
        return view('album.edit', compact('album'));
    }

    public function update(Request $request, Album $album)
    {
        $request->validate([
            'title' => 'required',
            'cover_image' => 'nullable|image|max:2048',
        ]);

        $data = ['title' => $request->title];

        if ($request->hasFile('cover_image')) {
            if ($album->cover_image) {
                Storage::disk('public')->delete($album->cover_image);
            }
            $data['cover_image'] = $request->file('cover_image')->store('albums', 'public');
        }

        $album->update($data);

        return redirect()->route('album.index')->with('success', 'Album berhasil diperbarui.');
    }

    public function destroy(Album $album)
    {
        if ($album->cover_image) {
            Storage::disk('public')->delete($album->cover_image);
        }

        $album->delete();

        return redirect()->route('album.index')->with('success', 'Album berhasil dihapus.');
    }
}
