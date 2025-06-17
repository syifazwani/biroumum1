@extends('layouts.admin')

@section('content')
    <div class="mb-4">
        <a href="{{ route('admin.dashboard') }}">
      <button class="mb-4 px-4 py-2 rounded bg-gray-300 hover:bg-gray-400 text-gray-800 flex items-center gap-2">
        ← Kembali ke Admin
      </button>
        <h1 class="text-2xl font-bold">Tugas dan Fungsi</h1>
        <a href="{{ route('tugasfungsi.create') }}" class="mt-2 inline-block bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">+ Tambah File</a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <ul class="space-y-3">
        @forelse($tugas_fungsi as $item)
            <li class="border p-4 rounded shadow flex justify-between items-center">
                <div>
                    {{ $item->nama_file }}
                    <a href="{{ Storage::url($item->path) }}" target="_blank" class="text-blue-600 underline ml-2">Download</a>
                </div>
                <form action="{{ route('tugasfungsi.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus file ini?')">
                    @csrf
                    @method('DELETE')

                    <button class="text-red-600 hover:underline">Hapus</button>
                </form>
            </li>
        @empty
            <li>Tidak ada data.</li>
        @endforelse
    </ul>
@endsection
