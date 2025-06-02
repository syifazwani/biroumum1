<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Selamat Datang</title>
  @vite('resources/css/app.css')
</head>
<body class="m-0 p-0 overflow-hidden">

  <!-- Link ke halaman beranda dengan video -->
  <a href="{{ route('home') }}" class="block relative w-screen h-screen cursor-pointer group">

    <!-- Video full screen -->
    <video class="absolute top-0 left-0 w-full h-full object-cover z-0" autoplay loop muted playsinline>
      <source src="{{ asset('vid/balai.mp4') }}" type="video/mp4" />
      Browser Anda tidak mendukung tag video.
    </video>

    <!-- Teks di atas video, lebih ke bawah -->
    <div class="absolute top-[60%] left-1/2 -translate-x-1/2 -translate-y-1/2 text-center z-10 text-white px-4">
      <h1 class="text-4xl font-bold drop-shadow-lg mb-4">Selamat datang di Biro Umum & ASD SETDA DKI Jakarta</h1>
      <p class="text-xl drop-shadow-md mb-6">Kami menyediakan berbagai layanan yang mendukung administrasi dan kebijakan pemerintah di DKI Jakarta.</p>

      <!-- SVG panah bawah dengan border dan rounded full -->
      <div class="inline-flex items-center justify-center w-14 h-14 border-2 border-white rounded-full bg-white/10 hover:bg-white/20 transition">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white animate-bounce" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 13.5 12 21m0 0-7.5-7.5M12 21V3" />
        </svg>
      </div>
    </div>

  </a>

</body>
</html>
