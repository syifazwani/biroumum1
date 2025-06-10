@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-xl font-bold mb-4">Edit Album</h2>
    <form action="{{ route('album.update', $album) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title">Judul Album</label>
            <input type="text" name="title" value="{{ $album->title }}" class="w-full border p-2" required>
        </div>
        <div class="mb-3">
            <label for="cover_image">Cover Baru (Opsional)</label>
            <input type="file" name="cover_image" class="w-full border p-2">
        </div>
        <button class="bg-blue-600 text-white px-4 py-2 rounded">Update</button>
    </form>
</div>
@endsection
