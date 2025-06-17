@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100 py-10">
    <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-md border border-gray-200">
        <h2 class="text-2xl font-bold text-center text-blue-700 mb-6">Tambah Album</h2>

        <form action="{{ route('album.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf

            <!-- Judul Album -->
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Judul Album</label>
                <input type="text" name="title" id="title" placeholder="Masukkan Judul Album"
                       class="w-full border border-gray-300 p-3 rounded text-gray-900 placeholder-gray-400 
                       focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition" required>
            </div>

            <!-- Cover Image -->
            <div>
                <label for="cover_image" class="block text-sm font-medium text-gray-700 mb-1">Cover Album</label>
                <input type="file" name="cover_image" id="cover_image"
                       class="w-full border border-gray-300 p-3 rounded text-gray-900 bg-white cursor-pointer 
                       focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition" required>
            </div>

            <!-- Tombol Simpan -->
            <div class="flex justify-center">
                <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-3 rounded-lg shadow-md transition transform hover:scale-105">
                    Simpan Album
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
