<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>@yield('title', 'Biro Umum dan ASD SETDA DKI Jakarta')</title>
  @vite('resources/css/app.css')
</head>
<body class="flex flex-col min-h-screen text-white font-sans relative" style="background-image: url('{{ asset('img/batik.jpg') }}'); background-size: cover; background-position: center;";>

  <!-- Background Video -->


  @include('partials.navbar')

<main class="flex-grow flex justify-center items-center p-6 text-center relative z-10">
  <div class="w-4/5 max-w-3xl bg-white/95 p-5 rounded-xl shadow-lg mt-64 relative">
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
