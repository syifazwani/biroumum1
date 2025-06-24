@extends('layouts.app')

@section('content')
<div class="p-6 max-w-5xl mx-auto">
    <a href="{{ route('admin.dashboard') }}">
        <button class="mb-4 px-4 py-2 rounded bg-gray-300 hover:bg-gray-400 text-gray-800 flex items-center gap-2">
            ← Kembali ke Admin
        </button>
    </a>

    <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Manajemen LKIP</h2>

    {{-- Pesan Sukses --}}
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-800 p-3 rounded mb-6">
            {{ session('success') }}
        </div>
    @endif

    {{-- Form Upload LKIP --}}
    <form action="{{ route('admin.lkip.upload') }}" method="POST" enctype="multipart/form-data" 
          class="bg-white p-6 rounded shadow-md space-y-4 hover:shadow-lg transition">
        @csrf
        <div>
            <label class="block mb-1 text-gray-700 font-medium">Judul</label>
            <input type="text" name="judul" required placeholder="Masukkan Judul LKIP" 
                   class="w-full border border-gray-300 rounded px-3 py-2 text-gray-800 bg-white focus:ring focus:ring-blue-300 focus:outline-none">
        </div>
        <div>
            <label class="block mb-1 text-gray-700 font-medium">Deskripsi</label>
            <textarea name="deskripsi" rows="3" placeholder="Tulis deskripsi singkat..." 
                      class="w-full border border-gray-300 rounded px-3 py-2 text-gray-800 bg-white focus:ring focus:ring-blue-300 focus:outline-none"></textarea>
        </div>
        <div>
            <label class="block mb-1 text-gray-700 font-medium">Unggah File (PDF)</label>
            <input type="file" name="file" required accept=".pdf" 
                   class="w-full border border-gray-300 rounded px-3 py-2 text-gray-800 bg-white focus:ring focus:ring-blue-300 focus:outline-none">
        </div>
        <div class="text-center">
            <button type="submit" class="bg-blue-700 text-white px-6 py-2 rounded hover:bg-blue-800 transition">
                Upload LKIP
            </button>
        </div>
    </form>

    {{-- Daftar LKIP --}}
    @if(count($lkips) > 0)
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 mt-8">
        @foreach($lkips as $lkip)
        <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition p-4 flex flex-col">
            <h4 class="text-lg font-semibold mb-2 text-gray-800 truncate">📄 {{ $lkip->judul }}</h4>
            <p class="text-sm text-gray-600 mb-3 line-clamp-3">{{ $lkip->deskripsi }}</p>

            {{-- Preview PDF --}}
            <div class="h-48 border border-gray-300 mb-3 rounded overflow-hidden bg-gray-50">
                <iframe 
                    src="{{ asset('storage/' . $lkip->file_path) }}#toolbar=0"
                    class="w-full h-full" frameborder="0"></iframe>
            </div>

            <div class="flex justify-between text-sm mt-auto">
                <a href="{{ asset('storage/' . $lkip->file_path) }}" target="_blank" class="text-blue-600 hover:underline">
                    Lihat
                </a>
                <a href="{{ route('admin.lkip.edit', $lkip->id) }}" class="text-yellow-600 hover:underline">
                    Edit
                </a>
                <form action="{{ route('admin.lkip.delete', $lkip->id) }}" method="POST" 
                      onsubmit="return confirm('Yakin hapus file ini?')" class="inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-600 hover:underline">
                        Hapus
                    </button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
    @else
        <p class="text-center text-gray-500 italic mt-8">Tidak ada file LKIP yang tersedia.</p>
    @endif
</div>
@endsection
