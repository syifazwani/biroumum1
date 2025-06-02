<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class LkipController extends Controller
{
    public function index()
    {
        $lkips = DB::table('lkip')->orderBy('created_at', 'desc')->get();
        return view('admin.lkip', compact('lkips'));
    }

    public function upload(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'file' => 'required|mimes:pdf,doc,docx,xlsx,xls,ppt,pptx|max:5120',
        ]);

        $path = $request->file('file')->store('lkip', 'public');

        DB::table('lkip')->insert([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'file_path' => $path,
            'created_at' => now(),
        ]);

        return redirect()->back()->with('success', 'File LKIP berhasil diunggah.');
    }

    public function edit($id)
    {
        $lkip = DB::table('lkip')->where('id', $id)->first();
        return view('admin.lkip_edit', compact('lkip'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'file' => 'nullable|mimes:pdf,doc,docx,xlsx,xls,ppt,pptx|max:5120',
        ]);

        $data = [
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'updated_at' => now(),
        ];

        if ($request->hasFile('file')) {
            $old = DB::table('lkip')->where('id', $id)->first();
            if ($old && Storage::disk('public')->exists($old->file_path)) {
                Storage::disk('public')->delete($old->file_path);
            }
            $path = $request->file('file')->store('lkip', 'public');
            $data['file_path'] = $path;
        }

        DB::table('lkip')->where('id', $id)->update($data);

        return redirect()->route('admin.lkip')->with('success', 'File LKIP berhasil diperbarui.');
    }

    public function delete($id)
    {
        $lkip = DB::table('lkip')->where('id', $id)->first();
        if ($lkip && Storage::disk('public')->exists($lkip->file_path)) {
            Storage::disk('public')->delete($lkip->file_path);
        }

        DB::table('lkip')->where('id', $id)->delete();

        return redirect()->back()->with('success', 'File LKIP berhasil dihapus.');
    }
}
