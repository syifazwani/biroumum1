<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\BalaiContent;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class InfoBalaiController extends Controller
{
    // Halaman publik daftar isi balai
    public function index()
    {
        $items = BalaiContent::all();
        return view('admin.balai.index', compact('items'));
    }

    public function informasi()
    {
        $balais = BalaiContent::all();
        return view('informasi-balai', compact('balais'));
    }


    // Detail artikel berdasarkan slug


    public function show($slug)
    {
        $item = BalaiContent::where('slug', $slug)->firstOrFail();
        return view('informasi_detail', compact('item'));
    }




    // Halaman admin daftar konten
    public function admin()
    {
        $items = BalaiContent::all();
        return view('admin.balai.index', compact('items'));
    }

    // Form tambah
    public function create()
    {
        return view('admin.balai.create');
    }

    // Simpan konten baru
    public function store(Request $request)
    {
        BalaiContent::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'content' => $request->content,
            'image' => $request->image,
        ]);

        return redirect('/admin/balai');
    }

    // Form edit
    public function edit($id)
    {
        $item = BalaiContent::findOrFail($id);
        return view('admin.balai.edit', compact('item'));
    }

    // Update data
    public function update(Request $request, $id)
    {
        $item = BalaiContent::findOrFail($id);

        $item->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'content' => $request->content,
            'image' => $request->image,
        ]);

        return redirect('/admin/balai');
    }

    // Hapus data
    public function destroy($id)
    {
        BalaiContent::destroy($id);
        return redirect('/admin/balai');
    }
}
