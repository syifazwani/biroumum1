<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Galeri Album - Biro Umum & ASD SETDA DKI Jakarta</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />


</head>
@include('partials.navbar')
<body class="min-h-screen bg-gray-100 text-black font-sans" style="background-image: url('{{ asset('img/batik.jpg') }}'); background-size: cover; background-position: center;">

<section class="relative rounded-3xl overflow-hidden shadow-lg h-[400px]" data-aos="fade-down">
  <div class="swiper heroSwiper h-full w-full">
    <div class="swiper-wrapper h-full">
        @forelse ($sliders as $slider)
            <div class="swiper-slide bg-cover bg-center h-full w-full" style="background-image: url('{{ asset('storage/' . $slider->image_path) }}');"></div>
        @empty
            <div class="swiper-slide flex justify-center items-center bg-gray-300 text-gray-600">
                Tidak ada slider ditemukan
            </div>
        @endforelse

        @if (count($sliders) === 1)
            {{-- Duplikat 1 slide agar Swiper bisa autoplay --}}
            <div class="swiper-slide bg-cover bg-center h-full w-full" style="background-image: url('{{ asset('storage/' . $sliders[0]->image_path) }}');"></div>
        @endif

    </div>
  </div>
</section>


  <div class="min-h-screen w-full bg-white/90 flex flex-col items-center py-10">

    <!-- Judul -->
    <h1 class="text-4xl font-extrabold text-blue-800 mb-10 drop-shadow-lg animate-fade-in">Galeri Album</h1>

    <!-- Grid Album -->
    <div id="albumGrid" class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 px-6 w-full max-w-[1400px] transition-all duration-500">
      @foreach ($albums as $album)
        <div onclick="openAlbum('album{{ $album->id }}')" class="album-card bg-white rounded-xl overflow-hidden shadow-lg cursor-pointer hover:scale-105 hover:shadow-2xl transition-transform duration-500">
          <img src="{{ asset('storage/' . $album->cover_image) }}" alt="{{ $album->title }}" class="w-full h-40 object-cover" />
          <div class="p-3 text-center font-semibold text-gray-700">{{ $album->title }}</div>
        </div>
      @endforeach
    </div>

    <!-- Detail Album -->
    @foreach ($albums as $album)
      <div id="album{{ $album->id }}" class="album-detail hidden w-full mt-10 px-6 opacity-0 transition-all duration-500" data-photos='@json($album->photos->pluck("image_path"))'>
        <h2 class="text-2xl font-bold text-center text-blue-700 mb-6">{{ $album->title }}</h2>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
          @foreach ($album->photos as $photo)
            <div class="photo-card rounded-xl overflow-hidden shadow-md cursor-pointer hover:scale-105 transition-transform duration-500" onclick="openLightbox('{{ asset('storage/' . $photo->image_path) }}', {{ $loop->index }}, this.parentNode.parentNode)">
              <img src="{{ asset('storage/' . $photo->image_path) }}" alt="Photo {{ $loop->iteration }}" class="w-full h-32 object-cover" />
            </div>
          @endforeach
        </div>
        <div class="flex justify-center mt-8">
          <button onclick="closeAlbum()" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg shadow-md transition duration-300">← Kembali ke Album</button>
        </div>
      </div>
    @endforeach
  </div>

  <!-- Lightbox -->
  <div id="lightbox" class="fixed inset-0 bg-black/80 hidden flex items-center justify-center z-50 transition-opacity duration-500">
    <span id="lightboxClose" class="absolute top-4 right-4 text-white text-3xl cursor-pointer z-50">&times;</span>
    <button id="prevBtn" class="absolute left-4 text-white text-4xl z-50">&#10094;</button>
    <div class="relative z-40 flex flex-col items-center">
      <img id="lightboxImage" src="" class="max-w-3xl max-h-[80vh] rounded shadow-lg mx-auto my-4">
      <a id="downloadBtn" href="#" download class="mt-4 bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition">Download Gambar</a>
    </div>
    <button id="nextBtn" class="absolute right-4 text-white text-4xl z-50">&#10095;</button>
  </div>

  @include('partials.footer')

  <script>
    let currentPhotoIndex = 0;
    let photoList = [];

    function openAlbum(id) {
      document.getElementById('albumGrid').classList.add('hidden');
      document.querySelectorAll('.album-detail').forEach(el => {
        el.classList.add('hidden', 'opacity-0');
        el.classList.remove('opacity-100');
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
        el.classList.add('hidden', 'opacity-0');
        el.classList.remove('opacity-100');
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
<script>
  document.addEventListener("DOMContentLoaded", function () {
    new Swiper(".heroSwiper", {
      loop: true,
      autoplay: {
        delay: 3000,
        disableOnInteraction: false,
      },
      effect: "fade",
      speed: 1000,
    });
  });
</script>



</body>
</html>
