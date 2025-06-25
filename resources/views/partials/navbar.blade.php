<header class="bg-blue-900 sticky top-0 z-20 flex flex-wrap justify-between items-center p-3 px-6">
  <div class="flex items-center gap-3 cursor-pointer" onclick="window.location.href='/'">
    <img src="{{ asset('img/logo.png') }}" alt="logo" class="h-12" />
    <div class="text-white">
      <h1 class="text-sm uppercase font-bold">Biro Umum dan ASD</h1>
      <p class="text-xs text-gray-300">SETDA Provinsi DKI Jakarta</p>
    </div>
  </div>

  <nav>
    <div class="hidden md:flex gap-4 items-center text-white font-semibold">
      <a href="{{ url('/home') }}" class="px-4 py-2 rounded-md hover:bg-cyan-600 hover:text-blue-900 transition">Beranda</a>
      <a href="{{ url('/organisasi') }}" class="px-4 py-2 rounded-md hover:bg-cyan-600 hover:text-blue-900 transition">Organisasi</a>
      <a href="{{ url('/ppid') }}" class="px-4 py-2 rounded-md hover:bg-cyan-600 hover:text-blue-900 transition">PPID</a>

      {{-- Dropdown Informasi --}}
      <div class="relative inline-block text-left">
        <button onclick="toggleDropdown('informasiDropdown')" class="px-4 py-2 rounded-md hover:bg-cyan-600 hover:text-blue-900 transition inline-flex items-center">
          Informasi
          <svg class="ml-2 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
          </svg>
        </button>
        <div id="informasiDropdown" class="absolute left-0 mt-2 w-40 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 hidden z-10">
          <div class="py-1">
            <a href="{{ url('/berita') }}" class="block px-4 py-2 text-gray-700 hover:bg-cyan-600 hover:text-blue-900 transition">Berita</a>
            <a href="{{ url('/informasi-balai') }}" class="block px-4 py-2 text-gray-700 hover:bg-cyan-600 hover:text-blue-900 transition">Balai</a>
          </div>
        </div>
      </div>

      {{-- Dropdown Gallery --}}
      <div class="relative inline-block text-left">
        <button onclick="toggleDropdown('galleryDropdown')" class="px-4 py-2 rounded-md hover:bg-cyan-600 hover:text-blue-900 transition inline-flex items-center">
          Gallery
          <svg class="ml-2 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
          </svg>
        </button>
        <div id="galleryDropdown" class="absolute left-0 mt-2 w-40 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 hidden z-10">
          <div class="py-1">
            <a href="{{ url('/galeri/foto') }}" class="block px-4 py-2 text-gray-700 hover:bg-cyan-600 hover:text-blue-900 transition">Foto</a>
            <a href="{{ url('/galeri/video') }}" class="block px-4 py-2 text-gray-700 hover:bg-cyan-600 hover:text-blue-900 transition">Video</a>
          </div>
        </div>
      </div>
    </div>

    {{-- Hamburger (Mobile) --}}
    <div id="hamburger" class="flex flex-col gap-1.5 md:hidden cursor-pointer">
      <div class="w-6 h-0.5 bg-white rounded"></div>
      <div class="w-6 h-0.5 bg-white rounded"></div>
      <div class="w-6 h-0.5 bg-white rounded"></div>
    </div>
  </nav>

  <div id="clock" class="ml-4 font-bold text-sm text-white select-none">00:00:00</div>
</header>

<script>
  function toggleDropdown(id) {
    document.querySelectorAll('[id$="Dropdown"]').forEach(el => {
      if (el.id === id) {
        el.classList.toggle('hidden');
      } else {
        el.classList.add('hidden');
      }
    });
  }

  function updateClock() {
      const now = new Date();
      const hours = now.getHours().toString().padStart(2, '0');
      const minutes = now.getMinutes().toString().padStart(2, '0');
      const seconds = now.getSeconds().toString().padStart(2, '0');
      document.getElementById('clock').innerText = `${hours}:${minutes}:${seconds}`;
    }
    setInterval(updateClock, 1000);
    updateClock();

  // Klik di luar dropdown
  window.addEventListener('click', function(e) {
    const isDropdownButton = e.target.closest('button[onclick^="toggleDropdown"]');
    const isInsideDropdown = e.target.closest('[id$="Dropdown"]');
    if (!isDropdownButton && !isInsideDropdown) {
      document.querySelectorAll('[id$="Dropdown"]').forEach(el => el.classList.add('hidden'));
    }
  });
</script>
