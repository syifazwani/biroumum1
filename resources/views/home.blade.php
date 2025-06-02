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

    <main class="flex-grow px-5 py-10 space-y-20">
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

      <!-- Visi & Misi -->
      <section class="space-y-20">
        <div class="md:flex items-center gap-10" data-aos="fade-right">
          <div class="md:w-1/2">
            <h2 class="text-2xl font-semibold text-[#0077b6] mb-3">Visi</h2>
            <p>Menjadi biro yang profesional, akuntabel, dan berorientasi pelayanan prima di lingkungan Pemerintah Provinsi DKI Jakarta.</p>
          </div>
          <div class="md:w-1/2">
            <img src="https://source.unsplash.com/600x400/?office" alt="Visi" class="rounded-xl shadow-lg">
          </div>
        </div>

        <div class="md:flex items-center gap-10 flex-row-reverse" data-aos="fade-left">
          <div class="md:w-1/2">
            <h2 class="text-2xl font-semibold text-[#0077b6] mb-3">Misi</h2>
            <ul class="list-disc pl-5 space-y-2">
              <li>Menyelenggarakan layanan administrasi umum yang efisien dan efektif.</li>
              <li>Menunjang kinerja pimpinan melalui layanan tata usaha yang optimal.</li>
              <li>Meningkatkan kapasitas dan kualitas sumber daya manusia biro.</li>
            </ul>
          </div>
          <div class="md:w-1/2">
            <img src="https://source.unsplash.com/600x400/?mission" alt="Misi" class="rounded-xl shadow-lg">
          </div>
        </div>
      </section>

      <!-- Tombol Video Profil -->


      <!-- Fungsi dan Tugas -->
      <section data-aos="zoom-in-up" class="bg-white p-10 rounded-2xl shadow-lg">
        <h2 class="text-2xl font-semibold text-[#0077b6] mb-6 text-center">Fungsi dan Tugas</h2>
        <div class="grid md:grid-cols-2 gap-6">
          <div class="bg-[#f0fbfd] p-6 rounded-xl shadow hover:shadow-lg transition duration-300" data-aos="flip-left">
            <h3 class="text-xl font-semibold mb-2">Fungsi</h3>
            <p>Mengelola dan menyelenggarakan urusan tata usaha, layanan umum, kepegawaian, serta pengelolaan rumah tangga Sekretariat Daerah.</p>
          </div>
          <div class="bg-[#f0fbfd] p-6 rounded-xl shadow hover:shadow-lg transition duration-300" data-aos="flip-right">
            <h3 class="text-xl font-semibold mb-2">Tugas</h3>
            <p>Melaksanakan penyiapan bahan kebijakan, koordinasi, monitoring, dan evaluasi pelaksanaan tugas-tugas Sekretariat Daerah sesuai bidangnya.</p>
          </div>
        </div>
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
