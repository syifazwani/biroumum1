<?php

// app/Http/Controllers/VisiMisiController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class VisiMisiController extends Controller
{
    public function index()
    {
        $visi_misi = DB::table('visi_misi')->orderBy('created_at', 'desc')->get();
        return view('admin.visi_misi', compact('visi_misi'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'nama_file' => 'required|string|max:255',
            'file' => 'required|file|mimes:jpg,jpeg,png,webp|max:5120',
        ]);


        $filePath = $request->file('file')->store('visi_misi', 'public');


        DB::table('visi_misi')->insert([
            'nama_file' => $request->nama_file,
            'path' => $filePath,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('admin.visi_misi.index')->with('success', 'File visi dan misi berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $item = DB::table('visi_misi')->where('id', $id)->first();
        if (!$item) {
            abort(404);
        }
        return view('admin.visi_misi_edit', compact('item'));
    }

    public function showPpid()
    {
        return redirect()->route('admin.visi_misi.index');
    }

    public function update(Request $request, $id)
    {
        $item = DB::table('visi_misi')->where('id', $id)->first();
        if (!$item) {
            abort(404);
        }

        $request->validate([
            'nama_file' => 'required|string|max:255',
            'file' => 'nullable|file|mimes:jpg,jpeg,png,webp|max:5120',
        ]);


        $dataUpdate = [
            'nama_file' => $request->nama_file,
            'updated_at' => now(),
        ];

        if ($request->hasFile('file')) {
            Storage::delete($item->path);
            $filePath = $request->file('file')->store('visi_misi', 'public');
            $dataUpdate['path'] = $filePath;
        }

        DB::table('visi_misi')->where('id', $id)->update($dataUpdate);

        return redirect()->route('admin.visi_misi.index')->with('success', 'File visi dan misi berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $item = DB::table('visi_misi')->where('id', $id)->first();
        if (!$item) {
            abort(404);
        }
        Storage::delete($item->path);
        DB::table('visi_misi')->where('id', $id)->delete();

        return redirect()->route('admin.visi_misi.index')->with('success', 'File visi dan misi berhasil dihapus.');
    }
}
