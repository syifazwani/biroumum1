<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Routing\Controller;

class CKEditorController extends Controller
{
    public function upload(Request $request)
{
    if($request->hasFile('upload')) {
        $file = $request->file('upload');
        $filename = time() . '_' . $file->getClientOriginalName();
        $path = $file->storeAs('public/ckeditor_images', $filename);

        $url = Storage::url($path); // otomatis menjadi "/storage/ckeditor_images/namafile.jpg"

        return response()->json([
            'uploaded' => 1, // penting, CKEditor butuh ini
            'fileName' => $filename,
            'url' => $url   // ini akan jadi src img di CKEditor
        ]);
    }

    // Kalau gagal upload
    return response()->json([
        'uploaded' => 0,
        'error' => ['message' => 'Gagal upload gambar.']
    ]);
}
}
