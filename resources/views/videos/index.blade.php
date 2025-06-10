@extends('layouts.app')

@section('content')
<a href="{{ route('admin.dashboard') }}">
<button class="mb-4 px-4 py-2 rounded bg-gray-300 hover:bg-gray-400 text-gray-800 flex items-center gap-2">
        ← Kembali ke Admin
      </button>
<div class="container">
    <h1>Daftar Video</h1>
    <a href="{{ route('videos.create') }}" class="btn btn-primary mb-3">Tambah Video</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Judul</th>
                <th>URL Video</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($videos as $video)
                <tr>
                    <td>{{ $video->id }}</td>
                    <td>{{ $video->title }}</td>
                    <td><a href="{{ $video->video_url }}" target="_blank">{{ $video->video_url }}</a></td>
                    <td>{{ $video->description }}</td>
                    <td>
                        <a href="{{ route('videos.edit', $video->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('videos.destroy', $video->id) }}" method="POST" style="display:inline-block" onsubmit="return confirm('Yakin ingin menghapus video ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
