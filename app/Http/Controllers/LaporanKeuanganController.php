<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class LaporanKeuanganController extends Controller
{
    public function index()
    {
        $laporans = DB::table('laporan_keuangan')->get();
        return view('admin.laporan_keuangan', compact('laporans'));
    }

    public function upload(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'file' => 'required|mimes:pdf|max:5120',
        ]);

        $path = $request->file('file')->store('laporan_keuangan', 'public');

        DB::table('laporan_keuangan')->insert([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'file_path' => $path,
            'created_at' => now(),
        ]);

        return redirect()->back()->with('success', 'File Laporan Keuangan berhasil diunggah.');
    }

    public function edit($id)
    {
        $laporan = DB::table('laporan_keuangan')->where('id', $id)->first();
        return view('admin.laporan_keuangan_edit', compact('laporan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'file' => 'nullable|mimes:pdf|max:5120',
        ]);

        $data = [
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'updated_at' => now(),
        ];

        if ($request->hasFile('file')) {
            $old = DB::table('laporan_keuangan')->where('id', $id)->first();
            if ($old && Storage::disk('public')->exists($old->file_path)) {
                Storage::disk('public')->delete($old->file_path);
            }
            $path = $request->file('file')->store('laporan_keuangan', 'public');
            $data['file_path'] = $path;
        }

        DB::table('laporan_keuangan')->where('id', $id)->update($data);

        return redirect()->route('admin.laporan_keuangan')->with('success', 'File Laporan Keuangan berhasil diperbarui.');
    }

    public function delete($id)
    {
        $laporan = DB::table('laporan_keuangan')->where('id', $id)->first();
        if ($laporan && Storage::disk('public')->exists($laporan->file_path)) {
            Storage::disk('public')->delete($laporan->file_path);
        }

        DB::table('laporan_keuangan')->where('id', $id)->delete();

        return redirect()->back()->with('success', 'File Laporan Keuangan berhasil dihapus.');
    }

    public function showLaporanKeuangan()
    {
        $laporans = DB::table('laporan_keuangan')->get();
        return view('front.laporan_keuangan', compact('laporans'));
    }

}
