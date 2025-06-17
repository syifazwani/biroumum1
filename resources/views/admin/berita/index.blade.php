@extends('layouts.app')

@section('content')
<div class="p-6 bg-white shadow rounded-lg">
    {{-- Tombol Kembali --}}
    <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center gap-2 px-4 py-2 mb-4 bg-gray-200 text-gray-800 hover:bg-gray-300 rounded transition">
        ← Kembali ke Admin
    </a>

    {{-- Header --}}
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-xl font-bold text-gray-800">Daftar Berita</h1>
        <a href="{{ url('/admin/berita/create') }}"
           class="inline-block px-4 py-2 bg-blue-100 text-blue-800 border border-blue-300 rounded hover:bg-blue-200 transition">
            + Tambah Berita
        </a>
    </div>

    {{-- Alert Sukses --}}
    @if(session('success'))
        <div class="mb-4 px-4 py-2 bg-green-100 border border-green-300 text-green-800 rounded">
            {{ session('success') }}
        </div>
    @endif

    {{-- Tabel --}}
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200 rounded shadow-sm">
            <thead class="bg-gray-100 text-gray-700">
                <tr>
                    <th class="text-left px-4 py-2 border-b">Judul</th>
                    <th class="text-left px-4 py-2 border-b">Slug</th>
                    <th class="text-left px-4 py-2 border-b">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($beritas as $berita)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2 border-b text-gray-800">{{ $berita->title }}</td>
                        <td class="px-4 py-2 border-b text-sm text-gray-600">{{ $berita->slug }}</td>
                        <td class="px-4 py-2 border-b space-x-2">
                            <a href="{{ url('/admin/berita/' . $berita->id . '/edit') }}"
                               class="inline-block px-3 py-1 bg-yellow-100 text-yellow-800 border border-yellow-300 rounded hover:bg-yellow-200 text-sm">
                                Edit
                            </a>
                            <form action="{{ url('/admin/berita/' . $berita->id) }}" method="POST"
                                  class="inline-block"
                                  onsubmit="return confirm('Yakin ingin hapus?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="px-3 py-1 bg-red-100 text-red-800 border border-red-300 rounded hover:bg-red-200 text-sm">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="px-4 py-2 text-center text-gray-500">Belum ada berita.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
