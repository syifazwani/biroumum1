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
            'video_url' => 'required|max:255',
            'description' => 'nullable',
        ]);

        DB::table('videos')->insert([
            'title' => $request->title,
            'video_url' => $request->video_url,
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
