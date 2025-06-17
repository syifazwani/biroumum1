@extends('layouts.app')

@section('content')
<div class="p-6 max-w-5xl mx-auto text-gray-800">
    <a href="{{ route('admin.dashboard') }}">
        <button class="mb-6 px-4 py-2 rounded bg-gray-300 hover:bg-gray-400 text-gray-800 flex items-center gap-2">
            ← Kembali ke Admin
        </button>
    </a>

    <h2 class="text-2xl font-bold text-gray-800 mb-6">Admin: Ada Apa di Balai Kota</h2>

    <a href="/admin/balai/create" class="mb-6 inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
        + Tambah Konten
    </a>

    <div class="overflow-x-auto">
        <table class="w-full table-auto border border-gray-300 rounded-lg shadow-sm">
            <thead class="bg-gray-100 text-gray-700">
                <tr>
                    <th class="border px-4 py-3 text-left">Judul</th>
                    <th class="border px-4 py-3 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @forelse($items as $item)
                    <tr class="hover:bg-gray-50">
                        <td class="border px-4 py-2">{{ $item->title }}</td>
                        <td class="border px-4 py-2">
                            <a href="/admin/balai/{{ $item->id }}/edit" class="text-blue-600 hover:underline">Edit</a>
                            |
                            <form action="/admin/balai/{{ $item->id }}" method="POST" class="inline-block ml-2" onsubmit="return confirm('Yakin ingin menghapus?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2" class="text-center text-gray-500 px-4 py-6">Belum ada konten balai.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
