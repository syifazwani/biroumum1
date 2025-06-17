@extends('layouts.app')

@section('content')
<div class="p-6 max-w-md mx-auto">
    <a href="{{ route('admin.dashboard') }}">
      <button class="mb-4 px-4 py-2 rounded bg-gray-300 hover:bg-gray-400 text-gray-800 flex items-center gap-2">
        ← Kembali ke Admin
      </button>
    </a>
    <h2 class="text-2xl font-bold mb-4">Edit LKIP</h2>

    <form action="{{ route('admin.lkip.update', $lkip->id) }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label class="block mb-2 font-semibold">Judul</label>
        <input type="text" name="judul" required class="border p-2 rounded w-full mb-2" value="{{ $lkip->judul }}" />

        <label class="block mb-2 font-semibold">Deskripsi</label>
        <textarea name="deskripsi" rows="3" class="border p-2 rounded w-full mb-2">{{ $lkip->deskripsi }}</textarea>

        <p class="mb-2">File Lama: <a href="{{ asset('storage/' . $lkip->file_path) }}" target="_blank" class="text-blue-600 hover:underline">{{ basename($lkip->file_path) }}</a></p>

        <label class="block mb-2 font-semibold">Ganti File (opsional)</label>
        <input type="file" name="file" class="border p-2 rounded w-full mb-4" />

        <button type="submit" class="bg-yellow-600 text-white px-4 py-2 rounded hover:bg-yellow-700">Update</button>
    </form>
</div>
@endsection
