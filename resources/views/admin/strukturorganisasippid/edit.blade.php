<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Edit Struktur PPID</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css" />
</head>
<body class="bg-gray-100 text-black flex flex-col min-h-screen font-sans" style="background-image: url('{{ asset('img/batik.jpg') }}'); background-size: cover; background-position: center;">
  <div class="flex flex-col min-h-screen bg-white/95">

    {{-- Navbar --}}
    @include('partials.navbaradmin')

    <main class="container mx-auto px-6 py-10 flex-grow">
        <a href="{{ route('admin.dashboard') }}">
        <button class="mb-6 px-4 py-2 rounded bg-gray-300 hover:bg-gray-400 text-gray-800 flex items-center gap-2">
          ← Kembali ke Admin
        </button>
      </a>

      <a href="{{ url('admin/strukturorganisasippid') }}">
        <button class="mb-6 px-4 py-2 rounded bg-gray-300 hover:bg-gray-400 text-gray-800 flex items-center gap-2">
          ← Kembali ke Struktur Organisasi
        </button>
      </a>

      <h2 class="text-3xl font-bold text-[#0077b6] mb-6 text-center">Edit Struktur Organisasi PPID</h2>

      @if ($errors->any())
      <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6 animate-fade-in">
        <ul class="list-disc list-inside">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif

      <form action="{{ url('admin/strukturorganisasippid/update/' . $struktur->id) }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-xl shadow-lg space-y-6" data-aos="fade-up">
        @csrf

        <div>
          <label class="block font-medium mb-1 text-gray-700">Nama File</label>
          <input type="text" name="nama_file" value="{{ old('nama_file', $struktur->nama_file) }}" required
                 class="w-full border border-gray-300 rounded px-4 py-2 text-gray-800 focus:ring focus:ring-blue-300" />
        </div>

        <div>
          <p class="mb-2 font-semibold text-gray-700">Gambar Saat Ini:</p>
          <img src="{{ asset('storage/' . $struktur->path) }}" alt="{{ $struktur->nama_file }}" class="max-h-48 rounded shadow" />
        </div>

        <div>
          <label class="block font-medium mb-1 text-gray-700">Ganti Gambar (opsional)</label>
          <input type="file" name="file" accept=".jpg,.jpeg,.png"
                 class="text-gray-700 file:mr-4 file:py-2 file:px-4 file:border-0 
                        file:text-sm file:font-semibold file:bg-blue-50 
                        file:text-blue-700 hover:file:bg-blue-100" />
        </div>

        <div class="flex items-center justify-between">
          <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700 transition">
            Simpan Perubahan
          </button>
          <a href="{{ url('admin/strukturorganisasippid') }}" class="text-blue-600 hover:underline">Batal</a>
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
