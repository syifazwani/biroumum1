<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Informasi Biro Umum dan ASD DKI Jakarta</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
</head>
<body class="bg-gray-100 text-black flex flex-col min-h-screen font-sans" style="background-image: url('{{ asset('img/batik.jpg') }}'); background-size: cover; background-position: center;">
  <div class="flex flex-col min-h-screen bg-white/95">

    @include('partials.navbar')

    <main class="container mx-auto px-10 py-10 space-y-20">
      <!-- Hero Section -->
<section class="relative rounded-3xl overflow-hidden shadow-lg h-[300px] md:h-[400px]" data-aos="fade-down">
        <div class="swiper heroSwiper h-full w-full">
          <div class="swiper-wrapper">
            <div class="swiper-slide bg-cover bg-center" style="background-image: url('{{ asset('img/DJI_0135.jpg') }}');"></div>
            <div class="swiper-slide bg-cover bg-center" style="background-image: url('{{ asset('img/DJI_0119.jpg') }}');"></div>
            <div class="swiper-slide bg-cover bg-center" style="background-image: url('{{ asset('img/DJI_0135.jpg') }}');"></div>
          </div>
        </div>
        <div class="absolute inset-0 bg-black bg-opacity-50 flex flex-col justify-center items-center text-white text-center px-6">
          <h1 class="text-3xl md:text-5xl font-bold mb-2">Biro Umum dan Administrasi Sekretariat Daerah</h1>
          <p class="text-lg md:text-xl max-w-2xl">Menangani layanan umum, tata usaha pimpinan, serta administrasi kepegawaian di lingkungan Sekretariat Daerah Provinsi DKI Jakarta.</p>
        </div>
      </section>

      <!-- Tab Layanan Online -->
<section class="space-y-4" data-aos="fade-up">
  <h2 class="text-3xl font-bold text-[#0077b6] text-center">Layanan Online</h2>
  <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4 px-4">
    <a href="https://eoffice.jakarta.go.id/index.php/login/jejaksurat" target="_blank" class=" bg-gradient-to-r from-[#0077b6] to-[#00b4d8] text-white py-4 px-6 rounded-xl shadow-lg hover:scale-105 hover:shadow-xl transition-all duration-300 text-center font-semibold">
      Jejak Surat
    </a>
    <a href="https://epesanruangan.jakarta.go.id/user/login" target="_blank" class="bg-gradient-to-r from-[#0077b6] to-[#00b4d8] text-white py-4 px-6 rounded-xl shadow-lg hover:scale-105 hover:shadow-xl transition-all duration-300 text-center font-semibold">
      Pelayanan Gedung
    </a>
    <a href="#" class="bg-gradient-to-r from-[#0077b6] to-[#00b4d8] text-white py-4 px-6 rounded-xl shadow-lg hover:scale-105 hover:shadow-xl transition-all duration-300 text-center font-semibold">
      Dukungan Acara
    </a>
    <a href="#" class="bg-gradient-to-r from-[#0077b6] to-[#00b4d8] text-white py-4 px-6 rounded-xl shadow-lg hover:scale-105 hover:shadow-xl transition-all duration-300 text-center font-semibold">
      Produk Hukum
    </a>
  </div>
</section>


<!-- Tentang Kami -->
<section class="bg-white p-10 rounded-2xl shadow-lg relative flex flex-col md:flex-row gap-8 items-center" data-aos="fade-up">
  <img src="{{ asset('img/DJI_0119.jpg') }}" alt="" class="w-[400px] rounded-xl shadow-md object-cover">

  <div class="text-gray-800 max-w-3xl">
    <h2 class="text-3xl font-bold text-[#0077b6] mb-4 text-left">Tentang Kami</h2>
    <p class="text-justify leading-relaxed mb-4">
      Biro Umum dan Administrasi Sekretariat Daerah Provinsi DKI Jakarta merupakan unit kerja yang menangani layanan umum, tata usaha pimpinan, serta administrasi kepegawaian di lingkungan Sekretariat Daerah. Kami berkomitmen untuk memberikan pelayanan yang profesional, transparan, dan akuntabel demi mendukung tata kelola pemerintahan yang baik.
    </p>
    <p class="text-justify leading-relaxed mb-2">
      Biro ini terbagi atas layanan internal dan eksternal, antara lain:
    </p>
    <ul class="list-disc pl-6 text-justify leading-relaxed">
      <li>Layanan Persuratan</li>
      <li>Layanan Pemeliharaan</li>
      <li>Pengamanan dan perawatan bangunan di lingkup Balai Kota dan Rumah Dinas pimpinan</li>
      <li>Layanan kebersihan bangunan di Balai Agung dan Balai Kota, dan lain-lain</li>
    </ul>
  </div>
