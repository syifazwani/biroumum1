<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Tambah Video</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">
</head>
<body class="bg-gray-100 text-black font-sans" style="background-image: url('{{ asset('img/batik.jpg') }}'); background-size: cover; background-position: center;">
  <div class="min-h-screen flex flex-col bg-white/95">

    @include('partials.navbaradmin')

    <main class="flex-grow container mx-auto px-4 py-10">
        <a href="{{ route('admin.dashboard') }}">
          <button class="px-4 py-2 rounded bg-gray-300 hover:bg-gray-400 text-gray-800 flex items-center gap-2 transition">
            ← Kembali ke Admin
          </button>
        </a>
      <div class="max-w-2xl mx-auto bg-white p-8 rounded-xl shadow-lg" data-aos="fade-up">
        <h1 class="text-2xl font-bold text-center text-blue-700 mb-6">Tambah Video</h1>

        {{-- Validasi Error --}}
        @if ($errors->any())
          <div class="mb-4 p-4 bg-red-100 text-red-700 border border-red-300 rounded">
            <ul class="list-disc list-inside text-sm">
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        <form action="{{ route('videos.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
          @csrf

          <div>
            <label for="title" class="block font-medium text-gray-700 mb-1">Judul Video</label>
            <input type="text" name="title" id="title" required
                   class="w-full border border-gray-300 p-3 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 text-gray-800" />
          </div>

          <div>
            <label for="video_file" class="block font-medium text-gray-700 mb-1">Upload Video</label>
            <input type="file" name="video_file" id="video_file" accept="video/*"
                   class="w-full border border-gray-300 p-3 rounded cursor-pointer bg-white text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500" />
          </div>

          <div>
            <label for="description" class="block font-medium text-gray-700 mb-1">Deskripsi</label>
            <textarea name="description" id="description" rows="4"
                      class="w-full border border-gray-300 p-3 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 text-gray-800"></textarea>
          </div>

          <div class="flex justify-end">
            <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-3 rounded shadow-md transition transform hover:scale-105">
              Simpan
            </button>
          </div>
        </form>
      </div>
    </main>

    @include('partials.footer')

  </div>

  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init({ duration: 800, once: true });
  </script>
</body>
</html>
