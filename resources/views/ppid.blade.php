<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>PPID | Biro Umum & ASD DKI Jakarta</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    .tab-content {
      display: none;
      opacity: 0;
      transform: translateY(20px);
      transition: all 0.5s ease;
    }
    .tab-content.active {
      display: block;
      opacity: 1;
      transform: translateY(0);
    }

    .animated-card:hover {
      transform: translateY(-5px) scale(1.02);
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }
  </style>
</head>
<body class="bg-gradient-to-br from-blue-50 to-white text-gray-800 font-sans">

  @include('partials.navbar')

  <main class="max-w-7xl mx-auto px-4 py-12">
    <h1 class="text-4xl font-extrabold text-center text-[#03045e] mb-10 animate-pulse">PPID - Pejabat Pengelola Informasi & Dokumentasi</h1>

    <!-- Tab Menu -->
    <div class="flex flex-wrap justify-center gap-4 mb-10">
      @php
        $tabs = [
          'visi-misi' => 'Visi & Misi',
          'dasar-hukum' => 'Dasar Hukum',
          'tugas-fungsi' => 'Tugas & Fungsi',
          'struktur' => 'Struktur Organisasi',
          'informasi-publik' => 'Informasi Publik',
          'kontak' => 'Kontak'
        ];
      @endphp

      @foreach ($tabs as $id => $label)
        <button 
          class="tab-button px-5 py-3 bg-[#0077b6] text-white font-medium rounded-full shadow-md hover:bg-[#023e8a] transition duration-300"
          data-target="{{ $id }}">
          {{ $label }}
        </button>
      @endforeach
    </div>

    <!-- Tab Content -->
    <div class="space-y-10">
      @foreach ($tabs as $id => $label)
        <div id="{{ $id }}" class="tab-content">
          <div class="bg-white shadow-xl rounded-xl p-8">
            <h2 class="text-2xl font-semibold text-[#023e8a] mb-6 border-b pb-2">{{ $label }}</h2>

            @if($id === 'informasi-publik')
              <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @for($i = 1; $i <= 6; $i++)
                  <div class="animated-card p-5 rounded-xl border bg-gradient-to-t from-blue-100 to-white transition duration-300">
                    <h3 class="text-lg font-bold text-[#03045e] mb-2">Informasi {{ $i }}</h3>
                    <p class="text-sm text-gray-600">Deskripsi mengenai informasi publik ke-{{ $i }} yang dapat diakses masyarakat.</p>
                  </div>
                @endfor
              </div>
            @elseif($id === 'struktur')
              <div class="text-center">
                <img src="/images/struktur-ppid.png" alt="Struktur PPID" class="mx-auto rounded-lg shadow-lg max-w-lg mb-4 animate-fade-in">
                <p class="text-gray-600">Struktur organisasi PPID yang terdiri dari pejabat utama dan pelaksana teknis informasi.</p>
              </div>
            @elseif($id === 'kontak')
              <div class="grid sm:grid-cols-2 gap-6 text-sm">
                <div class="p-4 border rounded-lg bg-gray-50 hover:shadow-md transition">
                  <h4 class="font-semibold mb-2 text-[#03045e]">Alamat Kantor</h4>
                  <p>Jl. Medan Merdeka Selatan No. 8-9, Jakarta Pusat</p>
                </div>
                <div class="p-4 border rounded-lg bg-gray-50 hover:shadow-md transition">
                  <h4 class="font-semibold mb-2 text-[#03045e]">Kontak</h4>
                  <p>Email: <a href="mailto:ppid@jakarta.go.id" class="text-blue-700 hover:underline">ppid@jakarta.go.id</a><br>
                  Telp: (021) 3822255</p>
                </div>
              </div>
            @else
              <div class="animate-fade-in text-gray-700 leading-relaxed">
                <p>Konten untuk <strong>{{ $label }}</strong> akan ditampilkan di sini. Silakan lengkapi konten atau tautkan ke database.</p>
              </div>
            @endif
          </div>
        </div>
      @endforeach
    </div>
  </main>

  <footer class="bg-[#03045e] text-white text-center py-6 mt-10">
    <p>© 2025 Biro Umum & ASD DKI Jakarta. All rights reserved.</p>
  </footer>

  <script>
    const buttons = document.querySelectorAll('.tab-button');
    const contents = document.querySelectorAll('.tab-content');

    buttons.forEach(btn => {
      btn.addEventListener('click', () => {
        const target = btn.getAttribute('data-target');

        contents.forEach(content => content.classList.remove('active'));
        document.getElementById(target).classList.add('active');
      });
    });

      function updateClock() {
    const now = new Date();
    const h = String(now.getHours()).padStart(2, '0');
    const m = String(now.getMinutes()).padStart(2, '0');
    const s = String(now.getSeconds()).padStart(2, '0');
    document.getElementById("clock").textContent = `${h}:${m}:${s}`;
  }
  setInterval(updateClock, 1000);
  updateClock();

    // Show first tab by default
    if (contents.length > 0) contents[0].classList.add('active');
  </script>
</body>
</html>
