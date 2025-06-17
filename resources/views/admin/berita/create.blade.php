@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto p-6 bg-white shadow rounded-lg">
    <h1 class="text-2xl font-bold text-gray-800 mb-4">Tambah Berita Baru</h1>

    <form action="{{ route('admin.berita.store') }}" method="POST" class="space-y-4">
        @csrf

        {{-- Input Judul --}}
        <div>
            <label for="title" class="block text-sm font-medium text-gray-700">Judul</label>
            <input type="text" name="title" id="title"
                   class="w-full px-4 py-2 border border-gray-300 rounded text-gray-900 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500"
                   required value="{{ old('title') }}">
        </div>

        {{-- Input Link Eksternal --}}
        <div>
            <label for="external_link" class="block text-sm font-medium text-gray-700">Link Eksternal Berita</label>
            <input type="url" name="external_link" id="external_link" placeholder="https://..."
                   class="w-full px-4 py-2 border border-gray-300 rounded text-gray-900 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500"
                   required value="{{ old('external_link') }}">
        </div>

        {{-- Tombol Aksi --}}
        <div class="flex items-center gap-3 pt-2">
            <button type="submit"
                    class="px-5 py-2 bg-green-600 text-white rounded hover:bg-green-700 transition">
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
