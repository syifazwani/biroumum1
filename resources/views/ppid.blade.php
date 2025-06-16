<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>PPID - Biro Umum & ASD DKI Jakarta</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://unpkg.com/@heroicons/vue@2.0.18/outline/index.js"></script>
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
<body class="bg-fixed bg-center bg-cover" style="background-image: url('{{ asset('img/batik.jpg') }}'); font-family: 'Segoe UI', sans-serif;">
  <div class="min-h-screen flex flex-col bg-white/80 backdrop-blur-lg">

    @include('partials.navbar')

    <section class="flex-1 container mx-auto p-4 sm:p-6 lg:p-10">
      <h1 class="text-4xl font-extrabold text-center text-blue-800 mb-8 drop-shadow-md animate-fade-in">PPID - Pejabat Pengelola Informasi & Dokumentasi</h1>

      @php
        $tabs = [
          'visi-misi' => 'Visi & Misi',
          'dasar-hukum' => 'Dasar Hukum',
          'tugas-fungsi' => 'Tugas & Fungsi',
          'struktur' => 'Struktur Organisasi',
        ];
      @endphp

      <!-- Tabs -->
      <div class="flex overflow-x-auto scrollbar-hide justify-center space-x-3 mb-8 px-4">
        @foreach ($tabs as $slug => $title)
          <button onclick="showTab('{{ $slug }}', event)" class="tab-btn flex items-center gap-2 bg-blue-500 text-white rounded-full px-5 py-3 font-semibold shadow hover:bg-blue-600 hover:scale-105 transition duration-300">
            {{ $title }}
          </button>
        @endforeach
      </div>

      <!-- Tab Contents -->
      <div class="bg-white/80 shadow-xl rounded-3xl p-6 space-y-12 border border-gray-200 transition duration-700 ease-in-out transform hover:scale-[1.01]">

        {{-- Visi Misi --}}
        <div id="visi-misi" class="tab-content hidden">
          <h2 class="text-2xl font-bold text-blue-700 mb-4 border-b pb-2 animate-fade-in-down">Visi dan Misi</h2>
          @php $pdf = DB::table('visi_misi')->orderBy('created_at', 'desc')->first(); @endphp
          @if ($pdf)
              <iframe src="{{ Storage::url($pdf->path) }}" class="w-full h-[600px] mb-4 rounded-xl shadow-md border animate-fade-in" frameborder="0"></iframe>
              <a href="{{ Storage::url($pdf->path) }}" target="_blank" class="inline-block px-6 py-2 bg-gradient-to-r from-blue-500 to-blue-700 text-white rounded-full hover:scale-110 transform transition shadow-md">
                  Download PDF
              </a>
          @else
              <p class="text-gray-600 italic text-center animate-pulse">Belum ada dokumen Visi dan Misi yang diunggah.</p>
          @endif
        </div>

        {{-- Dasar Hukum --}}
        <div id="dasar-hukum" class="tab-content hidden">
          <h2 class="text-2xl font-bold text-blue-700 mb-4 border-b pb-2 animate-fade-in-down">Dasar Hukum</h2>
          @php $pdfs = DB::table('dasar_hukum')->orderBy('created_at', 'desc')->get(); @endphp
          @if ($pdfs->count() > 0)
              <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                  @foreach ($pdfs as $pdf)
                      <div class="bg-yellow-50 border border-yellow-200 rounded-2xl p-4 shadow-lg hover:scale-105 transition transform space-y-3 animate-fade-in">
                          <div class="font-semibold text-gray-700 truncate">{{ $pdf->nama_file }}</div>
                          <iframe src="{{ Storage::url($pdf->path) }}" class="w-full h-[250px] rounded shadow border" frameborder="0"></iframe>
                          <a href="{{ Storage::url($pdf->path) }}" target="_blank" class="block text-center px-4 py-2 bg-yellow-500 text-white rounded-full hover:bg-yellow-600 transition">Download PDF</a>
                      </div>
                  @endforeach
              </div>
          @else
              <p class="text-gray-600 italic text-center animate-pulse">Belum ada dokumen Dasar Hukum.</p>
          @endif
        </div>

        {{-- Tugas dan Fungsi --}}
        <div id="tugas-fungsi" class="tab-content hidden">
          <h2 class="text-2xl font-bold text-blue-700 mb-4 border-b pb-2 animate-fade-in-down">Tugas dan Fungsi</h2>
          @php $pdfs = DB::table('tugas_fungsi')->orderBy('created_at', 'desc')->get(); @endphp
          @if ($pdfs->count() > 0)
              <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                  @foreach ($pdfs as $pdf)
                      <div class="bg-green-50 border border-green-200 rounded-2xl p-4 shadow-lg hover:scale-105 transition transform space-y-3 animate-fade-in">
                          <div class="font-semibold text-gray-700 truncate">{{ $pdf->nama_file }}</div>
                          <iframe src="{{ Storage::url($pdf->path) }}" class="w-full h-[250px] rounded shadow border" frameborder="0"></iframe>
                          <a href="{{ Storage::url($pdf->path) }}" target="_blank" class="block text-center px-4 py-2 bg-green-500 text-white rounded-full hover:bg-green-600 transition">Download PDF</a>
                      </div>
                  @endforeach
              </div>
          @else
              <p class="text-gray-600 italic text-center animate-pulse">Belum ada dokumen Tugas dan Fungsi.</p>
          @endif
        </div>

        {{-- Struktur Organisasi --}}
        <div id="struktur" class="tab-content hidden text-center">
          <h2 class="text-2xl font-bold text-blue-700 mb-4 border-b pb-2 animate-fade-in-down">Struktur Organisasi PPID</h2>
          @php $struktur = DB::table('struktur_organisasi_ppid')->latest('id')->first(); @endphp
          @if($struktur)
              <img src="{{ asset('storage/' . $struktur->path) }}" alt="Struktur Organisasi PPID" class="rounded-xl shadow-lg mx-auto border animate-fade-in">
          @else
              <p class="text-gray-600 italic animate-pulse">Belum ada gambar struktur organisasi.</p>
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
