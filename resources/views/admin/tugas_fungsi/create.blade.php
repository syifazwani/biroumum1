@extends('layouts.admin')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Tambah File Tugas dan Fungsi</h1>

    @if ($errors->any())
        <div class="bg-red-100 text-red-800 p-3 rounded mb-4">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('tugasfungsi.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf

        <div>
            <label class="block mb-1 font-semibold">Nama File</label>
            <input type="text" name="nama_file" class="w-full border p-2 rounded" required>
        </div>

        <div>
            <label class="block mb-1 font-semibold">Upload File (PDF / Gambar)</label>
            <input type="file" name="file" accept=".pdf,.jpg,.jpeg,.png,.webp" class="w-full border p-2 rounded" required>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Simpan</button>
    </form>
@endsection
