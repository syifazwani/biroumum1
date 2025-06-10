@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-xl font-bold mb-4">Tambah Album</h2>
    <form action="{{ route('album.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title">Judul Album</label>
            <input type="text" name="title" class="w-full border p-2" required>
        </div>
        <div class="mb-3">
            <label for="cover_image">Cover Album</label>
            <input type="file" name="cover_image" class="w-full border p-2" required>
        </div>
        <button class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
    </form>
</div>
@endsection
