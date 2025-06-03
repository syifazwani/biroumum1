@extends('layouts.app')

@section('content')
<div class="p-6">
    <a href="{{ route('admin.dashboard') }}">
        <button class="mb-4 px-4 py-2 rounded bg-gray-300 hover:bg-gray-400 text-gray-800 flex items-center gap-2">
            ← Kembali ke Admin
        </button>
    </a>
    <h2 class="text-2xl font-bold mb-4">Manajemen Renstra</h2>

    @if(session('success'))
        <div class="bg-green-200 text-green-800 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('admin.renstra.upload') }}" method="POST" enctype="multipart/form-data" class="mb-6">
        @csrf

        <label class="block mb-2 font-semibold">Nama File</label>
        <input type="text" name="nama_file" required class="border p-2 rounded w-full mb-2" placeholder="Contoh: Renstra 2023-2026">

        <label class="block mb-2 font-semibold">Unggah File</label>
        <input type="file" name="file" required class="border p-2 rounded w-full mb-2" />

        <button type="submit" class="bg-blue-700 text-white px-4 py-2 rounded hover:bg-blue-800">Upload</button>
    </form>

    @if(count($files) > 0)
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        @foreach($files as $file)
        <div class="bg-white rounded-lg shadow p-4">
            <h4 class="text-lg font-semibold mb-2 truncate">📄 {{ $file->nama_file }}</h4>

            {{-- Preview PDF --}}
            <div class="h-48 border mb-3 rounded overflow-hidden">
                <iframe 
                    src="{{ asset('storage/' . $file->file_path) }}#toolbar=0&navpanes=0&scrollbar=0"
                    class="w-full h-full" 
                    frameborder="0">
                </iframe>
            </div>

            <a href="{{ asset('storage/' . $file->file_path) }}" target="_blank" class="text-blue-600 hover:underline">Lihat</a> |
            <a href="{{ route('admin.renstra.edit', $file->id) }}" class="text-yellow-600 hover:underline">Edit</a> |
            <form action="{{ route('admin.renstra.delete', $file->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin hapus file ini?')">
                @csrf
                @method('DELETE')
                <button class="text-red-600 hover:underline" type="submit">Hapus</button>
            </form>
        </div>
        @endforeach
    </div>
    @else
        <p>Tidak ada file Renstra yang tersedia.</p>
    @endif
</div>
@endsection
