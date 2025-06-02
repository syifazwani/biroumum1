<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Informasi Balai Kota Jakarta</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
  <style>
    .tab-content { display: none; }
    .tab-active { display: block; animation: fadeIn 0.5s ease-in-out; }
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(10px); }
      to { opacity: 1; transform: translateY(0); }
    }
  </style>
</head>
<body class="bg-[#f8fafc] text-gray-900 font-sans">

  @include('partials.navbar')

  <main class="max-w-7xl mx-auto px-4 py-10">
    <h2 class="text-3xl font-bold text-center text-[#0077b6] mb-10">🧭 Informasi Balai Kota Jakarta</h2>

    <div class="flex flex-col lg:flex-row gap-8">
      <!-- Sidebar -->
      <aside class="lg:w-1/4 space-y-5">
        <div class="bg-white shadow rounded-lg p-4">
          <input
            type="text"
            id="searchInput"
            placeholder="🔍 Cari informasi..."
            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#0077b6] text-sm"
            oninput="searchTabs()"
          />
        </div>

        <div class="bg-white shadow rounded-lg p-4">
          <label class="block text-sm font-semibold mb-2 text-[#023e8a]">📁 Filter Kategori</label>
          <select id="categoryFilter" onchange="filterTabs()" class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:ring-[#0077b6]">
            <option value="all">Semua Kategori</option>
            <option value="sejarah">Sejarah</option>
            <option value="struktur">Struktur</option>
            <option value="layanan">Layanan</option>
            <option value="fasilitas">Fasilitas</option>
            <option value="agenda">Agenda</option>
          </select>
        </div>

        <div class="space-y-2" id="tabButtons">
          @php
            $tabs = [
              'sejarah' => ['icon' => 'fa-landmark', 'label' => 'Sejarah Balai Kota'],
              'struktur' => ['icon' => 'fa-sitemap', 'label' => 'Struktur Organisasi'],
              'layanan' => ['icon' => 'fa-concierge-bell', 'label' => 'Layanan Publik'],
              'fasilitas' => ['icon' => 'fa-building', 'label' => 'Fasilitas Umum'],
              'agenda' => ['icon' => 'fa-calendar-days', 'label' => 'Agenda Kegiatan'],
            ];
          @endphp

          @foreach ($tabs as $id => $tab)
            <button
              onclick="showTab('{{ $id }}')"
              class="tab-button w-full flex items-center gap-2 bg-[#0077b6] text-white px-4 py-2 rounded hover:bg-[#0096c7] transition"
              data-title="{{ strtolower($tab['label']) }}"
              data-category="{{ $id }}"
            >
              <i class="fa-solid {{ $tab['icon'] }}"></i> {{ $tab['label'] }}
            </button>
          @endforeach
        </div>
      </aside>

      <!-- Konten -->
      <section class="lg:w-3/4 space-y-6 text-sm">
        <div id="sejarah" class="tab-content tab-active bg-white p-6 rounded shadow-md border-l-4 border-[#0077b6]">
          <h3 class="text-xl font-bold text-[#023e8a] mb-2">🏛️ Sejarah Balai Kota</h3>
          <p>Balai Kota Jakarta merupakan pusat administrasi pemerintahan Provinsi DKI Jakarta...</p>
        </div>

        <div id="struktur" class="tab-content bg-white p-6 rounded shadow-md border-l-4 border-[#0077b6]">
          <h3 class="text-xl font-bold text-[#023e8a] mb-2">🗂️ Struktur Organisasi</h3>
          <p>Struktur organisasi terdiri dari Gubernur, Wakil Gubernur, Sekda, dan dinas-dinas...</p>
        </div>

        <div id="layanan" class="tab-content bg-white p-6 rounded shadow-md border-l-4 border-[#0077b6]">
          <h3 class="text-xl font-bold text-[#023e8a] mb-2">🤝 Layanan Publik</h3>
          <ul class="list-disc ml-6 space-y-1">
            <li>Pusat Informasi & Pelayanan Terpadu</li>
            <li>Perizinan & Non-Perizinan</li>
            <li>Pengaduan Masyarakat</li>
          </ul>
        </div>

        <div id="fasilitas" class="tab-content bg-white p-6 rounded shadow-md border-l-4 border-[#0077b6]">
          <h3 class="text-xl font-bold text-[#023e8a] mb-2">🏢 Fasilitas Umum</h3>
          <ul class="list-disc ml-6 space-y-1">
            <li>Aula Balai Agung</li>
            <li>Taman & Area Parkir</li>
            <li>Toilet Umum & Fasilitas Difabel</li>
          </ul>
        </div>

        <div id="agenda" class="tab-content bg-white p-6 rounded shadow-md border-l-4 border-[#0077b6]">
          <h3 class="text-xl font-bold text-[#023e8a] mb-2">📅 Agenda Kegiatan</h3>
          <p>Pelantikan, musyawarah daerah, rapat, dan kegiatan terbuka masyarakat ditampilkan di sini.</p>
        </div>
      </section>
    </div>
  </main>

  @include('partials.footer')

  <!-- Script -->
  <script>
    function showTab(id) {
      document.querySelectorAll('.tab-content').forEach(tab => tab.classList.remove('tab-active'));
      document.getElementById(id).classList.add('tab-active');
    }

    function searchTabs() {
      const keyword = document.getElementById('searchInput').value.toLowerCase();
      const buttons = document.querySelectorAll('.tab-button');
      let firstVisibleId = null;

      buttons.forEach(button => {
        const title = button.dataset.title;
        const match = title.includes(keyword);
        button.classList.toggle('hidden', !match);
        if (match && !firstVisibleId) {
          firstVisibleId = button.getAttribute('onclick').match(/'(\w+)'/)[1];
        }
      });

      if (firstVisibleId) showTab(firstVisibleId);
    }

    function filterTabs() {
      const category = document.getElementById('categoryFilter').value;
      const buttons = document.querySelectorAll('.tab-button');

      buttons.forEach(button => {
        const buttonCategory = button.dataset.category;
        const isVisible = category === "all" || buttonCategory === category;
        button.classList.toggle('hidden', !isVisible);
      });

      const visibleButton = [...buttons].find(btn => !btn.classList.contains('hidden'));
      if (visibleButton) {
        const firstVisibleId = visibleButton.getAttribute('onclick').match(/'(\w+)'/)[1];
        showTab(firstVisibleId);
      }
    }
  </script>
</body>
</html>
