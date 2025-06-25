<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Manajemen LKIP - Biro Umum dan ASD DKI Jakarta</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>
<body class="bg-gray-100 text-black flex flex-col min-h-screen" style="background-image: url('{{ asset('img/batik.jpg') }}'); background-size: cover; background-position: center;">

  <div class="flex flex-col min-h-screen bg-white/95">
    @include('partials.navbar')

    <a href="{{ route('admin.dashboard') }}">
      <button class="mt-4 ml-4 px-4 py-2 rounded bg-gray-300 hover:bg-gray-400 text-gray-800 flex items-center gap-2">
        ← Kembali ke Admin
      </button>
    </a>

    <main class="container mx-auto px-6 py-10 space-y-10">
      <h1 class="text-4xl font-bold text-center text-[#0077b6]" data-aos="fade-down">Manajemen LKIP</h1>

      {{-- Form Upload LKIP --}}
      <section class="bg-white p-6 rounded-xl shadow-md space-y-4" data-aos="fade-up">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Upload LKIP Baru</h2>
        <form action="{{ route('admin.lkip.upload') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
          @csrf
          <div>
            <label class="block text-gray-700 font-medium mb-1">Judul</label>
            <input type="text" name="judul" required placeholder="Masukkan Judul LKIP"
                   class="w-full border border-gray-300 rounded px-3 py-2 bg-white focus:ring focus:ring-blue-300">
          </div>
          <div>
            <label class="block text-gray-700 font-medium mb-1">Deskripsi</label>
            <textarea name="deskripsi" rows="3" placeholder="Tulis deskripsi singkat..."
                      class="w-full border border-gray-300 rounded px-3 py-2 bg-white focus:ring focus:ring-blue-300"></textarea>
          </div>
          <div>
            <label class="block text-gray-700 font-medium mb-1">Unggah File (PDF)</label>
            <input type="file" name="file" required accept=".pdf"
                   class="w-full border border-gray-300 rounded px-3 py-2 bg-white focus:ring focus:ring-blue-300">
          </div>
          <div class="text-center">
            <button type="submit" class="bg-blue-700 text-white px-6 py-2 rounded hover:bg-blue-800 transition">
              Upload LKIP
            </button>
          </div>
        </form>
      </section>

      {{-- Daftar LKIP --}}
      <section class="space-y-6" data-aos="fade-up">
        <h2 class="text-2xl font-semibold text-gray-800 text-center">Daftar LKIP</h2>
        @if(count($lkips) > 0)
          <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            @foreach($lkips as $lkip)
              <div class="bg-white rounded-xl shadow-md hover:shadow-lg p-4 flex flex-col transition" data-aos="zoom-in">
                <h3 class="text-lg font-semibold text-gray-800 mb-2 truncate">📄 {{ $lkip->judul }}</h3>
                <p class="text-sm text-gray-600 mb-3 line-clamp-3">{{ $lkip->deskripsi }}</p>

                <div class="h-48 border border-gray-300 mb-3 rounded overflow-hidden bg-gray-50">
                  <iframe src="{{ asset('storage/' . $lkip->file_path) }}#toolbar=0" class="w-full h-full" frameborder="0"></iframe>
                </div>

                <div class="flex justify-between text-sm mt-auto">
                  <a href="{{ asset('storage/' . $lkip->file_path) }}" target="_blank" class="text-blue-600 hover:underline">Lihat</a>
                  <a href="{{ route('admin.lkip.edit', $lkip->id) }}" class="text-yellow-600 hover:underline">Edit</a>
                  <form action="{{ route('admin.lkip.delete', $lkip->id) }}" method="POST" onsubmit="return confirm('Yakin hapus file ini?')" class="inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                  </form>
                </div>
              </div>
            @endforeach
          </div>
        @else
          <p class="text-center text-gray-500 italic mt-6">Tidak ada file LKIP yang tersedia.</p>
        @endif
      </section>
    </main>

    @include('partials.footer')
  </div>

  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>AOS.init({ duration: 800, once: true });</script>
</body>
</html>
