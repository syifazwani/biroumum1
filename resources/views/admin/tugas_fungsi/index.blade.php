<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Manajemen Tugas dan Fungsi - Biro Umum dan ASD</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>
<body class="bg-gray-100 text-black flex flex-col min-h-screen" style="background-image: url('{{ asset('img/batik.jpg') }}'); background-size: cover; background-position: center;">
  <div class="flex flex-col min-h-screen bg-white/95">

    @include('partials.navbaradmin')

    <main class="container mx-auto px-6 py-10 max-w-5xl space-y-6">
      <a href="{{ route('admin.dashboard') }}">
        <button class="px-4 py-2 rounded bg-gray-300 hover:bg-gray-400 text-gray-800 flex items-center gap-2 transition">
          ← Kembali ke Admin
        </button>
      </a>

      <h1 class="text-4xl font-bold text-center text-[#0077b6]" data-aos="fade-down">Manajemen Tugas dan Fungsi</h1>

      <div class="text-center">
        <a href="{{ route('tugasfungsi.create') }}" class="inline-block bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700 transition" data-aos="fade-up">+ Tambah File</a>
      </div>

      @if(session('success'))
      <div class="bg-green-100 border border-green-400 text-green-800 p-3 rounded text-center" data-aos="fade-up">
        {{ session('success') }}
      </div>
      @endif

      <section class="space-y-4" data-aos="fade-up">
        @forelse($tugas_fungsi as $item)
        <div class="bg-white p-4 rounded-xl shadow-md flex justify-between items-center hover:shadow-lg transition">
          <div>
            <p class="font-semibold text-gray-800">{{ $item->nama_file }}</p>
            <a href="{{ Storage::url($item->path) }}" target="_blank" class="text-blue-600 hover:underline text-sm">Download</a>
          </div>
          <form action="{{ route('tugasfungsi.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus file ini?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-red-600 hover:underline text-sm">Hapus</button>
          </form>
        </div>
        @empty
        <p class="text-center text-gray-500 italic">Tidak ada file Tugas dan Fungsi.</p>
        @endforelse
      </section>
    </main>

    @include('partials.footer')
  </div>

  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>AOS.init({ duration: 800, once: true });</script>
</body>
</html>
