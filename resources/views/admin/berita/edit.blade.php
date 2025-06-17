@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto p-6 bg-white shadow rounded-lg">
    <h1 class="text-2xl font-bold text-gray-800 mb-4">Edit Berita</h1>

    {{-- Tampilkan error validasi jika ada --}}
    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-100 border border-red-400 rounded text-red-700">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- Judul --}}
        <div class="mb-4">
            <label for="title" class="block text-sm font-medium text-gray-700">Judul</label>
            <input type="text" name="title" id="title"
                   class="w-full px-4 py-2 border border-gray-300 rounded bg-gray-50 text-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-500"
                   required value="{{ old('title', $berita->title) }}">
        </div>

        {{-- Link Eksternal (Opsional) --}}
        <div class="mb-4">
            <label for="external_link" class="block text-sm font-medium text-gray-700">Link Eksternal Berita</label>
            <input type="url" name="external_link" id="external_link"
                   class="w-full px-4 py-2 border border-gray-300 rounded bg-gray-50 text-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-500"
                   value="{{ old('external_link', $berita->external_link ?? '') }}">
        </div>

        {{-- Konten --}}
        <div class="mb-4">
            <label for="content" class="block text-sm font-medium text-gray-700">Isi Berita</label>
            <textarea name="content" id="content" rows="6"
                      class="w-full px-4 py-2 border border-gray-300 rounded bg-gray-50 text-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-500"
                      required>{{ old('content', $berita->content) }}</textarea>
        </div>

        {{-- Gambar (Opsional) --}}
        <div class="mb-4">
            <label for="image" class="block text-sm font-medium text-gray-700">Gambar (Opsional)</label>
            <input type="file" name="image" id="image"
                   class="w-full px-4 py-2 border border-gray-300 rounded bg-white text-gray-900">
            @if ($berita->image)
                <div class="mt-2">
                    <p class="text-sm text-gray-600">Gambar saat ini:</p>
                    <img src="{{ asset('storage/' . $berita->image) }}" alt="Gambar Berita" class="h-32 rounded shadow">
                </div>
            @endif
        </div>

        {{-- Tombol --}}
        <div class="flex items-center gap-3 pt-2">
            <button type="submit"
                    class="px-5 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                Simpan
            </button>
            <a href="{{ route('admin.berita.index') }}"
               class="px-5 py-2 bg-gray-200 text-gray-800 rounded hover:bg-gray-300 transition">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection
