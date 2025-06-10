<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class StrukturOrganisasiPpidController extends Controller
{
    public function index()
    {
        // Ambil semua data, terbaru di atas
        $strukturList = DB::table('struktur_organisasi_ppid')->orderBy('created_at', 'desc')->get();
        return view('admin.strukturorganisasippid.index', compact('strukturList'));
    }

    public function upload(Request $request)
    {
        $request->validate([
            'nama_file' => 'required|string|max:255',
            'file' => 'required|file|mimes:jpg,jpeg,png|max:10240', // max 10MB
        ]);

        $path = $request->file('file')->store('struktur_organisasi_ppid', 'public');

        DB::table('struktur_organisasi_ppid')->insert([
            'nama_file' => $request->nama_file,
            'path' => $path,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect('admin/strukturorganisasippid')->with('success', 'File berhasil di-upload.');
    }

    public function edit($id)
    {
        $struktur = DB::table('struktur_organisasi_ppid')->where('id', $id)->first();
        if (!$struktur) {
            return redirect('admin/strukturorganisasippid')->with('error', 'Data tidak ditemukan.');
        }
        return view('admin.strukturorganisasippid.edit', compact('struktur'));
    }

    public function update(Request $request, $id)
    {
        $struktur = DB::table('struktur_organisasi_ppid')->where('id', $id)->first();
        if (!$struktur) {
            return redirect('admin/strukturorganisasippid')->with('error', 'Data tidak ditemukan.');
        }

        $request->validate([
            'nama_file' => 'required|string|max:255',
            'file' => 'nullable|file|mimes:jpg,jpeg,png|max:10240',
        ]);

        $dataToUpdate = [
            'nama_file' => $request->nama_file,
            'updated_at' => now(),
        ];

        if ($request->hasFile('file')) {
            if ($struktur->path && Storage::disk('public')->exists($struktur->path)) {
                Storage::disk('public')->delete($struktur->path);
            }

            $path = $request->file('file')->store('struktur_organisasi_ppid', 'public');
            $dataToUpdate['path'] = $path;
        }

        DB::table('struktur_organisasi_ppid')->where('id', $id)->update($dataToUpdate);

        return redirect('admin/strukturorganisasippid')->with('success', 'Data berhasil di-update.');
    }

    public function destroy($id)
    {
        $struktur = DB::table('struktur_organisasi_ppid')->where('id', $id)->first();
        if (!$struktur) {
            return redirect('admin/strukturorganisasippid')->with('error', 'Data tidak ditemukan.');
        }

        if ($struktur->path && Storage::disk('public')->exists($struktur->path)) {
            Storage::disk('public')->delete($struktur->path);
        }

        DB::table('struktur_organisasi_ppid')->where('id', $id)->delete();

        return redirect('admin/strukturorganisasippid')->with('success', 'Data berhasil dihapus.');
    }
}
