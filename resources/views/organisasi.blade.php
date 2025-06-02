<!DOCTYPE html>
<html lang="id" class="h-full">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Informasi - Biro Umum dan ASD SETDA DKI Jakarta</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="h-full bg-fixed bg-center bg-cover" style="background-image: url('{{ asset('img/batik.jpg') }}'); font-family: 'Segoe UI', sans-serif;">
  <div class="min-h-screen flex flex-col bg-white bg-opacity-95">

    {{-- Include Navbar --}}
    @include('partials.navbar')

    <!-- Tabs Section -->
    <section class="flex-1 container  mx-auto p-6">
      <div class="flex flex-wrap justify-center gap-3 mb-6">
        <button onclick="showTab('struktur', event)" class="tab-btn bg-blue-500 text-white rounded-lg px-4 py-2 font-semibold hover:bg-blue-700 active">Struktur Organisasi</button>
        <button onclick="showTab('kebijakan', event)" class="tab-btn bg-blue-500 text-white rounded-lg px-4 py-2 font-semibold hover:bg-blue-700">Kebijakan dan Regulasi</button>
        <button onclick="showTab('renstra', event)" class="tab-btn bg-blue-500 text-white rounded-lg px-4 py-2 font-semibold hover:bg-blue-700">Renstra</button>
        <button onclick="showTab('lkip', event)" class="tab-btn bg-blue-500 text-white rounded-lg px-4 py-2 font-semibold hover:bg-blue-700">LKIP</button>
        <button onclick="showTab('laporan', event)" class="tab-btn bg-blue-500 text-white rounded-lg px-4 py-2 font-semibold hover:bg-blue-700">Laporan Keuangan</button>
      </div>

      <!-- Struktur Organisasi -->
        <div id="struktur" class="tab-content block">
            <h2 class="text-2xl font-bold mb-4">Struktur Organisasi</h2>
            @php
                $struktur = DB::table('struktur_organisasi')->latest('id')->first();
            @endphp

            @if($struktur)
                <img src="{{ asset('storage/' . $struktur->image_path) }}" alt="Struktur Organisasi" class="rounded-lg shadow-lg max-w-full" />
            @else
                <p>Belum ada gambar struktur organisasi.</p>
            @endif
        </div>


      <!-- Kebijakan -->
     <div id="kebijakan" class="tab-content hidden">
  <h3 class="text-xl font-semibold mb-4">Kebijakan dan Regulasi</h3>
  @if(Storage::disk('public')->exists('kebijakan'))
    @php $files = Storage::disk('public')->files('kebijakan'); @endphp
    @if(count($files) > 0)
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        @foreach($files as $file)
          <div class="bg-white rounded-lg shadow p-4 hover:shadow-md transition duration-300">
            <div class="h-48 overflow-hidden rounded mb-3 border border-gray-200">
              <iframe 
                src="{{ asset('storage/' . $file) }}" 
                class="w-full h-full" 
                frameborder="0">
              </iframe>
            </div>
            <h4 class="text-lg font-medium truncate mb-2">📄 {{ basename($file) }}</h4>
            <div class="flex justify-between items-center text-sm">
              <a href="{{ asset('storage/' . $file) }}" target="_blank" class="text-blue-600 hover:underline">Lihat</a>
              <a href="{{ asset('storage/' . $file) }}" download class="px-3 py-1 bg-blue-700 text-white rounded hover:bg-blue-800">Unduh</a>
            </div>
          </div>
        @endforeach
      </div>
    @else
      <p class="text-gray-600">Tidak ada file kebijakan yang tersedia.</p>
    @endif
  @else
    <p class="text-gray-600">Folder kebijakan tidak ditemukan.</p>
  @endif
