<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;

class CKEditorController extends Controller
{
    public function upload(Request $request)
    {
        if ($request->hasFile('upload')) {
            $file = $request->file('upload');
            $filename = time() . '_' . preg_replace('/[^a-zA-Z0-9_\-\.]/', '', $file->getClientOriginalName());
            $file->storeAs('public/uploads', $filename);

            return response()->json([
                'uploaded' => 1,
                'fileName' => $filename,
                'url' => asset('storage/uploads/' . $filename),
            ]);
        }

        return response()->json(['uploaded' => 0, 'error' => ['message' => 'No file uploaded.']]);
    }

}

