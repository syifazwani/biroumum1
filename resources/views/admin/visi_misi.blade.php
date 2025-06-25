<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Manajemen Visi dan Misi - Biro Umum dan ASD</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>
<body class="bg-gray-100 text-black flex flex-col min-h-screen" style="background-image: url('{{ asset('img/batik.jpg') }}'); background-size: cover; background-position: center;">

  <div class="flex flex-col min-h-screen bg-white/95">

    @include('partials.navbaradmin')

    <a href="{{ route('admin.dashboard') }}">
      <button class="mt-4 ml-4 px-4 py-2 rounded bg-gray-300 hover:bg-gray-400 text-gray-800 flex items-center gap-2 transition duration-300 ease-in-out">
        ← Kembali ke Admin
      </button>
    </a>

    <main class="container mx-auto px-6 py-10 max-w-6xl">
      <h2 class="text-4xl font-extrabold mb-8 text-center text-[#0077b6]" data-aos="fade-down">Manajemen Visi dan Misi</h2>

      @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-800 p-3 rounded mb-6 animate-pulse" data-aos="fade-up">
          {{ session('success') }}
        </div>
      @endif

      {{-- Form Upload --}}
      <section data-aos="fade-up">
        <form action="{{ route('admin.visi_misi.store') }}" method="POST" enctype="multipart/form-data"
              class="bg-gradient-to-r from-blue-50 to-blue-100 p-6 rounded-xl shadow-lg space-y-4 hover:shadow-2xl transition duration-300">
          @csrf
          <div>
            <label class="block text-gray-700 font-semibold mb-1">Nama File</label>
            <input type="text" name="nama_file" required placeholder="Masukkan Nama File"
                   class="w-full border border-gray-300 rounded px-4 py-2 bg-white text-gray-800 focus:ring-2 focus:ring-blue-400 focus:outline-none">
          </div>
          <div>
            <label class="block text-gray-700 font-semibold mb-1">Unggah File PDF</label>
            <input type="file" name="file" required accept=".pdf"
                   class="w-full border border-gray-300 rounded px-4 py-2 bg-white text-gray-800 focus:ring-2 focus:ring-blue-400 focus:outline-none">
          </div>
          <div class="text-center">
            <button type="submit" class="bg-blue-700 text-white px-6 py-2 rounded-full hover:bg-blue-800 transition duration-300 ease-in-out">
              Upload Visi & Misi
            </button>
          </div>
        </form>
      </section>

      {{-- Daftar File --}}
      <section class="mt-10" data-aos="fade-up">
        @if(count($visi_misi) > 0)
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
          @foreach($visi_misi as $item)
            <div class="bg-white rounded-2xl shadow-md p-4 flex flex-col hover:scale-105 hover:shadow-xl transition duration-300 ease-in-out" data-aos="zoom-in">
              <h4 class="text-lg font-semibold mb-2 text-gray-800 truncate">📄 {{ $item->nama_file }}</h4>
              <div class="h-48 border mb-3 rounded overflow-hidden bg-gray-50">
                <iframe src="{{ asset('storage/' . $item->path) }}#toolbar=0" class="w-full h-full" frameborder="0"></iframe>
              </div>
              <div class="flex justify-between items-center text-sm mt-auto">
                <a href="{{ Storage::url($item->path) }}" target="_blank" class="text-blue-600 hover:underline transition">Lihat / Download</a>
                <a href="{{ route('admin.visi_misi.edit', $item->id) }}" class="text-yellow-600 hover:underline transition">Edit</a>
                <form action="{{ route('admin.visi_misi.destroy', $item->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus file ini?')">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="text-red-600 hover:underline transition">Hapus</button>
                </form>
              </div>
            </div>
          @endforeach
        </div>
        @else
        <p class="text-center text-gray-500 italic mt-6 animate-fade-in">Tidak ada file Visi dan Misi yang tersedia.</p>
        @endif
      </section>
    </main>

    @include('partials.footer')

  </div>

  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>AOS.init({ duration: 800, once: true });</script>

</body>
</html>