</div>

      <!-- Renstra -->
    <div id="renstra" class="tab-content hidden">
  <h3 class="text-xl font-semibold mb-4">Rencana Strategis (Renstra)</h3>

  @php
    $renstraPath = 'renstra';
    $files = Storage::disk('public')->exists($renstraPath)
        ? Storage::disk('public')->files($renstraPath)
        : [];
  @endphp

  @if(count($files) > 0)
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
      @foreach($files as $file)
        <div class="bg-white rounded-lg shadow p-4 hover:shadow-md transition duration-300">
          <div class="h-48 overflow-hidden rounded mb-3 border border-gray-200">
            <iframe 
              src="{{ asset('storage/' . $file) }}" 
              class="w-full h-full" 
              frameborder="0">
            </iframe>
          </div>
          <h4 class="text-lg font-medium truncate mb-2">📄 {{ basename($file) }}</h4>
          <div class="flex justify-between items-center text-sm">
            <a href="{{ asset('storage/' . $file) }}" target="_blank" class="text-blue-600 hover:underline">Lihat</a>
            <a href="{{ asset('storage/' . $file) }}" download class="px-3 py-1 bg-blue-700 text-white rounded hover:bg-blue-800">Unduh</a>
          </div>
        </div>
      @endforeach
    </div>
  @else
    <p class="text-gray-600">Tidak ada dokumen Renstra yang tersedia.</p>
  @endif
</div>



      <!-- LKIP -->
    <div id="lkip" class="tab-content hidden">
  @if($lkips->count() > 0)
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
      @foreach($lkips as $lkip)
        <div class="bg-white rounded-lg shadow p-4 hover:shadow-md transition duration-300">
          <div class="h-48 overflow-hidden rounded mb-3 border border-gray-200">
            <iframe 
              src="{{ asset('storage/' . $lkip->file_path) }}" 
              class="w-full h-full" 
              frameborder="0" 
              loading="lazy">
            </iframe>
          </div>
          <h3 class="text-lg font-semibold mb-1 truncate">{{ $lkip->judul }}</h3>
          <p class="text-sm mb-3">{{ $lkip->deskripsi }}</p>
          <a href="{{ asset('storage/' . $lkip->file_path) }}" download 
             class="inline-block px-4 py-2 bg-blue-700 text-white rounded hover:bg-blue-800 text-sm">
             Unduh
          </a>
        </div>
      @endforeach
    </div>
  @else
    <p class="text-gray-600">Tidak ada dokumen LKIP yang tersedia.</p>
  @endif
</div>


      <!-- Laporan -->
<div id="laporan" class="tab-content hidden">
  @if(isset($laporans) && $laporans->count() > 0)
    @foreach($laporans as $laporan)
      <div class="bg-white rounded-lg shadow p-6 max-w-md mb-6 hover:shadow-md transition duration-300">
        <div class="h-48 overflow-hidden rounded mb-4 border border-gray-200">
          <iframe 
            src="{{ asset('storage/' . $laporan->file_path) }}" 
            class="w-full h-full" 
            frameborder="0" 
            loading="lazy">
          </iframe>
        </div>
        <h3 class="text-xl font-semibold mb-2 truncate">{{ $laporan->judul }}</h3>
        <p class="mb-4">{{ $laporan->deskripsi }}</p>
        <a href="{{ asset('storage/' . $laporan->file_path) }}" download 
           class="inline-block px-4 py-2 bg-blue-700 text-white rounded hover:bg-blue-800">
           Unduh
        </a>
      </div>
    @endforeach
  @else
    <p class="text-gray-600">Tidak ada laporan.</p>
  @endif
</div>




    </section>

    {{-- Include Footer --}}
    @include('partials.footer')

  </div>

  <script>
    function updateClock() {
      const now = new Date();
      const h = String(now.getHours()).padStart(2, '0');
      const m = String(now.getMinutes()).padStart(2, '0');
      const s = String(now.getSeconds()).padStart(2, '0');
      document.getElementById("clock").textContent = `${h}:${m}:${s}`;
    }
    setInterval(updateClock, 1000);
    updateClock();

    function showTab(tabId, event) {
      document.querySelectorAll('.tab-content').forEach(el => el.classList.add('hidden'));
      document.querySelectorAll('.tab-content').forEach(el => el.classList.remove('block'));
      document.getElementById(tabId).classList.remove('hidden');
      document.getElementById(tabId).classList.add('block');

      document.querySelectorAll('.tab-btn').forEach(btn => btn.classList.remove('active', 'bg-blue-700'));
      document.querySelectorAll('.tab-btn').forEach(btn => btn.classList.add('bg-blue-500'));
      event.target.classList.add('active');
      event.target.classList.remove('bg-blue-500');
      event.target.classList.add('bg-blue-700');
    }
  </script>
</body>
</html>
