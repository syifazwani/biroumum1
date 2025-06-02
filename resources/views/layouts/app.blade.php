<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>@yield('title', 'Biro Umum dan ASD SETDA DKI Jakarta')</title>
  @vite('resources/css/app.css')
</head>
<body class="flex flex-col min-h-screen text-white font-sans bg-black relative">

  <!-- Background Video -->
  <video class="fixed top-0 left-0 w-full h-full object-cover -z-10" autoplay loop muted playsinline>
    <source src="{{ asset('vid/balai.mp4') }}" type="video/mp4" />
    Browser Anda tidak mendukung tag video.
  </video>

  @include('partials.navbar')

 <main class="flex-grow flex justify-center items-center p-6 text-center">
  <div class="w-4/5 max-w-3xl bg-white/60 p-5 rounded-xl shadow-lg mt-64 relative">
    @yield('content')
  </div>
</main>



  <!-- JS -->
  <script>
    // Jam
    function updateClock() {
      const now = new Date();
      const h = String(now.getHours()).padStart(2, '0');
      const m = String(now.getMinutes()).padStart(2, '0');
      const s = String(now.getSeconds()).padStart(2, '0');
      document.getElementById("clock").textContent = `${h}:${m}:${s}`;
    }
    setInterval(updateClock, 1000);
    updateClock();

    // Hamburger menu
    document.getElementById("hamburger").addEventListener("click", () => {
      document.getElementById("nav-menu").classList.toggle("hidden");
    });
  </script>

</body>
</html>
