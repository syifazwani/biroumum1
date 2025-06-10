@extends('layouts.app')

@section('content')
<h1>Edit Berita</h1>

<form action="{{ route('admin.berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label>Judul</label>
        <input type="text" name="title" class="form-control" required value="{{ old('title', $berita->title) }}">
    </div>
    <div class="mb-3">
        <label>Isi Konten</label>
        <textarea name="content" class="form-control" rows="5" required>{{ old('content', $berita->content) }}</textarea>
    </div>
    <div class="mb-3">
        <label>Gambar (Upload Baru, jika ingin ganti)</label>
        <input type="file" name="image" class="form-control">
        @if ($berita->image)
            <small>Gambar saat ini:</small><br>
            <img src="{{ asset('storage/' . $berita->image) }}" width="200">
        @endif
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
    <a href="{{ route('admin.berita.index') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection
