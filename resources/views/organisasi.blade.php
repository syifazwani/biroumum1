<!DOCTYPE html>
<html lang="id" class="h-full">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Organisasi - Biro Umum & ASD SETDA DKI Jakarta</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    .tab-content {
      transition: all 0.5s ease-in-out;
    }
    .tab-btn.active {
      background-color: #1D4ED8; /* Tailwind blue-700 */
    }
  </style>
</head>
<body class="bg-fixed bg-center bg-cover text-gray-800" style="background-image: url('{{ asset('img/batik.jpg') }}'); font-family: 'Segoe UI', sans-serif;">
  <div class="min-h-screen flex flex-col bg-white/90">

    {{-- Include Navbar --}}
    @include('partials.navbar')

    <section class="flex-1 container mx-auto p-4 sm:p-6 lg:p-10">
      <h1 class="text-4xl font-extrabold text-center text-blue-800 mb-8 drop-shadow-md animate-fade-in">Informasi Organisasi</h1>
      
      <!-- Tabs Navigation -->
      <div class="flex flex-wrap justify-center gap-4 mb-8">
        <button onclick="showTab('struktur', event)" class="tab-btn bg-blue-500 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-600 active">Struktur Organisasi</button>
        <button onclick="showTab('kebijakan', event)" class="tab-btn bg-blue-500 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-600">Kebijakan & Regulasi</button>
        <button onclick="showTab('renstra', event)" class="tab-btn bg-blue-500 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-600">Renstra</button>
        <button onclick="showTab('lkip', event)" class="tab-btn bg-blue-500 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-600">LKIP</button>
        <button onclick="showTab('laporan', event)" class="tab-btn bg-blue-500 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-600">Laporan Keuangan</button>
      </div>

       <div class="bg-white/80 shadow-xl rounded-3xl p-6 space-y-12 border border-gray-200 transition duration-700 ease-in-out transform hover:scale-[1.01]">
      <!-- Struktur Organisasi -->
      <div id="struktur" class="tab-content text-center">
        <h2 class="text-2xl font-bold text-blue-700 mb-4 border-b pb-2 animate-fade-in-down">Struktur Organisasi</h2>
        @php
            $struktur = DB::table('struktur_organisasi')->latest('id')->first();
        @endphp
        @if($struktur)
          <img src="{{ asset('storage/' . $struktur->image_path) }}" alt="Struktur Organisasi" class="w-full max-w-4xl mx-auto rounded-lg shadow-lg border border-gray-300">
        @else
          <p class="text-center text-gray-600">Belum ada gambar struktur organisasi.</p>
        @endif
      </div>

      <!-- Kebijakan -->
      <div id="kebijakan" class="tab-content hidden text-center">
        <h2 class="text-2xl font-bold text-blue-700 mb-4 border-b pb-2 animate-fade-in-down">Kebijakan & Regulasi</h2>
        @php $files = Storage::disk('public')->files('kebijakan'); @endphp
        @if(count($files) > 0)
          <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($files as $file)
              <div class="bg-white rounded-lg shadow p-4 hover:shadow-md transition">
                <iframe src="{{ asset('storage/' . $file) }}" class="w-full h-48 border rounded mb-2"></iframe>
                <p class="font-medium truncate mb-2">📄 {{ basename($file) }}</p>
                <div class="flex justify-between text-sm">
                  <a href="{{ asset('storage/' . $file) }}" target="_blank" class="text-blue-600 hover:underline">Lihat</a>
                  <a href="{{ asset('storage/' . $file) }}" download class="bg-blue-700 text-white px-2 py-1 rounded hover:bg-blue-800">Unduh</a>
                </div>
              </div>
            @endforeach
          </div>
        @else
          <p class="text-center text-gray-600">Tidak ada dokumen kebijakan.</p>
        @endif
      </div>

      <!-- Renstra -->
      <div id="renstra" class="tab-content hidden text-center">
        <h2 class="text-2xl font-bold text-blue-700 mb-4 border-b pb-2 animate-fade-in-down">Rencana Strategis (Renstra)</h2>
        @php
          $renstraFiles = Storage::disk('public')->exists('renstra') ? Storage::disk('public')->files('renstra') : [];
        @endphp
        @if(count($renstraFiles) > 0)
          <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($renstraFiles as $file)
              <div class="bg-white rounded-lg shadow p-4 hover:shadow-md transition">
                <iframe src="{{ asset('storage/' . $file) }}" class="w-full h-48 border rounded mb-2"></iframe>
                <p class="font-medium truncate mb-2">📄 {{ basename($file) }}</p>
                <div class="flex justify-between text-sm">
                  <a href="{{ asset('storage/' . $file) }}" target="_blank" class="text-blue-600 hover:underline">Lihat</a>
                  <a href="{{ asset('storage/' . $file) }}" download class="bg-blue-700 text-white px-2 py-1 rounded hover:bg-blue-800">Unduh</a>
                </div>
              </div>
            @endforeach
          </div>
        @else
          <p class="text-center text-gray-600">Tidak ada dokumen Renstra.</p>
        @endif
      </div>

      <!-- LKIP -->
      <div id="lkip" class="tab-content hidden text-center">
        <h2 class="text-2xl font-bold text-blue-700 mb-4 border-b pb-2 animate-fade-in-down">Laporan Kinerja Instansi Pemerintah (LKIP)</h2>
        @if($lkips->count() > 0)
          <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($lkips as $lkip)
              <div class="bg-white rounded-lg shadow p-4 hover:shadow-md transition">
                <iframe src="{{ asset('storage/' . $lkip->file_path) }}" class="w-full h-48 border rounded mb-2"></iframe>
                <p class="font-medium truncate mb-1">📄 {{ $lkip->judul }}</p>
                <p class="text-sm text-gray-600 truncate mb-2">{{ $lkip->deskripsi }}</p>
                <div class="flex justify-between text-sm">
                  <a href="{{ asset('storage/' . $lkip->file_path) }}" target="_blank" class="text-blue-600 hover:underline">Lihat</a>
                  <a href="{{ asset('storage/' . $lkip->file_path) }}" download class="bg-blue-700 text-white px-2 py-1 rounded hover:bg-blue-800">Unduh</a>
                </div>
              </div>
            @endforeach
          </div>
        @else
          <p class="text-center text-gray-600">Tidak ada dokumen LKIP.</p>
        @endif
      </div>

      <!-- Laporan Keuangan -->
      <div id="laporan" class="tab-content hidden text-center">
        <h2 class="text-2xl font-bold text-blue-700 mb-4 border-b pb-2 animate-fade-in-down">Laporan Keuangan</h2>
        @if($laporans->count() > 0)
          <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($laporans as $laporan)
              <div class="bg-white rounded-lg shadow p-4 hover:shadow-md transition">
                <iframe src="{{ asset('storage/' . $laporan->file_path) }}" class="w-full h-48 border rounded mb-2"></iframe>
                <p class="font-medium truncate mb-1">📄 {{ $laporan->judul }}</p>
                <p class="text-sm text-gray-600 truncate mb-2">{{ $laporan->deskripsi }}</p>
                <div class="flex justify-between text-sm">
                  <a href="{{ asset('storage/' . $laporan->file_path) }}" target="_blank" class="text-blue-600 hover:underline">Lihat</a>
                  <a href="{{ asset('storage/' . $laporan->file_path) }}" download class="bg-blue-700 text-white px-2 py-1 rounded hover:bg-blue-800">Unduh</a>
                </div>
              </div>
            @endforeach
          </div>
        @else
          <p class="text-center text-gray-600">Tidak ada laporan keuangan.</p>
        @endif
      </div>
       </div>
    </section>

    {{-- Include Footer --}}
    @include('partials.footer')

  </div>

  <script>
    function showTab(tabId, event) {
      document.querySelectorAll('.tab-content').forEach(el => el.classList.add('hidden'));
      document.getElementById(tabId).classList.remove('hidden');

      document.querySelectorAll('.tab-btn').forEach(btn => btn.classList.remove('active'));
      event.target.classList.add('active');
    }
  </script>
</body>
</html>