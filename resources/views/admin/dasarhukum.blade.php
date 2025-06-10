@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6">Admin Dasar Hukum</h1>

    @if(session('success'))
        <div class="mb-4 p-3 bg-green-200 text-green-800 rounded">{{ session('success') }}</div>
    @endif

    {{-- Form Upload Baru --}}
    <div class="mb-8 p-4 border rounded shadow bg-wheat">
        <h2 class="text-xl font-semibold mb-3">Upload Dasar Hukum Baru</h2>
        <form action="{{ url('admin/dasarhukum/upload') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="nama_file" class="block font-medium mb-1">Nama File</label>
                <input type="text" name="nama_file" id="nama_file" class="w-full border rounded p-2" required value="{{ old('nama_file') }}">
                @error('nama_file') <p class="text-red-600 mt-1">{{ $message }}</p> @enderror
            </div>
            <div class="mb-4">
                <label for="file" class="block font-medium mb-1">Pilih File PDF</label>
                <input type="file" name="file" id="file" accept="application/pdf" required>
                @error('file') <p class="text-red-600 mt-1">{{ $message }}</p> @enderror
            </div>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Upload</button>
        </form>
    </div>

    {{-- Daftar Dasar Hukum --}}
    <div class="space-y-8">
        @foreach($dasarHukum as $item)
        <div class="p-4 border rounded shadow bg-white space-y-4">
            <div>
                <label class="block font-medium mb-1">Nama File</label>
                <iframe src="{{ asset('storage/' . $item->path) }}#toolbar=0" class="w-full h-[400px] border rounded" frameborder="0"></iframe>
                @if($item->path)
                    <a href="{{ Storage::url($item->path) }}" target="_blank" class="text-blue-600 underline mt-1 inline-block">Lihat File Saat Ini</a>
                @endif
            </div>

            <div class="flex gap-3 items-start">
                {{-- Form Update --}}
                <form action="{{ url('admin/dasarhukum/update/' . $item->id) }}" method="POST" enctype="multipart/form-data" class="flex-1 space-y-3">
                    @csrf
                    <div>
                        <label class="block font-medium mb-1">Nama File</label>
                        <input type="text" name="nama_file" value="{{ old('nama_file', $item->nama_file) }}" class="w-full border rounded p-2" required>
                    </div>
                    <div>
                        <label class="block font-medium mb-1">Ganti File (Opsional)</label>
                        <input type="file" name="file" accept="application/pdf">
                    </div>
                    <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">Update</button>
                </form>

                {{-- Form Hapus --}}
<form action="{{ url('admin/dasarhukum/delete/' . $item->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('DELETE')
    <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">Hapus</button>
</form>


            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
