@extends('layouts.app')

@section('content')
<h1>Edit Foto</h1>
<a href="{{ route('admin.dashboard') }}">
<button class="mb-4 px-4 py-2 rounded bg-gray-300 hover:bg-gray-400 text-gray-800 flex items-center gap-2">
        ← Kembali ke Admin
      </button>
@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $err)
                <li>{{ $err }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('admin.foto.update', $foto->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <label for="album_id">Album:</label>
    <select name="album_id" id="album_id" required>
        <option value="">-- Pilih Album --</option>
        @foreach($albums as $album)
            <option value="{{ $album->id }}" {{ $foto->album_id == $album->id ? 'selected' : '' }}>
                {{ $album->title }}
            </option>
        @endforeach
    </select>
    <br><br>

    <label>Foto saat ini:</label><br>
    <img src="{{ asset('storage/' . $foto->image_path) }}" alt="Foto" width="150"><br><br>

    <label for="file">Ganti Foto (opsional):</label>
    <input type="file" name="file" id="file">
    <br><br>

    <button type="submit">Update</button>
</form>

<a href="{{ route('foto.index') }}">Kembali ke daftar foto</a>
@endsection
