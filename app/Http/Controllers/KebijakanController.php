<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class KebijakanController extends Controller
{
    public function index()
    {
        $kebijakans = DB::table('kebijakan')->latest('id')->get();
        return view('admin.kebijakan', compact('kebijakans'));
    }

    public function upload(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'file' => 'required|mimes:pdf|max:5120',
        ]);

        $path = $request->file('file')->store('kebijakan', 'public');

        DB::table('kebijakan')->insert([
            'judul' => $request->judul,
            'file_path' => $path,
            'created_at' => now()
        ]);

        return redirect()->back()->with('success', 'File kebijakan berhasil diunggah.');
    }

    public function delete($id)
    {
        $kebijakan = DB::table('kebijakan')->where('id', $id)->first();

        if ($kebijakan) {
            // Hapus file dari storage
            if (Storage::disk('public')->exists($kebijakan->file_path)) {
                Storage::disk('public')->delete($kebijakan->file_path);
            }

            // Hapus data dari database
            DB::table('kebijakan')->where('id', $id)->delete();

            return redirect()->back()->with('success', 'File kebijakan berhasil dihapus.');
        }

        return redirect()->back()->with('error', 'File tidak ditemukan.');
    }
}
