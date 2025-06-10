{{-- resources/views/galeri/foto.blade.php --}}

@extends('layouts.app')

@section('content')
<div class="container mx-auto p-5">
    <h1 class="text-3xl font-bold text-center text-blue-700 mb-8">Galeri Foto</h1>

    <!-- Album Grid View -->
    <div id="albumGrid" class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach ($albums as $album)
            <div onclick="openAlbum('album{{ $album->id }}')" 
                 class="album-card bg-white rounded-xl overflow-hidden shadow-lg cursor-pointer transform hover:scale-105 transition-transform duration-300">
                <img src="{{ asset('storage/' . $album->cover_image) }}" alt="{{ $album->title }}" 
                     class="w-full h-40 object-cover hover:brightness-75 transition duration-300" />
                <div class="p-3 text-center font-semibold text-gray-700">{{ $album->title }}</div>
            </div>
        @endforeach
    </div>

    <!-- Album Detail View -->
    @foreach ($albums as $album)
        <div id="album{{ $album->id }}" class="album-detail hidden mt-8">
            <h2 class="text-2xl font-bold mb-6 text-center text-cyan-700">{{ $album->title }}</h2>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5">
                @foreach ($album->photos as $photo)
                    <div class="photo-card rounded-lg overflow-hidden shadow-md transform hover:scale-105 transition-transform duration-300">
                        <img src="{{ asset('storage/' . $photo->photo_path) }}" alt="Photo {{ $loop->iteration }}" 
                             class="w-full h-40 object-cover hover:brightness-75 transition duration-300" />
                    </div>
                @endforeach
            </div>
            <div class="text-center mt-6">
                <button onclick="closeAlbum()" 
                        class="bg-cyan-600 hover:bg-cyan-700 text-white px-6 py-2 rounded-lg shadow-md transition-all duration-300">
                    ← Kembali ke Album
                </button>
            </div>
        </div>
    @endforeach
</div>

<script>
    function openAlbum(id) {
        document.getElementById('albumGrid').classList.add('hidden');
        document.querySelectorAll('.album-detail').forEach(el => el.classList.add('hidden'));
        document.getElementById(id).classList.remove('hidden');
    }

    function closeAlbum() {
        document.getElementById('albumGrid').classList.remove('hidden');
        document.querySelectorAll('.album-detail').forEach(el => el.classList.add('hidden'));
    }
</script>
@endsection
