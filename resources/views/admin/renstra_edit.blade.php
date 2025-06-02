@extends('layouts.app')

@section('content')
<div class="p-6">
    <a href="{{ route('admin.renstra') }}">
      <button class="mb-4 px-4 py-2 rounded bg-gray-300 hover:bg-gray-400 text-gray-800 flex items-center gap-2">
        ← Kembali ke Admin Renstra
      </button>
    </a>
    <h2 class="text-2xl font-bold mb-4">Edit File Renstra</h2>

    <form action="{{ route('admin.renstra.update', $file->id) }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label class="block mb-2">Nama File Baru</label>
        <input type="text" name="nama_file" value="{{ $file->nama_file }}" class="border p-2 rounded w-full mb-4" required>

        <label class="block mb-2">Ganti File (opsional)</label>
        <input type="file" name="file" class="border p-2 rounded w-full mb-4">

        <button type="submit" class="bg-yellow-600 text-white px-4 py-2 rounded hover:bg-yellow-700">Update</button>
    </form>
</div>
@endsection
