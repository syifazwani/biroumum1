<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class RenstraController extends Controller
{
    // Tampilkan halaman daftar file renstra
    public function index()
    {
        // Ambil semua data file renstra dari DB
        $files = DB::table('renstra')->orderBy('created_at', 'desc')->get();
        return view('admin.renstra', compact('files'));
    }

    // Upload file baru
    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:pdf,doc,docx,xlsx,xls,ppt,pptx|max:5120',
        ]);

        // Simpan file ke storage 'public/renstra'
        $path = $request->file('file')->store('renstra', 'public');
        // Ambil nama asli file untuk ditampilkan
        $name = $request->file('file')->getClientOriginalName();

        // Simpan record ke database
        DB::table('renstra')->insert([
            'nama_file' => $name,
            'file_path' => $path,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->back()->with('success', 'File Renstra berhasil diunggah.');
    }

    // Tampilkan form edit file renstra
    public function edit($id)
    {
        $file = DB::table('renstra')->where('id', $id)->first();
        if (!$file) {
            return redirect()->back()->with('error', 'File tidak ditemukan.');
        }
        return view('admin.renstra_edit', compact('file'));
    }

    // Update file renstra (nama dan opsional file baru)
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_file' => 'required|string|max:255',
            'file' => 'nullable|mimes:pdf,doc,docx,xlsx,xls,ppt,pptx|max:5120',
        ]);

        $data = [
            'nama_file' => $request->nama_file,
            'updated_at' => now(),
        ];

        if ($request->hasFile('file')) {
            $old = DB::table('renstra')->where('id', $id)->first();
            if ($old && Storage::disk('public')->exists($old->file_path)) {
                Storage::disk('public')->delete($old->file_path);
            }
            $path = $request->file('file')->store('renstra', 'public');
            $data['file_path'] = $path;
        }

        DB::table('renstra')->where('id', $id)->update($data);

        return redirect()->route('admin.renstra')->with('success', 'File Renstra berhasil diperbarui.');
    }

    // Hapus file renstra
    public function delete($id)
    {
        $file = DB::table('renstra')->where('id', $id)->first();
        if ($file) {
            if (Storage::disk('public')->exists($file->file_path)) {
                Storage::disk('public')->delete($file->file_path);
            }
            DB::table('renstra')->where('id', $id)->delete();
            return redirect()->back()->with('success', 'File Renstra berhasil dihapus.');
        }

        return redirect()->back()->with('error', 'File tidak ditemukan.');
    }
}
