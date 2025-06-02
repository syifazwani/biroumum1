@extends('layouts.app')

@section('content')
<div class="p-6">
    <a href="{{ route('admin.dashboard') }}">
      <button class="mb-4 px-4 py-2 rounded bg-gray-300 hover:bg-gray-400 text-gray-800 flex items-center gap-2">
        ← Kembali ke Admin
      </button>
    </a>
    <h2 class="text-2xl font-bold mb-4">Manajemen Laporan Keuangan</h2>

    @if(session('success'))
        <div class="bg-green-200 text-green-800 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('admin.laporan_keuangan.upload') }}" method="POST" enctype="multipart/form-data" class="mb-6">
        @csrf
        <label class="block mb-1 font-semibold">Judul</label>
        <input type="text" name="judul" required class="border p-2 rounded w-full mb-2" />

        <label class="block mb-1 font-semibold">Deskripsi</label>
        <textarea name="deskripsi" rows="3" class="border p-2 rounded w-full mb-2"></textarea>

        <label class="block mb-1 font-semibold">File PDF</label>
        <input type="file" name="file" required class="border p-2 rounded w-full mb-2" />

        <button type="submit" class="bg-blue-700 text-white px-4 py-2 rounded hover:bg-blue-800">Upload</button>
    </form>

    <table class="min-w-full table-auto border-collapse border">
        <thead class="bg-gray-200">
            <tr>
                <th class="p-2 border">Judul</th>
                <th class="p-2 border">Deskripsi</th>
                <th class="p-2 border">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($laporans as $laporan)
            <tr>
                <td class="p-2 border">{{ $laporan->judul }}</td>
                <td class="p-2 border">{{ $laporan->deskripsi }}</td>
                <td class="p-2 border">
                    <a href="{{ asset('storage/' . $laporan->file_path) }}" target="_blank" class="text-blue-600 hover:underline">Lihat</a> |
                    <a href="{{ route('admin.laporan_keuangan.edit', $laporan->id) }}" class="text-yellow-600 hover:underline">Edit</a> |
                    <form action="{{ route('admin.laporan_keuangan.delete', $laporan->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin hapus?')">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-600 hover:underline" type="submit">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
