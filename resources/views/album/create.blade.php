<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Tambah Album</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css" />
</head>
<body class="bg-gray-100 text-black flex flex-col min-h-screen font-sans" style="background-image: url('{{ asset('img/batik.jpg') }}'); background-size: cover; background-position: center;">
  <div class="flex flex-col min-h-screen bg-white/95">

    {{-- Navbar --}}
    @include('partials.navbaradmin')

    <main class="flex-grow flex items-center justify-center py-12 px-4">
        
      <div class="bg-white p-8 rounded-xl shadow-lg w-full max-w-md border border-gray-200" data-aos="zoom-in">
        <h2 class="text-2xl font-bold text-center text-[#0077b6] mb-6">Tambah Album</h2>
<a href="{{ route('admin.dashboard') }}">
          <button class="px-4 py-2 rounded bg-gray-300 hover:bg-gray-400 text-gray-800 flex items-center gap-2 transition">
            ← Kembali ke Admin
          </button>
        </a>
        <form action="{{ route('album.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
          @csrf

          <!-- Judul Album -->
          <div>
            <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Judul Album</label>
            <input type="text" name="title" id="title" placeholder="Masukkan Judul Album"
                   class="w-full border border-gray-300 p-3 rounded text-gray-900 placeholder-gray-400 
                          focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition" required>
          </div>

          <!-- Cover Image -->
          <div>
            <label for="cover_image" class="block text-sm font-medium text-gray-700 mb-1">Cover Album</label>
            <input type="file" name="cover_image" id="cover_image" accept="image/*"
                   class="w-full border border-gray-300 p-3 rounded text-gray-900 bg-white cursor-pointer 
                          focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition" required>
          </div>

          <!-- Tombol Simpan -->
          <div class="flex justify-center">
            <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-3 rounded-lg shadow-md transition transform hover:scale-105">
              Simpan Album
            </button>
          </div>
        </form>
      </div>
    </main>

    {{-- Footer --}}
    @include('partials.footer')

  </div>

  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init({ duration: 800, once: true });
  </script>
</body>
</html>