</section>



<!-- Ada Apa di Balai Kota -->
<section class="bg-white p-10 rounded-2xl shadow-lg" data-aos="fade-up">
  <h2 class="text-3xl font-bold text-[#0077b6] mb-6 text-center">Ada Apa di Balai Kota?</h2>
  <div class="flex flex-col md:flex-row items-start md:items-center gap-6">
    <div class="flex-1">
      <p class="mb-4 text-gray-800 text-justify">
        Ketika kita berkunjung ke Balaikota pasti kita bertanya-tanya ada apa saja sih di Balaikota Jakarta? Nah berikut ini kami informasikan hal-hal menarik yang dapat anda temui di Balaikota Jakarta.
      </p>
      <ul class="list-disc text-gray-700 text-lg leading-relaxed pl-6">
        <li>Ada Jakarta Innovation Days di Balai Kota DKI Jakarta</li>
        <li>Ada Bank Sampah Si Pitung di Balai Kota DKI Jakarta</li>
        <li>Ada Bazar Balaikota di Balaikota DKI Jakarta</li>
        <li>Ada Balai Agung di Balaikota DKI Jakarta</li>
        <li>Ada Jakarta Smart City Lounge</li>
      </ul>
    </div>
    <div class="md:w-[400px] w-full">
      <img src="{{ asset('img/DJI_0135.jpg') }}" alt="Balai Kota" class="rounded-xl shadow-md w-full object-cover">
    </div>

  </div>
  <button class="px-8 w-max h-10 bg-cyan-400 rounded-full text-white"><a href="informasi">Jelajah</a></button>
</section>



<!-- Galeri Foto -->
<section class="bg-white p-10 rounded-2xl shadow-lg" data-aos="fade-up">
  <h2 class="text-3xl font-bold text-[#0077b6] mb-6 text-center">Galeri Foto</h2>
  <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
    <img src="{{ asset('img/DJI_0135.jpg') }}" alt="Galeri 1" class="rounded-xl shadow-md hover:scale-105 transition-transform duration-300">
    <img src="{{ asset('img/DJI_0119.jpg') }}" alt="Galeri 2" class="rounded-xl shadow-md hover:scale-105 transition-transform duration-300">
    <img src="{{ asset('img/DJI_0119.jpg') }}" alt="Galeri 3" class="rounded-xl shadow-md hover:scale-105 transition-transform duration-300">
  </div>
  <a href='galeri/foto'><p class="text-end pt-10 text-sky-400">Lihat lainnya >></p></a>
</section>


    </main>


    @include('partials.footer')
  </div>

  <!-- Scripts -->
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
  <script>
    AOS.init({ duration: 800, once: true });

    const heroSwiper = new Swiper(".heroSwiper", {
      loop: true,
      autoplay: {
        delay: 4000,
        disableOnInteraction: false,
      },
      effect: 'fade',
    });

    function toggleModal() {
      const modal = document.getElementById('videoModal');
      const iframe = modal.querySelector('iframe');
      if (modal.classList.contains('hidden')) {
        modal.classList.remove('hidden');
        modal.classList.add('flex');
      } else {
        modal.classList.add('hidden');
        modal.classList.remove('flex');
        iframe.src = iframe.src;
      }
    }

    // Hamburger menu toggle (jika dipakai)
    const hamburger = document.getElementById("hamburger");
    const navMenu = document.getElementById("nav-menu");
    if (hamburger && navMenu) {
      hamburger.addEventListener("click", () => {
        navMenu.classList.toggle("hidden");
      });
    }
  </script>
</body>
</html>
