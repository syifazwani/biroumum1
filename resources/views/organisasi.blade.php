<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Organisasi - Biro Umum & ASD DKI Jakarta</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    .tab-btn.active {
      @apply bg-gradient-to-r from-blue-600 to-blue-800 text-white shadow-xl scale-105;
    }
    .tab-content {
      transition: opacity 0.6s ease, transform 0.6s ease;
    }
    .tab-content.hidden {
      opacity: 0;
      transform: translateY(10px) scale(0.95);
    }
  </style>
</head>
<body class="bg-fixed bg-center bg-cover text-gray-800" style="background-image: url('{{ asset('img/batik.jpg') }}'); font-family: 'Segoe UI', sans-serif;">
  <div class="min-h-screen flex flex-col bg-white/90">

    @include('partials.navbar')

    <section class="flex-1 container mx-auto p-4 sm:p-6 lg:p-10">
      <h1 class="text-4xl font-extrabold text-center text-blue-800 mb-8 drop-shadow-md animate-fade-in">Informasi Organisasi</h1>

      @php
        $tabs = [
          'struktur'   => 'Struktur Organisasi',
          'kebijakan'  => 'Kebijakan & Regulasi',
          'renstra'    => 'Renstra',
          'lkip'       => 'LKIP',
          'laporan'    => 'Laporan Keuangan',
        ];
      @endphp

      <!-- Tabs -->
      <div class="flex justify-center space-x-3 mb-8 px-4">
        @foreach ($tabs as $slug => $title)
          <button onclick="showTab('{{ $slug }}', event)" class="tab-btn bg-blue-500 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-600 active">
            {{ $title }}
          </button>
        @endforeach
      </div>

      <!-- Tab Contents -->
      <div class="bg-white/80 shadow-xl rounded-3xl p-6 space-y-12 border border-gray-200 transition duration-700 ease-in-out transform hover:scale-[1.01]">

        {{-- Struktur Organisasi --}}
        <div id="struktur" class="tab-content hidden text-center">
          <h2 class="text-2xl font-bold text-blue-700 mb-4 border-b pb-2">Struktur Organisasi</h2>
          @php
            $struktur = DB::table('struktur_organisasi')->latest('id')->first();
          @endphp
          @if($struktur)
            <img src="{{ asset('storage/' . $struktur->image_path) }}" alt="Struktur Organisasi" class="rounded-xl shadow-lg mx-auto border animate-fade-in">
          @else
            <p class="text-gray-600 italic animate-pulse">Belum ada gambar struktur organisasi.</p>
          @endif
        </div>

        {{-- Kebijakan --}}
        <div id="kebijakan" class="tab-content hidden text-center">
          <h2 class="text-2xl font-bold text-blue-700 mb-4 border-b pb-2">Kebijakan & Regulasi</h2>
          @php $files = Storage::disk('public')->files('kebijakan'); @endphp
          @if(count($files) > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
              @foreach($files as $file)
                <div class="bg-yellow-50 border border-yellow-200 rounded-2xl p-4 shadow-lg hover:scale-105 transition space-y-3 animate-fade-in">
                  <div class="font-semibold text-gray-700 truncate">{{ basename($file) }}</div>
                  <iframe src="{{ asset('storage/' . $file) }}" class="w-full h-[250px] rounded shadow border"></iframe>
                  <a href="{{ asset('storage/' . $file) }}" target="_blank" class="block text-center px-4 py-2 bg-yellow-500 text-white rounded-full hover:bg-yellow-600 transition">Download PDF</a>
                </div>
              @endforeach
            </div>
          @else
            <p class="text-gray-600 italic animate-pulse">Belum ada dokumen kebijakan.</p>
          @endif
        </div>

        {{-- Renstra --}}
        <div id="renstra" class="tab-content hidden text-center">
          <h2 class="text-2xl font-bold text-blue-700 mb-4 border-b pb-2">Renstra</h2>
          @php
            $files = Storage::disk('public')->files('renstra');
          @endphp
          @if(count($files) > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
              @foreach($files as $file)
                <div class="bg-green-50 border border-green-200 rounded-2xl p-4 shadow-lg hover:scale-105 transition space-y-3 animate-fade-in">
                  <div class="font-semibold text-gray-700 truncate">{{ basename($file) }}</div>
                  <iframe src="{{ asset('storage/' . $file) }}" class="w-full h-[250px] rounded shadow border"></iframe>
                  <a href="{{ asset('storage/' . $file) }}" target="_blank" class="block text-center px-4 py-2 bg-green-500 text-white rounded-full hover:bg-green-600 transition">Download PDF</a>
                </div>
              @endforeach
            </div>
          @else
            <p class="text-gray-600 italic animate-pulse">Belum ada dokumen Renstra.</p>
          @endif
        </div>

        {{-- LKIP --}}
        <div id="lkip" class="tab-content hidden text-center">
          <h2 class="text-2xl font-bold text-blue-700 mb-4 border-b pb-2">LKIP</h2>
          @if($lkips->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
              @foreach($lkips as $lkip)
                <div class="bg-blue-50 border border-blue-200 rounded-2xl p-4 shadow-lg hover:scale-105 transition space-y-3 animate-fade-in">
                  <div class="font-semibold text-gray-700 truncate">{{ $lkip->judul }}</div>
                  <iframe src="{{ asset('storage/' . $lkip->file_path) }}" class="w-full h-[250px] rounded shadow border"></iframe>
                  <a href="{{ asset('storage/' . $lkip->file_path) }}" target="_blank" class="block text-center px-4 py-2 bg-blue-500 text-white rounded-full hover:bg-blue-600 transition">Download PDF</a>
                </div>
              @endforeach
            </div>
          @else
            <p class="text-gray-600 italic animate-pulse">Belum ada dokumen LKIP.</p>
          @endif
        </div>

        {{-- Laporan Keuangan --}}
        <div id="laporan" class="tab-content hidden text-center">
          <h2 class="text-2xl font-bold text-blue-700 mb-4 border-b pb-2">Laporan Keuangan</h2>
          @if($laporans->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
              @foreach($laporans as $laporan)
                <div class="bg-purple-50 border border-purple-200 rounded-2xl p-4 shadow-lg hover:scale-105 transition space-y-3 animate-fade-in">
                  <div class="font-semibold text-gray-700 truncate">{{ $laporan->judul }}</div>
                  <iframe src="{{ asset('storage/' . $laporan->file_path) }}" class="w-full h-[250px] rounded shadow border"></iframe>
                  <a href="{{ asset('storage/' . $laporan->file_path) }}" target="_blank" class="block text-center px-4 py-2 bg-purple-500 text-white rounded-full hover:bg-purple-600 transition">Download PDF</a>
                </div>
              @endforeach
            </div>
          @else
            <p class="text-gray-600 italic animate-pulse">Belum ada laporan keuangan.</p>
          @endif
        </div>

      </div>
    </section>

    @include('partials.footer')

  </div>

  <script>
    function showTab(tabId, event) {
      document.querySelectorAll('.tab-content').forEach(tab => tab.classList.add('hidden'));
      document.querySelectorAll('.tab-btn').forEach(btn => btn.classList.remove('active'));
      document.getElementById(tabId).classList.remove('hidden');
      event.currentTarget.classList.add('active');
    }

    document.addEventListener('DOMContentLoaded', () => {
      const firstTab = document.querySelector('.tab-content');
      if (firstTab) firstTab.classList.remove('hidden');
      const firstBtn = document.querySelector('.tab-btn');
      if (firstBtn) firstBtn.classList.add('active');
    });
  </script>
</body>
</html>
