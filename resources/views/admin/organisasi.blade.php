@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4 max-w-3xl">
    <h1 class="text-2xl font-bold mb-4 text-gray-800 text-center animate-fade-in">Update Struktur Organisasi</h1>

    <a href="{{ route('admin.dashboard') }}">
        <button class="mb-4 px-4 py-2 rounded bg-gray-300 hover:bg-gray-400 text-gray-800 flex items-center gap-2">
            ← Kembali ke Admin
        </button>
    </a>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-3 rounded mb-4 animate-fade-in">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('admin.organisasi.upload') }}" enctype="multipart/form-data"
          class="bg-white p-6 rounded shadow space-y-4 transition transform hover:scale-[1.01]">
        @csrf
        <div>
            <label class="block font-medium text-gray-700 mb-1">Pilih File Gambar (jpg, jpeg, png)</label>
            <input type="file" name="image" required 
                   class="w-full text-gray-800 bg-white border border-gray-300 rounded p-2 focus:ring focus:ring-blue-300 file:mr-4 
                          file:py-2 file:px-4 file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
        </div>

        <button type="submit" 
                class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition w-full">
            Upload
        </button>
    </form>

    @if($image)
        <h2 class="text-lg font-semibold mt-6 text-gray-800">Gambar Saat Ini:</h2>
        <img src="{{ asset('storage/' . $image->image_path) }}" 
             class="max-w-xl mt-2 rounded shadow border border-gray-300 p-2 bg-white mx-auto">
    @endif
</div>
@endsection
