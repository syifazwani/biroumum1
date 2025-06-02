<header class="bg-blue-900  sticky top-0 z-20 flex flex-wrap justify-between items-center p-3 px-6">
  <div class="flex items-center gap-3 cursor-pointer" onclick="window.location.href='/'">
    <img src="{{ asset('img/logo.png') }}" alt="logo" class="h-12" />
    <div class="text-white">
      <h1 class="text-sm uppercase font-bold">Biro Umum dan ASD</h1>
      <p class="text-xs text-gray-300">SETDA Provinsi DKI Jakarta</p>
    </div>
  </div>

  <nav>
    <div id="nav-menu" class="hidden md:flex gap-4 items-center text-white font-semibold">
      <a href="home" class="px-4 py-2 rounded-md hover:bg-cyan-600 hover:text-blue-900 transition">Beranda</a>
      <a href="organisasi" class="px-4 py-2 rounded-md hover:bg-cyan-600 hover:text-blue-900 transition">Organisasi</a>
      <a href="ppid" class="px-4 py-2 rounded-md hover:bg-cyan-600 hover:text-blue-900 transition">PPID</a>
      <a href="informasi" class="px-4 py-2 rounded-md hover:bg-cyan-600 hover:text-blue-900 transition">Informasi</a>
      <a href="foto&video" class="px-4 py-2 rounded-md hover:bg-cyan-600 hover:text-blue-900 transition">Foto & Video</a>
    </div>

    <div id="hamburger" class="flex flex-col gap-1.5 md:hidden cursor-pointer">
      <div class="w-6 h-0.5 bg-white rounded"></div>
      <div class="w-6 h-0.5 bg-white rounded"></div>
      <div class="w-6 h-0.5 bg-white rounded"></div>
    </div>
  </nav>

  <div id="clock" class="ml-4 font-bold text-sm text-white select-none">00:00:00</div>
</header>
