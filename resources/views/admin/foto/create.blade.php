@extends('layouts.app')

@section('content')
<h1>Tambah Foto</h1>
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

<form action="{{ route('foto.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="album_id">Album:</label>
    <select name="album_id" id="album_id" required>
        <option value="">-- Pilih Album --</option>
        @foreach($albums as $album)
            <option value="{{ $album->id }}" {{ old('album_id') == $album->id ? 'selected' : '' }}>
                {{ $album->title }}
            </option>
        @endforeach
    </select>
    <br><br>

    <label for="file">Foto:</label>
    <input type="file" name="file" id="file" required>
    <br><br>

    <button type="submit">Simpan</button>
</form>

<a href="{{ route('foto.index') }}">Kembali ke daftar foto</a>
@endsection
