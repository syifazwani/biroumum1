<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class StrukturController extends Controller
{
    public function index()
    {
        $image = DB::table('struktur_organisasi')->latest('id')->first();
        return view('admin.organisasi', compact('image'));
    }

    public function upload(Request $request)
    {
        $request->validate([
            'image' => 'required|image|max:2048',
        ]);

        $path = $request->file('image')->store('struktur', 'public');

        DB::table('struktur_organisasi')->insert([
            'image_path' => $path,
            'created_at' => now()
        ]);

        return redirect()->back()->with('success', 'Gambar berhasil diunggah.');
    }
}
