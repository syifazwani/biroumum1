<?php

namespace App\Http\Controllers;

use App\Models\Sejarah;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class InformasiSejarahController extends Controller
{
    public function index()
    {
        $sejarah = Sejarah::first();
        return view('admin.informasi.sejarah', compact('sejarah'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'konten' => 'required|string',
        ]);

        Sejarah::create([
            'konten' => $request->konten,
        ]);

        return back()->with('success', 'Konten sejarah berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'konten' => 'required|string',
        ]);

        $sejarah = Sejarah::findOrFail($id);
        $sejarah->update([
            'konten' => $request->konten,
        ]);

        return back()->with('success', 'Konten sejarah berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $sejarah = Sejarah::findOrFail($id);
        $sejarah->delete();

        return back()->with('success', 'Konten sejarah berhasil dihapus.');
    }
}

