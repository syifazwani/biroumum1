@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-xl mx-auto bg-white rounded-lg shadow-lg p-6">

        {{-- Tombol Kembali --}}
        <div class="mb-4">
            <a href="{{ route('hero-slider.index') }}" class="text-blue-600 hover:underline flex items-center">
                &larr; Kembali
            </a>
        </div>

        {{-- Judul --}}
        <h1 class="text-3xl font-bold text-gray-800 text-center mb-6 border-b pb-2">Tambah Gambar Slider</h1>

        <form action="{{ route('hero-slider.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- Upload gambar --}}
            <div class="mb-6">
                <label for="image_path" class="block text-gray-700 font-semibold mb-2">Upload Gambar</label>
                <input type="file" name="image_path" id="image_path" required
                    class="w-full bg-gray-50 text-gray-700 rounded border border-gray-300 py-2 px-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            {{-- Tombol simpan --}}
            <div class="text-right">
                <button type="submit"
                    class="bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-6 rounded shadow transition duration-300">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
