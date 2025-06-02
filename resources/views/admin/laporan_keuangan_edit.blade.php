@extends('layouts.app')

@section('content')
<div class="p-6">
    <a href="{{ route('admin.laporan_keuangan') }}">
      <button class="mb-4 px-4 py-2 rounded bg-gray-300 hover:bg-gray-400 text-gray-800 flex items-center gap-2">
        ← Kembali ke Admin
      </button>
    </a>
    <h2 class="text-2xl font-bold mb-4">Edit Laporan Keuangan</h2>

    <form action="{{ route('admin.laporan_keuangan.update', $laporan->id) }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label class="block mb-1 font-semibold">Judul</label>
        <input type="text" name="judul" value="{{ $laporan->judul }}" class="border p-2 rounded w-full mb-2" required>

        <label class="block mb-1 font-semibold">Deskripsi</label>
        <textarea name="deskripsi" rows="3" class="border p-2 rounded w-full mb-2">{{ $laporan->deskripsi }}</textarea>

        <label class="block mb-1 font-semibold">Ganti File (PDF)</label>
        <input type="file" name="file" class="border p-2 rounded w-full mb-4">

        <button type="submit" class="bg-yellow-600 text-white px-4 py-2 rounded hover:bg-yellow-700">Update</button>
    </form>
</div>
@endsection
