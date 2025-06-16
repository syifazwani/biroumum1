<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>PPID - Biro Umum & ASD DKI Jakarta</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-fixed bg-center bg-cover" style="background-image: url('{{ asset('img/batik.jpg') }}'); font-family: 'Segoe UI', sans-serif;">
  <div class="min-h-screen flex flex-col bg-white bg-opacity-95">

    @include('partials.navbar')

    <section class="flex-1 container mx-auto p-6">
      <h1 class="text-3xl font-extrabold text-center text-blue-800 mb-8 drop-shadow">Pejabat Pengelola Informasi & Dokumentasi (PPID)</h1>

      @php
        $tabs = [
          'visi-misi' => 'Visi & Misi',
          'dasar-hukum' => 'Dasar Hukum',
          'tugas-fungsi' => 'Tugas & Fungsi',
          'struktur' => 'Struktur Organisasi',
        ];
      @endphp

      <div class="flex flex-wrap justify-center gap-4 mb-6">
        @foreach ($tabs as $slug => $title)
          <button onclick="showTab('{{ $slug }}', event)" class="tab-btn bg-blue-600 text-white rounded-full px-5 py-2 font-semibold shadow hover:bg-blue-700 transition duration-200">
            {{ $title }}
          </button>
        @endforeach
      </div>

      <div class="bg-white/90 shadow-xl rounded-xl p-6 space-y-10">
        {{-- Visi Misi --}}
        <div id="visi-misi" class="tab-content hidden">
          <h2 class="text-2xl font-bold text-blue-700 mb-4">Visi dan Misi</h2>
          @php
              $pdf = DB::table('visi_misi')->orderBy('created_at', 'desc')->first();
          @endphp
          @if ($pdf)
              <iframe src="{{ Storage::url($pdf->path) }}" class="w-full h-[600px] mb-4 border rounded shadow" frameborder="0"></iframe>
              <a href="{{ Storage::url($pdf->path) }}" target="_blank" class="inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                  Download PDF
              </a>
          @else
              <p class="text-gray-600 italic">Belum ada dokumen Visi dan Misi yang diunggah.</p>
          @endif
        </div>

        {{-- Dasar Hukum (3 kolom) --}}
        <div id="dasar-hukum" class="tab-content hidden">
          <h2 class="text-2xl font-bold text-blue-700 mb-4">Dasar Hukum</h2>
          @php
              $pdfs = DB::table('dasar_hukum')->orderBy('created_at', 'desc')->get();
          @endphp
          @if ($pdfs->count() > 0)
              <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                  @foreach ($pdfs as $pdf)
                      <div class="bg-yellow-50 border border-yellow-300 rounded-lg p-4 shadow space-y-4">
                          <div class="font-medium text-gray-800 truncate">{{ $pdf->nama_file }}</div>
                          <iframe src="{{ Storage::url($pdf->path) }}" class="w-full h-[250px] border rounded" frameborder="0"></iframe>
                          <a href="{{ Storage::url($pdf->path) }}" target="_blank" class="block text-center px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                              Download PDF
                          </a>
                      </div>
                  @endforeach
              </div>
          @else
              <p class="text-gray-600 italic">Belum ada dokumen Dasar Hukum yang diunggah.</p>
          @endif
        </div>

        {{-- Tugas dan Fungsi (3 kolom) --}}
        <div id="tugas-fungsi" class="tab-content hidden">
          <h2 class="text-2xl font-bold text-blue-700 mb-4">Tugas dan Fungsi</h2>
          @php
              $pdfs = DB::table('tugas_fungsi')->orderBy('created_at', 'desc')->get();
          @endphp
          @if ($pdfs->count() > 0)
              <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                  @foreach ($pdfs as $pdf)
                      <div class="bg-green-50 border border-green-300 rounded-lg p-4 shadow space-y-4">
                          <div class="font-medium text-gray-800 truncate">{{ $pdf->nama_file }}</div>
                          <iframe src="{{ Storage::url($pdf->path) }}" class="w-full h-[250px] border rounded" frameborder="0"></iframe>
                          <a href="{{ Storage::url($pdf->path) }}" target="_blank" class="block text-center px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                              Download PDF
                          </a>
                      </div>
                  @endforeach
              </div>
          @else
              <p class="text-gray-600 italic">Belum ada dokumen Tugas dan Fungsi yang diunggah.</p>
          @endif
        </div>

        {{-- Struktur Organisasi --}}
        <div id="struktur" class="tab-content hidden text-center">
          <h2 class="text-2xl font-bold text-blue-700 mb-4">Struktur Organisasi PPID</h2>
          @php
              $struktur = DB::table('struktur_organisasi_ppid')->latest('id')->first();
          @endphp
          @if($struktur)
              <img src="{{ asset('storage/' . $struktur->path) }}" alt="Struktur Organisasi PPID" class="rounded-lg shadow-lg max-w-full mx-auto">
          @else
              <p class="text-gray-600 italic">Belum ada gambar struktur organisasi.</p>
          @endif
        </div>

      </div>
    </section>

    @include('partials.footer')
  </div>

  <script>
    function showTab(tabId, event) {
      document.querySelectorAll('.tab-content').forEach(tab => tab.classList.add('hidden'));
      document.querySelectorAll('.tab-btn').forEach(btn => btn.classList.remove('bg-blue-700'));
      document.getElementById(tabId).classList.remove('hidden');
      event.target.classList.add('bg-blue-700');
    }

    document.addEventListener('DOMContentLoaded', () => {
      const firstTab = document.querySelector('.tab-content');
      if (firstTab) firstTab.classList.remove('hidden');
      const firstBtn = document.querySelector('.tab-btn');
      if (firstBtn) firstBtn.classList.add('bg-blue-700');
    });
  </script>
</body>
</html>
