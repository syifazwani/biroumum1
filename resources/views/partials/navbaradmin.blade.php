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

  // Klik di luar dropdown
  window.addEventListener('click', function(e) {
    const isDropdownButton = e.target.closest('button[onclick^="toggleDropdown"]');
    const isInsideDropdown = e.target.closest('[id$="Dropdown"]');
    if (!isDropdownButton && !isInsideDropdown) {
      document.querySelectorAll('[id$="Dropdown"]').forEach(el => el.classList.add('hidden'));
    }
  });
</script>
