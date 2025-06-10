<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DasarHukumController extends Controller
{
    public function index()
    {
        // Ambil semua data dasar hukum, terbaru di atas
        $dasarHukum = DB::table('dasar_hukum')->orderBy('created_at', 'desc')->get();

        // Tampilkan view admin dengan data
        return view('admin.dasarhukum', compact('dasarHukum'));
    }

    public function upload(Request $request)
    {
        $request->validate([
            'nama_file' => 'required|string|max:255',
            'file' => 'required|file|mimes:pdf|max:10240', // max 10MB
        ]);

        // Simpan file ke storage (public)
        $path = $request->file('file')->store('dasar_hukum_files', 'public');

        // Insert data ke database
        DB::table('dasar_hukum')->insert([
            'nama_file' => $request->nama_file,
            'path' => $path,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect('admin/dasarhukum')->with('success', 'File dasar hukum berhasil di-upload.');
    }

    public function destroy($id)
    {
        // Ambil data dasar hukum berdasarkan id
        $data = DB::table('dasar_hukum')->where('id', $id)->first();

        if (!$data) {
            return redirect('admin/dasarhukum')->with('error', 'Data tidak ditemukan.');
        }

        // Hapus file lama jika ada di storage
        if ($data->path && Storage::disk('public')->exists($data->path)) {
            Storage::disk('public')->delete($data->path);
        }

        // Hapus data dari database
        DB::table('dasar_hukum')->where('id', $id)->delete();

        return redirect('admin/dasarhukum')->with('success', 'Data dasar hukum berhasil dihapus.');
    }

    public function update(Request $request, $id)
    {
        // Ambil data dulu (bisa dengan first())
        $item = DB::table('dasar_hukum')->where('id', $id)->first();

        if (!$item) {
            return redirect('admin/dasarhukum')->with('error', 'Data tidak ditemukan.');
        }

        // Validasi input
        $request->validate([
            'nama_file' => 'required|string|max:255',
            'file' => 'nullable|file|mimes:pdf|max:10240', // max 10MB
        ]);

        $dataToUpdate = [
            'nama_file' => $request->input('nama_file'),
            'updated_at' => now(),
        ];

        if ($request->hasFile('file')) {
            // Hapus file lama jika ada di storage public/dasar_hukum_files
            if ($item->path && Storage::disk('public')->exists($item->path)) {
                Storage::disk('public')->delete($item->path);
            }

            // Simpan file baru ke folder dasar hukum yang sama
            $path = $request->file('file')->store('dasar_hukum_files', 'public');
            $dataToUpdate['path'] = $path;
        }

        // Update data di database
        DB::table('dasar_hukum')->where('id', $id)->update($dataToUpdate);

        return redirect('admin/dasarhukum')->with('success', 'Data dasar hukum berhasil di-update.');
    }



}
