<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class TugasFungsiController extends Controller
{
    public function index()
    {
        $tugas_fungsi = DB::table('tugas_fungsi')->orderBy('created_at', 'desc')->get();
        return view('admin.tugas_fungsi.index', compact('tugas_fungsi'));
    }

    public function indexUser()
    {
        $tugas_fungsi = DB::table('tugas_fungsi')->orderBy('created_at', 'desc')->get();

        $contents = [
            'tugas-fungsi' => $tugas_fungsi
        ];

        return view('ppid', compact('contents'));
    }
    public function create()
    {
        return view('admin.tugas_fungsi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_file' => 'required|string|max:255',
            'file' => 'required|file|mimes:pdf,jpg,jpeg,png,webp|max:5120',
        ]);

        // Simpan file di folder storage/app/public/tugas_fungsi
        $path = $request->file('file')->store('tugas_fungsi', 'public');

        // Insert ke DB langsung
        DB::table('tugas_fungsi')->insert([
            'nama_file' => $request->nama_file,
            'path' => $path,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Redirect ke route index yang benar
        return redirect()->route('tugasfungsi.index')->with('success', 'File berhasil ditambahkan.');
    }

    public function destroy($id)
    {
        $item = DB::table('tugas_fungsi')->where('id', $id)->first();
        if (!$item) {
            abort(404);
        }

        Storage::delete('public/' . $item->path);

        DB::table('tugas_fungsi')->where('id', $id)->delete();

        return redirect()->route('tugasfungsi.index')->with('success', 'Data berhasil dihapus');
    }
}
