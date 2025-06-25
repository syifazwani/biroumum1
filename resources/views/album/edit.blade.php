<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Edit Album</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css" />
</head>
<body class="bg-gray-100 text-black flex flex-col min-h-screen font-sans" style="background-image: url('{{ asset('img/batik.jpg') }}'); background-size: cover; background-position: center;">
  <div class="flex flex-col min-h-screen bg-white/95">

    {{-- Navbar --}}
    @include('partials.navbaradmin')

    <main class="container mx-auto px-6 py-10 flex-grow">
        <a href="{{ route('admin.dashboard') }}">
          <button class="px-4 py-2 rounded bg-gray-300 hover:bg-gray-400 text-gray-800 flex items-center gap-2 transition">
            ← Kembali ke Admin
          </button>
        </a>

      <a href="{{ route('album.index') }}">
        <button class="mb-6 px-4 py-2 rounded bg-gray-300 hover:bg-gray-400 text-gray-800 flex items-center gap-2 transition">
          ← Kembali ke Album
        </button>
      </a>

      <h2 class="text-3xl font-bold text-[#0077b6] mb-6 text-center">Edit Album</h2>

      <form action="{{ route('album.update', $album) }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-xl shadow-lg space-y-6 max-w-2xl mx-auto" data-aos="fade-up">
        @csrf
        @method('PUT')

        <div>
          <label for="title" class="block text-gray-700 font-medium mb-1">Judul Album</label>
          <input type="text" name="title" value="{{ old('title', $album->title) }}" required
                 class="w-full border border-gray-300 rounded px-4 py-2 text-gray-800 focus:ring focus:ring-blue-300" />
        </div>

        <div>
          <p class="mb-2 font-semibold text-gray-700">Cover Saat Ini:</p>
          <img src="{{ asset('storage/' . $album->cover_image) }}" alt="Cover Album" class="w-full max-h-60 object-cover rounded shadow">
        </div>

        <div>
          <label for="cover_image" class="block text-gray-700 font-medium mb-1">Ganti Cover (Opsional)</label>
          <input type="file" name="cover_image" accept="image/*"
                 class="text-gray-700 file:mr-4 file:py-2 file:px-4 file:border-0 
                        file:text-sm file:font-semibold file:bg-blue-50 
                        file:text-blue-700 hover:file:bg-blue-100" />
        </div>

        <div class="flex justify-center">
          <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded transition">
            Simpan Perubahan
          </button>
        </div>
      </form>
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
