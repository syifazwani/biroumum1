@extends('layouts.app')

@section('content')
<div class="container">

    <h3>Edit {{ $title }}</h3>

    <form action="{{ route('admin.ppid.update', [$tab, $item->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nama_file" class="form-label">Nama File</label>
            <input type="text" name="nama_file" id="nama_file" class="form-control" value="{{ old('nama_file', $item->nama_file) }}">
            @error('nama_file')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="file" class="form-label">Upload File (biarkan kosong jika tidak ingin mengganti)</label>
            <input type="file" name="file" id="file" class="form-control">
            @error('file')
                <small class="text-danger">{{ $message }}</small>
            @enderror

            @if($item->path)
                <p>File saat ini: <a href="{{ asset('storage/' . $item->path) }}" target="_blank">Lihat File</a></p>
            @endif
        </div>

        <button type="submit" class="btn btn-success">Simpan Perubahan</button>
        <a href="{{ route('admin.ppid.index') }}" class="btn btn-secondary">Batal</a>
    </form>

</div>
@endsection
