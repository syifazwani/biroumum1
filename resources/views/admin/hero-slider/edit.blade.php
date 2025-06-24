@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-2xl mx-auto bg-white rounded-lg shadow-lg p-6">

        {{-- Tombol kembali --}}
        <div class="mb-4">
            <a href="{{ route('hero-slider.index') }}" class="text-blue-600 hover:underline flex items-center">
                &larr; Kembali
            </a>
        </div>

        {{-- Judul di tengah --}}
        <h1 class="text-3xl font-bold text-gray-800 text-center mb-6 border-b pb-2">Edit Gambar Slider</h1>

        <form action="{{ route('hero-slider.update', $heroSlider->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- Gambar saat ini --}}
            <div class="mb-6">
                <label class="block text-gray-700 font-semibold mb-2">Gambar Saat Ini</label>
                <img src="{{ asset('storage/' . $heroSlider->image_path) }}" alt="Slider" class="w-full max-w-md rounded-lg shadow mx-auto">
            </div>

            {{-- Upload gambar baru --}}
            <div class="mb-6">
                <label for="image_path" class="block text-gray-700 font-semibold mb-2">Ganti Gambar (Opsional)</label>
                <input type="file" name="image_path" id="image_path"
                    class="w-full text-gray-700 bg-gray-50 rounded border border-gray-300 py-2 px-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            {{-- Tombol Submit --}}
            <div class="text-right">
                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded shadow transition duration-300">
                    Perbarui
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
