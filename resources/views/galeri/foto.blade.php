{{-- resources/views/galeri/foto.blade.php --}}
@extends('layouts.app')

@section('content')
<body class="bg-gray-100 text-black min-h-screen font-sans" style="background-image: url('{{ asset('img/batik.jpg') }}'); background-size: cover; background-position: center;">
  <div class="flex flex-col min-h-screen bg-white/90">
    <div class="container mx-auto flex-1 flex flex-col items-center justify-start py-8 px-4">

        <!-- Judul Halaman -->
        <h1 class="text-3xl md:text-4xl font-extrabold text-center text-blue-800 mb-8 drop-shadow-lg">Galeri Album</h1>

        <!-- Album Grid -->
        <div id="albumGrid" class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 w-full transition-all duration-500">
            @foreach ($albums as $album)
                <div onclick="openAlbum('album{{ $album->id }}')" class="album-card bg-white rounded-xl overflow-hidden shadow-md cursor-pointer hover:scale-105 transition-transform duration-300">
                    <img src="{{ asset('storage/' . $album->cover_image) }}" alt="{{ $album->title }}" class="w-full h-40 object-cover" />
                    <div class="title p-3 text-center font-semibold text-gray-700">{{ $album->title }}</div>
                </div>
            @endforeach
        </div>

        <!-- Detail Album View -->
        @foreach ($albums as $album)
            <div id="album{{ $album->id }}" class="album-detail hidden w-full mt-6 opacity-0 transition-all duration-500" data-photos='@json($album->photos->pluck("image_path"))'>
                <h2 class="text-2xl font-bold mb-4 text-center text-blue-700">{{ $album->title }}</h2>
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                    @foreach ($album->photos as $photo)
                        <div class="photo-card rounded-xl overflow-hidden shadow-md cursor-pointer" onclick="openLightbox('{{ asset('storage/' . $photo->image_path) }}', {{ $loop->index }}, this.parentNode.parentNode)">
                            <img src="{{ asset('storage/' . $photo->image_path) }}" alt="Photo {{ $loop->iteration }}" class="w-full h-32 object-cover" />
                        </div>
                    @endforeach
                </div>
                <div class="flex justify-center mt-6">
                    <button onclick="closeAlbum()" class="bg-cyan-600 hover:bg-cyan-700 text-white px-6 py-2 rounded-lg transition duration-300">
                        ← Kembali ke Album
                    </button>
                </div>
            </div>
        @endforeach
    </div>
  </div>

  <!-- Lightbox Overlay -->
  <div id="lightbox" class="fixed inset-0 bg-black/80 hidden flex items-center justify-center z-50">
    <!-- Tombol Close -->
    <span id="lightboxClose" class="absolute top-4 right-4 text-white text-3xl cursor-pointer z-50">&times;</span>

    <!-- Tombol Prev & Next -->
    <button id="prevBtn" class="absolute left-4 text-white text-4xl z-50">&#10094;</button>

    <!-- Foto & Tombol Download di Tengah -->
    <div class="relative z-40 flex flex-col items-center">
      <img id="lightboxImage" src="" class="max-w-3xl max-h-[80vh] rounded shadow-lg mx-auto my-4">
      <a id="downloadBtn" href="#" download class="mt-4 bg-cyan-600 hover:bg-cyan-700 text-white px-4 py-2 rounded-lg transition">Download Gambar</a>
    </div>

    <button id="nextBtn" class="absolute right-4 text-white text-4xl z-50">&#10095;</button>
  </div>
</body>

<script>
    let currentPhotoIndex = 0;
    let photoList = [];

    function openAlbum(id) {
        document.getElementById('albumGrid').classList.add('hidden');
        document.querySelectorAll('.album-detail').forEach(el => {
            el.classList.add('hidden');
            el.classList.remove('opacity-100');
            el.classList.add('opacity-0');
        });
        const album = document.getElementById(id);
        album.classList.remove('hidden');
        setTimeout(() => {
            album.classList.remove('opacity-0');
            album.classList.add('opacity-100');
        }, 10);
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }

    function closeAlbum() {
        document.querySelectorAll('.album-detail').forEach(el => {
            el.classList.add('hidden');
            el.classList.remove('opacity-100');
            el.classList.add('opacity-0');
        });
        document.getElementById('albumGrid').classList.remove('hidden');
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }

    function openLightbox(imageSrc, index, albumElement) {
        photoList = JSON.parse(albumElement.getAttribute('data-photos'));
        currentPhotoIndex = index;
        updateLightboxImage();
        document.getElementById('lightbox').classList.remove('hidden');
    }

    function updateLightboxImage() {
        const imagePath = "/storage/" + photoList[currentPhotoIndex];
        document.getElementById('lightboxImage').src = imagePath;
        document.getElementById('downloadBtn').href = imagePath;
    }

    function closeLightbox(event) {
        // Jika klik di luar gambar atau tombol close
        if (event.target.id === 'lightbox' || event.target.id === 'lightboxClose') {
            document.getElementById('lightbox').classList.add('hidden');
        }
    }

    document.getElementById('prevBtn').addEventListener('click', function(event) {
        event.stopPropagation();
        if (currentPhotoIndex > 0) {
            currentPhotoIndex--;
            updateLightboxImage();
        }
    });

    document.getElementById('nextBtn').addEventListener('click', function(event) {
        event.stopPropagation();
        if (currentPhotoIndex < photoList.length - 1) {
            currentPhotoIndex++;
            updateLightboxImage();
        }
    });

    document.getElementById('lightbox').addEventListener('click', closeLightbox);
    document.getElementById('lightboxClose').addEventListener('click', closeLightbox);
</script>
@endsection
