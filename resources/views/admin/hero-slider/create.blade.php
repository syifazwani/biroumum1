<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Tambah Slider - Biro Umum DKI Jakarta</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">
</head>
<body class="bg-gray-100 font-sans" style="background-image: url('{{ asset('img/batik.jpg') }}'); background-size: cover; background-position: center;">
  <div class="min-h-screen flex flex-col bg-white/95">

    @include('partials.navbaradmin')

    <main class="flex-grow container mx-auto px-4 py-10">
      <div class="max-w-xl mx-auto bg-white rounded-lg shadow-lg p-6" data-aos="fade-up">

        {{-- Tombol Kembali --}}
        <div class="mb-4">
            <a href="{{ route('admin.dashboard') }}">
          <button class="px-4 py-2 rounded bg-gray-300 hover:bg-gray-400 text-gray-800 flex items-center gap-2 transition">
            ← Kembali ke Admin
          </button>
        </a>
            
          <a href="{{ route('hero-slider.index') }}">
          <button class="px-4 mt-1.5 py-2 rounded bg-gray-300 hover:bg-gray-400 text-gray-800 flex items-center gap-2 transition">
            ← Kembali ke Admin Slider
          </button>
        </a>

        {{-- Judul --}}
        <h1 class="text-2xl font-bold text-center text-gray-800 mb-6 border-b pb-2">Tambah Gambar Slider</h1>

        {{-- Form Upload --}}
        <form action="{{ route('hero-slider.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf

            {{-- Upload gambar --}}
            <div>
                <label for="image_path" class="block text-sm font-medium text-gray-700 mb-1">Upload Gambar</label>
                <input type="file" name="image_path" id="image_path" accept="image/*" required
                       class="w-full border border-gray-300 p-3 rounded bg-gray-50 text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500" />
            </div>

            {{-- Tombol Simpan --}}
            <div class="text-right">
                <button type="submit"
                        class="bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-6 rounded shadow-md transition">
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
