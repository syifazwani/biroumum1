@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4 max-w-3xl">

    <h2 class="text-2xl font-bold mb-6">Kelola Struktur Organisasi PPID</h2>

    {{-- Success Message --}}
    @if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
        {{ session('success') }}
    </div>
    @endif

    {{-- Error Message --}}
    @if(session('error'))
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
        {{ session('error') }}
    </div>
    @endif

    {{-- Form Upload --}}
    <form action="{{ url('admin/strukturorganisasippid/upload') }}" method="POST" enctype="multipart/form-data" class="mb-8 space-y-4">
        @csrf
        <div>
            <label class="block font-medium mb-1">Nama File</label>
            <input type="text" name="nama_file" value="{{ old('nama_file') }}" required
                class="w-full border rounded p-2" />
            @error('nama_file')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block font-medium mb-1">Pilih File Gambar (jpg, jpeg, png)</label>
            <input type="file" name="file" accept=".jpg,.jpeg,.png" required />
            @error('file')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Upload
        </button>
    </form>

    {{-- List Data --}}
    <table class="w-full border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-100">
                <th class="border border-gray-300 px-4 py-2">No</th>
                <th class="border border-gray-300 px-4 py-2">Nama File</th>
                <th class="border border-gray-300 px-4 py-2">Gambar</th>
                <th class="border border-gray-300 px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($strukturList as $index => $item)
            <tr>
                <td class="border border-gray-300 px-4 py-2 text-center">{{ $index + 1 }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $item->nama_file }}</td>
                <td class="border border-gray-300 px-4 py-2 text-center">
                    <img src="{{ asset('storage/' . $item->path) }}" alt="{{ $item->nama_file }}" class="max-h-20 mx-auto" />
                </td>
                <td class="border border-gray-300 px-4 py-2 text-center space-x-2">
                    <a href="{{ url('admin/strukturorganisasippid/edit/' . $item->id) }}"
                        class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded">Edit</a>

                    <form action="{{ url('admin/strukturorganisasippid/delete/' . $item->id) }}" method="POST" class="inline-block"
                        onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="text-center p-4 text-gray-500 italic">Belum ada data.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
