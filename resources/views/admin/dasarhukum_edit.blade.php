@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4 max-w-lg">
    <h2 class="text-2xl font-bold mb-6">Edit Data Dasar Hukum</h2>

    {{-- Validasi Error --}}
    @if ($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
        <ul class="list-disc list-inside">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    {{-- Success Message --}}
    @if (session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
        {{ session('success') }}
    </div>
    @endif

    <form action="{{ url('admin/dasarhukum/update/' . $dasarHukum->id) }}" method="POST" enctype="multipart/form-data" class="flex flex-col space-y-4">
        @csrf
        <div>
            <label class="block font-medium mb-1" for="nama_file">Nama File</label>
            <input type="text" id="nama_file" name="nama_file" value="{{ old('nama_file', $dasarHukum->nama_file) }}" required
                class="w-full border rounded p-2" />
        </div>

        <div>
            <label class="block font-medium mb-1" for="file">Ganti File (Opsional)</label>
            <input type="file" id="file" name="file" accept="application/pdf" class="w-full" />
        </div>

        @if ($dasarHukum->path)
        <p class="text-sm text-gray-600">File Saat Ini:
            <a href="{{ asset('storage/' . $dasarHukum->path) }}" target="_blank" class="text-blue-600 underline">
                {{ basename($dasarHukum->path) }}
            </a>
        </p>
        @endif

        <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">
            Update
        </button>
    </form>
</div>
@endsection
