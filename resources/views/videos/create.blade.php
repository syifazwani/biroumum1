@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Video</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('videos.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="title" class="form-label">Judul Video</label>
        <input type="text" name="title" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="video_file" class="form-label">Upload Video</label>
        <input type="file" name="video_file" class="form-control" accept="video/*">
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Deskripsi</label>
        <textarea name="description" class="form-control"></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Simpan</button>
</form>


</div>
@endsection
