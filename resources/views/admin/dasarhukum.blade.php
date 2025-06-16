@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <a href="{{ route('admin.dashboard') }}">
        <button class="mb-4 px-4 py-2 rounded bg-gray-300 hover:bg-gray-400 text-gray-800 flex items-center gap-2 transition">
            ← Kembali ke Admin
        </button>
    </a>

    <h1 class="text-3xl font-bold mb-6 text-center text-gray-800">Admin Dasar Hukum</h1>

    @if(session('success'))
        <div class="mb-4 p-3 bg-green-200 text-green-800 rounded shadow">{{ session('success') }}</div>
    @endif

    {{-- Form Upload Baru --}}
    <div class="mb-8 p-6 border rounded-xl shadow bg-white">
        <h2 class="text-xl font-semibold mb-4 text-gray-700">Upload Dasar Hukum Baru</h2>
        <form action="{{ url('admin/dasarhukum/upload') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            <div>
                <label for="nama_file" class="block font-semibold mb-1 text-gray-700">Nama File</label>
                <input type="text" name="nama_file" id="nama_file" class="w-full border-gray-300 border rounded p-2 focus:ring-2 focus:ring-blue-400" required value="{{ old('nama_file') }}">
                @error('nama_file') <p class="text-red-600 mt-1">{{ $message }}</p> @enderror
            </div>
            <div>
                <label for="file" class="block font-semibold mb-1 text-gray-700">Pilih File PDF</label>
                <input type="file" name="file" id="file" accept="application/pdf" required class="block text-gray-800">
                @error('file') <p class="text-red-600 mt-1">{{ $message }}</p> @enderror
            </div>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">Upload</button>
        </form>
    </div>

    {{-- Daftar Dasar Hukum --}}
    <div class="space-y-8">
        @foreach($dasarHukum as $item)
        <div class="p-6 border rounded-xl shadow bg-white space-y-4 hover:shadow-lg transition">
            <div>
                <label class="block font-semibold mb-1 text-gray-700">Nama File:</label>
                <p class="mb-2 text-gray-800">{{ $item->nama_file }}</p>
                <iframe src="{{ asset('storage/' . $item->path) }}#toolbar=0" class="w-full h-[400px] border rounded" frameborder="0"></iframe>
                @if($item->path)
                    <a href="{{ Storage::url($item->path) }}" target="_blank" class="text-blue-600 underline mt-2 inline-block hover:text-blue-800 transition">Lihat File PDF</a>
                @endif
            </div>

            <div class="flex flex-col sm:flex-row gap-4">
                {{-- Form Update --}}
                <form action="{{ url('admin/dasarhukum/update/' . $item->id) }}" method="POST" enctype="multipart/form-data" class="flex-1 space-y-4">
                    @csrf
                    <div>
                        <label class="block font-semibold mb-1 text-gray-700">Edit Nama File</label>
                        <input type="text" name="nama_file" value="{{ old('nama_file', $item->nama_file) }}" class="w-full border-gray-300 border rounded p-2 focus:ring-2 focus:ring-yellow-400" required>
                    </div>
                    <div>
                        <label class="block font-semibold mb-1 text-gray-700">Ganti File (Opsional)</label>
                        <input type="file" name="file" accept="application/pdf" class="block text-gray-800">
                    </div>
                    <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600 transition">Update</button>
                </form>

                {{-- Form Hapus --}}
                <form action="{{ url('admin/dasarhukum/delete/' . $item->id) }}" method="POST" class="flex items-start">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 transition">Hapus</button>
                </form>
            </div>
        </div>
        @endforeach
    </div>

</div>
@endsection
