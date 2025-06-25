<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Dasar Hukum - Biro Umum dan ASD</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>
<body class="bg-gray-100 text-black flex flex-col min-h-screen" style="background-image: url('{{ asset('img/batik.jpg') }}'); background-size: cover; background-position: center;">
  <div class="flex flex-col min-h-screen bg-white/95">

    @include('partials.navbaradmin')

    <main class="container mx-auto px-6 py-10 max-w-6xl">

      <a href="{{ route('admin.dashboard') }}">
        <button class="mb-6 px-4 py-2 rounded bg-gray-300 hover:bg-gray-400 text-gray-800 flex items-center gap-2 transition">
          ← Kembali ke Admin
        </button>
      </a>

      <h1 class="text-4xl font-bold text-center text-[#0077b6] mb-10" data-aos="fade-down">Manajemen Dasar Hukum</h1>

      @if(session('success'))
      <div class="mb-6 p-3 bg-green-200 text-green-800 rounded shadow text-center" data-aos="fade-up">
        {{ session('success') }}
      </div>
      @endif

      {{-- Form Upload Baru --}}
      <section class="mb-10 p-6 border rounded-xl shadow bg-white" data-aos="fade-up">
        <h2 class="text-2xl font-semibold text-gray-700 mb-4">Upload Dasar Hukum Baru</h2>
        <form action="{{ url('admin/dasarhukum/upload') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
          @csrf
          <div>
            <label for="nama_file" class="block font-semibold text-gray-700 mb-1">Nama File</label>
            <input type="text" name="nama_file" id="nama_file" class="w-full border border-gray-300 rounded p-2" required value="{{ old('nama_file') }}">
            @error('nama_file') <p class="text-red-600 mt-1">{{ $message }}</p> @enderror
          </div>
          <div>
            <label for="file" class="block font-semibold text-gray-700 mb-1">Pilih File PDF</label>
            <input type="file" name="file" id="file" accept="application/pdf" required class="block text-gray-800">
            @error('file') <p class="text-red-600 mt-1">{{ $message }}</p> @enderror
          </div>
          <button type="submit" class="bg-blue-700 text-white px-6 py-2 rounded hover:bg-blue-800 transition">Upload</button>
        </form>
      </section>

      {{-- Daftar Dasar Hukum --}}
      <section class="space-y-8" data-aos="fade-up">
        @foreach($dasarHukum as $item)
        <div class="p-6 border rounded-xl shadow bg-white space-y-4 hover:shadow-lg transition">
          <div>
            <h3 class="text-lg font-semibold text-gray-800 mb-1">📄 {{ $item->nama_file }}</h3>
            <iframe src="{{ asset('storage/' . $item->path) }}#toolbar=0" class="w-full h-[400px] border rounded" frameborder="0"></iframe>
            @if($item->path)
              <a href="{{ Storage::url($item->path) }}" target="_blank" class="text-blue-600 underline mt-2 inline-block hover:text-blue-800 transition">Lihat File PDF</a>
            @endif
          </div>

          <div class="flex flex-col sm:flex-row gap-4">
            {{-- Form Update --}}
            <form action="{{ url('admin/dasarhukum/update/' . $item->id) }}" method="POST" enctype="multipart/form-data" class="flex-1 space-y-4">
              @csrf
              <div>
                <label class="block font-semibold text-gray-700 mb-1">Edit Nama File</label>
                <input type="text" name="nama_file" value="{{ old('nama_file', $item->nama_file) }}" class="w-full border border-gray-300 rounded p-2 focus:ring-2 focus:ring-yellow-400" required>
              </div>
              <div>
                <label class="block font-semibold text-gray-700 mb-1">Ganti File (Opsional)</label>
                <input type="file" name="file" accept="application/pdf" class="block text-gray-800">
              </div>
              <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600 transition">Update</button>
            </form>

            {{-- Form Hapus --}}
            <form action="{{ url('admin/dasarhukum/delete/' . $item->id) }}" method="POST" class="flex items-start">
              @csrf
              @method('DELETE')
              <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 transition">Hapus</button>
            </form>
          </div>
        </div>
        @endforeach
      </section>
    </main>

    @include('partials.footer')
  </div>

  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>AOS.init({ duration: 800, once: true });</script>
</body>
</html>
