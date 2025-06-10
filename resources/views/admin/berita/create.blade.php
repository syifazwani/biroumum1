@extends('layouts.app')

@section('content')
<h1>Tambah Berita Baru</h1>

<form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label>Judul</label>
        <input type="text" name="title" class="form-control" required value="{{ old('title') }}">
    </div>
    <div class="mb-3">
        <label>Isi Konten</label>
        <textarea name="content" class="form-control" rows="5" required>{{ old('content') }}</textarea>
    </div>
    <div class="mb-3">
        <label>Gambar (Upload)</label>
        <input type="file" name="image" class="form-control">
    </div>
    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="{{ route('admin.berita.index') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection
