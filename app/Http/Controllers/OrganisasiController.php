<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class OrganisasiController extends Controller
{
    public function index()
    {
        $lkips = DB::table('lkip')->orderBy('created_at', 'desc')->get();
        $struktur = DB::table('struktur_organisasi')->orderBy('id', 'desc')->first();
        $laporans = DB::table('laporan_keuangan')->get();
        $files = DB::table('renstra')->orderBy('created_at', 'desc')->get(); // ⬅️ Tambahkan baris ini

        return view('organisasi', compact('lkips', 'struktur', 'laporans', 'files'));
    }
}
