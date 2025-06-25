<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah File Tugas dan Fungsi</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>
<body class="bg-gray-100 text-black flex flex-col min-h-screen" style="background-image: url('{{ asset('img/batik.jpg') }}'); background-size: cover; background-position: center;">
  <div class="flex flex-col min-h-screen bg-white/95">

    @include('partials.navbaradmin')

    <main class="container mx-auto px-6 py-10 max-w-2xl">
      <a href="{{ route('tugasfungsi.index') }}">
        <button class="px-4 py-2 rounded bg-gray-300 hover:bg-gray-400 text-gray-800 flex items-center gap-2 transition">
          ← Kembali
        </button>
      </a>

      <h1 class="text-3xl font-bold text-center text-[#0077b6] my-6" data-aos="fade-down">Tambah File Tugas dan Fungsi</h1>

      @if ($errors->any())
        <div class="bg-red-100 text-red-800 border border-red-300 p-4 rounded mb-6" data-aos="fade-up">
          <ul class="list-disc list-inside">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <form action="{{ route('tugasfungsi.store') }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-xl shadow-lg p-6 space-y-4 hover:shadow-xl transition-all duration-300" data-aos="fade-up">
        @csrf

        <div>
          <label class="block text-gray-700 font-semibold mb-1">Nama File</label>
          <input type="text" name="nama_file" required
                 class="w-full border border-gray-300 rounded px-3 py-2 bg-white focus:ring focus:ring-blue-300 focus:outline-none">
        </div>

        <div>
          <label class="block text-gray-700 font-semibold mb-1">Upload File (PDF / Gambar)</label>
          <input type="file" name="file" accept=".pdf,.jpg,.jpeg,.png,.webp" required
                 class="w-full border border-gray-300 rounded px-3 py-2 bg-white focus:ring focus:ring-blue-300 focus:outline-none">
        </div>

        <div class="text-center">
          <button type="submit" class="bg-blue-700 text-white px-6 py-2 rounded hover:bg-blue-800 transition">
            Simpan
          </button>
        </div>
      </form>
    </main>

    @include('partials.footer')
  </div>

  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>AOS.init({ duration: 800, once: true });</script>
</body>
</html>
