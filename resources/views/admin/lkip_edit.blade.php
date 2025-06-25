<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit LKIP - Biro Umum dan ASD DKI Jakarta</title>
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
    
    <a href="{{ route('admin.lkip') }}">
      <button class="mt-4 ml-4 px-4 py-2 rounded bg-gray-300 hover:bg-gray-400 text-gray-800 flex items-center gap-2">
        ← Kembali ke Admin LKIP
      </button>
    </a>

    <main class="container mx-auto px-6 py-10">
      <h1 class="text-4xl font-bold text-center text-[#0077b6] mb-10" data-aos="fade-down">Edit LKIP</h1>

      <form action="{{ route('admin.lkip.update', $lkip->id) }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-xl shadow space-y-6 max-w-2xl mx-auto" data-aos="fade-up">
        @csrf

        <div>
          <label class="block text-gray-700 font-medium mb-1">Judul</label>
          <input type="text" name="judul" required value="{{ $lkip->judul }}"
                 class="w-full border border-gray-300 rounded px-3 py-2 bg-white focus:ring focus:ring-blue-300 focus:outline-none">
        </div>

        <div>
          <label class="block text-gray-700 font-medium mb-1">Deskripsi</label>
          <textarea name="deskripsi" rows="3" class="w-full border border-gray-300 rounded px-3 py-2 bg-white focus:ring focus:ring-blue-300 focus:outline-none">{{ $lkip->deskripsi }}</textarea>
        </div>

        @if ($lkip->file_path)
          <p class="text-sm text-gray-600">
            File Saat Ini: 
            <a href="{{ asset('storage/' . $lkip->file_path) }}" target="_blank" class="text-blue-600 underline">
              {{ basename($lkip->file_path) }}
            </a>
          </p>
        @endif

        <div>
          <label class="block text-gray-700 font-medium mb-1">Ganti File (Opsional)</label>
          <input type="file" name="file" accept=".pdf"
                 class="w-full border border-gray-300 rounded px-3 py-2 bg-white focus:ring focus:ring-blue-300 focus:outline-none">
        </div>

        <div class="text-center">
          <button type="submit" class="bg-yellow-600 text-white px-6 py-2 rounded hover:bg-yellow-700 transition">
            Update
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
