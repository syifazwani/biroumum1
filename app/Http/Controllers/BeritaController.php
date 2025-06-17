<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    public function index()
    {
        $beritas = Berita::latest()->paginate(10);
        return view('informasi-berita', compact('beritas'));
    }


    public function show($slug)
    {
        $berita = Berita::where('slug', $slug)->firstOrFail();
        return view('admin.berita.show', compact('berita'));
    }


    public function adminIndex()
    {
        $beritas = Berita::latest()->get();
        return view('admin.berita.index', compact('beritas'));
    }

    public function create()
    {
        return view('admin.berita.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'external_link' => 'required|url',
        ]);

        $slug = $this->createUniqueSlug($request->title);

        Berita::create([
            'title' => $request->title,
            'slug' => $slug,
            'content' => 'Berita selengkapnya bisa dibaca di: ' . $request->external_link,
            'image' => null,
        ]);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil ditambahkan.');
    }



    public function edit($id)
    {
        $berita = Berita::findOrFail($id);
        return view('admin.berita.edit', compact('berita'));
    }

    public function update(Request $request, $id)
    {
        $berita = Berita::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|max:2048',
        ]);

        $slug = $this->createUniqueSlug($request->title, $id);

        $imagePath = $berita->image;
        if ($request->hasFile('image')) {
            // Optional: delete old image
            if ($berita->image) {
                Storage::disk('public')->delete($berita->image);
            }
            $imagePath = $request->file('image')->store('berita_images', 'public');
        }

        $berita->update([
            'title' => $request->title,
            'slug' => $slug,
            'content' => $request->content,
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil diperbarui.');

    }

    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);

        // Opsional: hapus gambar dari storage
        // if ($berita->image) {
        //     \Storage::disk('public')->delete($berita->image);
        // }

        $berita->delete();
        return back()->with('success', 'Berita berhasil dihapus.');
    }

    protected function createUniqueSlug($title, $ignoreId = null)
    {
        $slug = Str::slug($title);
        $originalSlug = $slug;

        $count = 1;
        while (
            Berita::where('slug', $slug)
                ->when($ignoreId, fn($q) => $q->where('id', '!=', $ignoreId))
                ->exists()
        ) {
            $slug = $originalSlug . '-' . $count++;
        }

        return $slug;
    }
}
