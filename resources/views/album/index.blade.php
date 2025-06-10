@extends('layouts.app')

@section('content')
<a href="{{ route('admin.dashboard') }}">
<button class="mb-4 px-4 py-2 rounded bg-gray-300 hover:bg-gray-400 text-gray-800 flex items-center gap-2">
        ← Kembali ke Admin
      </button>
<div class="container">
    <a href="{{ route('album.create') }}" class="bg-green-500 text-white px-4 py-2 rounded">Tambah Album</a>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-3 mt-3">{{ session('success') }}</div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
        @foreach($albums as $album)
        <div class="bg-white p-4 shadow rounded">
            <img src="{{ asset('storage/' . $album->cover_image) }}" class="w-full h-40 object-cover mb-2">
            <h2 class="font-bold">{{ $album->title }}</h2>
            <div class="mt-3">
                <a href="{{ route('album.edit', $album) }}" class="bg-yellow-500 text-white px-3 py-1 rounded">Edit</a>
                <form action="{{ route('album.destroy', $album) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin hapus?')">
                    @csrf
                    @method('DELETE')
                    <button class="bg-red-600 text-white px-3 py-1 rounded">Hapus</button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
