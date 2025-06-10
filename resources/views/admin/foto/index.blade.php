@extends('layouts.app')

@section('content')
<h1>Daftar Foto</h1>
<a href="{{ route('admin.dashboard') }}">
<button class="mb-4 px-4 py-2 rounded bg-gray-300 hover:bg-gray-400 text-gray-800 flex items-center gap-2">
        ← Kembali ke Admin
      </button>
<a href="{{ route('foto.create') }}">Tambah Foto</a>

@if(session('success'))
    <div>{{ session('success') }}</div>
@endif

<table border="1" cellpadding="8" cellspacing="0">
    <thead>
        <tr>
            <th>ID</th>
            <th>Album</th>
            <th>Foto</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($fotos as $foto)
        <tr>
            <td>{{ $foto->id }}</td>
            <td>{{ $foto->album->title ?? 'Tidak ada album' }}</td>
            <td><img src="{{ asset('storage/' . $foto->image_path) }}" alt="Foto" width="100"></td>
            <td>
                <a href="{{ route('admin.foto.edit', $foto->id) }}">Edit</a>
                <form action="{{ route('foto.destroy', $foto->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin hapus foto ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $fotos->links() }}

@endsection
