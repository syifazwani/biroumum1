<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class VideoController extends Controller
{
    public function index()
    {
        $videos = DB::table('videos')->get();
        return view('videos.index', compact('videos'));
    }

    public function create()
    {
        return view('videos.create');
    }

    public function showVideoGallery()
    {
        // Ambil semua data video dari tabel 'videos'
        $videos = DB::table('videos')->get();

        // Kirim data ke view
        return view('galeri.video', compact('videos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'video_file' => 'nullable|file|mimetypes:video/mp4,video/avi,video/mpeg,video/quicktime|max:51200', // max 50MB
            'video_url' => 'nullable|url|max:255',
            'description' => 'nullable',
        ]);

        // Pastikan minimal salah satu diisi
        if (!$request->hasFile('video_file') && !$request->filled('video_url')) {
            return back()->withErrors(['video_file' => 'Silakan upload file video atau isi URL.'])->withInput();
        }

        // Tentukan URL video berdasarkan upload atau URL input
        if ($request->hasFile('video_file')) {
            $videoFile = $request->file('video_file');
            $fileName = time() . '_' . $videoFile->getClientOriginalName();
            $videoFile->move(public_path('vid'), $fileName); // simpan ke public/vid/
            $videoPath = 'vid/' . $fileName;
        } else {
            // Simpan URL langsung
            $videoPath = $request->video_url;
        }

        DB::table('videos')->insert([
            'title' => $request->title,
            'video_url' => $videoPath,
            'description' => $request->description,
        ]);

        return redirect()->route('videos.index')->with('success', 'Video berhasil ditambahkan');
    }


    public function edit($id)
    {
        $video = DB::table('videos')->where('id', $id)->first();
        if (!$video) {
            return redirect()->route('videos.index')->with('error', 'Video tidak ditemukan');
        }
        return view('videos.edit', compact('video'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'video_url' => 'required|max:255',
            'description' => 'nullable',
        ]);

        DB::table('videos')->where('id', $id)->update([
            'title' => $request->title,
            'video_url' => $request->video_url,
            'description' => $request->description,
        ]);

        return redirect()->route('videos.index')->with('success', 'Video berhasil diupdate');
    }

    public function destroy($id)
    {
        DB::table('videos')->where('id', $id)->delete();
        return redirect()->route('videos.index')->with('success', 'Video berhasil dihapus');
    }
}
