<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Galeri Foto & Video</title>
  @vite(['resources/css/app.css'])
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
</head>
<body class="bg-gray-100 text-black flex flex-col min-h-screen font-sans" style="background-image: url('{{ asset('img/batik.jpg') }}'); background-size: cover; background-position: center;">


  <div class="flex flex-col min-h-screen bg-white/95">

  @include('partials.navbar')

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

    <div class="min-h-screen w-full flex flex-col items-center py-10">


<h1 class="text-4xl font-extrabold text-blue-800 items-center drop-shadow-lg animate-fade-in">Galeri Album</h1>



  <!-- Video View -->
<div id="video" class="tab-content">
  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 p-6 gap-5 mt-6">
    @foreach ($videos as $video)
      <video
  src="{{ Str::startsWith($video->video_url, 'http') ? $video->video_url : asset($video->video_url) }}"
  controls
  class="w-full rounded-lg object-cover"
  preload="metadata"
>
  Browser tidak mendukung video.
</video>

    @endforeach
  </div>
  </div>
</div>


  @include('partials.footer')

  <!-- Script -->
  <script>
    const tabButtons = document.querySelectorAll('.tab-btn');
    const tabContents = document.querySelectorAll('.tab-content');
    const backBtn = document.getElementById('backBtn');

    tabButtons.forEach(btn => {
      btn.addEventListener('click', () => {
        // Aktifkan tombol yang ditekan dan nonaktifkan lainnya
        tabButtons.forEach(b => b.classList.remove('bg-cyan-500', 'active'));
        btn.classList.add('bg-cyan-500', 'active');

        // Tampilkan konten tab sesuai yang dipilih
        tabContents.forEach(c => c.classList.add('hidden'));
        document.getElementById(btn.dataset.tab).classList.remove('hidden');

        // Tutup album jika sebelumnya sedang dibuka
        closeAlbum();
      });
    });

    function openAlbum(albumId) {
      document.getElementById('albumGrid').classList.add('hidden');
      backBtn.classList.remove('hidden');
      document.querySelectorAll('.media-grid').forEach(g => g.classList.add('hidden'));
      document.getElementById(albumId).classList.remove('hidden');
    }

    function closeAlbum() {
      document.getElementById('albumGrid').classList.remove('hidden');
      backBtn.classList.add('hidden');
      document.querySelectorAll('.media-grid').forEach(g => g.classList.add('hidden'));
    }
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
