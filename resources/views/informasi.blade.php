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
    <h2 class="text-3xl font-bold text-center text-[#0077b6] mb-10">Informasi Balai Kota Jakarta</h2>

    <!-- Tab Navigation -->
    <div class="flex justify-center gap-4 mb-8">
      <button onclick="showTab('balai')" class="bg-[#0077b6] text-white px-4 py-2 rounded hover:bg-[#005f8a]">Ada Apa di Balai Kota</button>
      <button onclick="showTab('berita')" class="bg-[#0077b6] text-white px-4 py-2 rounded hover:bg-[#005f8a]">Berita</button>
    </div>

    <!-- Tab Content -->
    <section class="space-y-6 text-sm">

      <!-- Tab 1: Ada Apa di Balai Kota -->
      <div id="balai" class="tab-content tab-active bg-white p-6 rounded shadow-md border-l-4 border-[#0077b6]">
        <h3 class="text-xl font-bold text-[#023e8a] mb-4">🏛️ Ada Apa di Balai Kota?</h3>
        <div class="flex flex-col md:flex-row gap-6 items-start md:items-center">
          <div class="flex-1">
            <p class="mb-4 text-justify">
              Ketika kita berkunjung ke Balaikota pasti kita bertanya-tanya ada apa saja sih di Balaikota Jakarta? Nah berikut ini kami informasikan hal-hal menarik yang dapat anda temui di Balaikota Jakarta.
            </p>
            <ul class="list-disc pl-6 text-lg text-gray-700 leading-relaxed">
    @forelse($items as $item)
        <li>
            <a href="{{ route('informasi.show', $item->id) }}" class="text-blue-600 hover:underline">
                Ada {{ $item->title }} di Balai Kota DKI Jakarta
            </a>
        </li>
    @empty
        <li>Belum ada data tersedia.</li>
    @endforelse
</ul>

          </div>
          <div class="md:w-[400px] w-full">
            <img src="{{ asset('img/DJI_0135.jpg') }}" alt="Balai Kota" class="rounded-xl shadow-md w-full object-cover">
          </div>
        </div>
      </div>

      <!-- Tab 2: Berita -->
      <div id="berita" class="tab-content bg-white p-6 rounded shadow-md border-l-4 border-[#0077b6]">
        <h3 class="text-xl font-bold text-[#023e8a] mb-4">📰 Berita Terkini</h3>
        <p>Belum ada berita terbaru. Silakan cek kembali nanti.</p>
      </div>

    </section>
  </main>

  @include('partials.footer')

  <!-- Script -->
  <script>
    function showTab(id) {
      document.querySelectorAll('.tab-content').forEach(tab => tab.classList.remove('tab-active'));
      document.getElementById(id).classList.add('tab-active');
    }
  </script>
</body>
</html>
