@extends('layouts.app')

@section('content')
<div class="p-6">
    <a href="{{ route('admin.dashboard') }}">
        <button class="mb-4 px-4 py-2 rounded bg-gray-300 hover:bg-gray-400 text-gray-800 flex items-center gap-2">
            ← Kembali ke Admin
        </button>
    </a>
    <h2 class="text-2xl font-bold mb-4">Manajemen LKIP</h2>

    @if(session('success'))
        <div class="bg-green-200 text-green-800 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('admin.lkip.upload') }}" method="POST" enctype="multipart/form-data" class="mb-6">
        @csrf
        <label class="block mb-2 font-semibold">Judul</label>
        <input type="text" name="judul" required class="border p-2 rounded w-full mb-2" />

        <label class="block mb-2 font-semibold">Deskripsi</label>
        <textarea name="deskripsi" rows="3" class="border p-2 rounded w-full mb-2"></textarea>

        <label class="block mb-2 font-semibold">Unggah File</label>
        <input type="file" name="file" required class="border p-2 rounded w-full mb-2" accept=".pdf" />

        <button type="submit" class="bg-blue-700 text-white px-4 py-2 rounded hover:bg-blue-800">Upload</button>
    </form>

    @if(count($lkips) > 0)
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        @foreach($lkips as $lkip)
        <div class="bg-white rounded-lg shadow p-4">
            <h4 class="text-lg font-semibold mb-1 truncate">📄 {{ $lkip->judul }}</h4>
            <p class="text-sm text-gray-600 mb-3">{{ $lkip->deskripsi }}</p>

            {{-- Preview PDF --}}
            <div class="h-48 border mb-3 rounded overflow-hidden">
                <iframe 
                    src="{{ asset('storage/' . $lkip->file_path) }}#toolbar=0"
                    class="w-full h-full" 
                    frameborder="0">
                </iframe>
            </div>

            <a href="{{ asset('storage/' . $lkip->file_path) }}" target="_blank" class="text-blue-600 hover:underline">Lihat</a> |
            <a href="{{ route('admin.lkip.edit', $lkip->id) }}" class="text-yellow-600 hover:underline">Edit</a> |
            <form action="{{ route('admin.lkip.delete', $lkip->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin hapus file ini?')">
                @csrf
                @method('DELETE')
                <button class="text-red-600 hover:underline" type="submit">Hapus</button>
            </form>
        </div>
        @endforeach
    </div>
    @else
    <p>Tidak ada file LKIP yang tersedia.</p>
    @endif
</div>
@endsection
