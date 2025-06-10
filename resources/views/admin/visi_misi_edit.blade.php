@extends('layouts.app')

@section('content')
<div class="p-6">
    <a href="{{ route('admin.visi_misi.index') }}">
        <button class="mb-4 px-4 py-2 rounded bg-gray-300 hover:bg-gray-400 text-gray-800 flex items-center gap-2">
            ← Kembali ke Manajemen Visi dan Misi
        </button>
    </a>

    <h2 class="text-2xl font-bold mb-4">Edit File Visi dan Misi</h2>

    <form action="{{ route('admin.visi_misi.update', $item->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label class="block mb-2 font-semibold">Nama File</label>
        <input type="text" name="nama_file" value="{{ old('nama_file', $item->nama_file) }}" required class="border p-2 rounded w-full mb-2" />

        <p class="mb-2">File saat ini: <a href="{{ Storage::url($item->path) }}" target="_blank" class="text-blue-600 hover:underline">{{ $item->nama_file }}</a></p>

        <label class="block mb-2 font-semibold">Ganti File PDF (opsional)</label>
        <input type="file" name="file" accept=".pdf" class="border p-2 rounded w-full mb-4" />

        <button type="submit" class="bg-yellow-600 text-white px-4 py-2 rounded hover:bg-yellow-700">Simpan Perubahan</button>
    </form>
</div>
@endsection
