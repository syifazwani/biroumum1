<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Manajemen Laporan Keuangan - Biro Umum dan ASD DKI Jakarta</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>
<body class="bg-gray-100 text-black flex flex-col min-h-screen" style="background-image: url('{{ asset('img/batik.jpg') }}'); background-size: cover; background-position: center;">
  <div class="flex flex-col min-h-screen bg-white/95">
    
    @include('partials.navbaradmin')

    <a href="{{ route('admin.dashboard') }}">
      <button class="mt-4 ml-4 px-4 py-2 rounded bg-gray-300 hover:bg-gray-400 text-gray-800 flex items-center gap-2">
        ← Kembali ke Admin
      </button>
    </a>

    <main class="container mx-auto px-6 py-10 space-y-10">
      <h1 class="text-4xl font-bold text-center text-[#0077b6]" data-aos="fade-down">Manajemen Laporan Keuangan</h1>

      {{-- Pesan Sukses --}}
      @if(session('success'))
      <div class="bg-green-100 border border-green-400 text-green-800 p-3 rounded shadow text-center" data-aos="fade-up">
        {{ session('success') }}
      </div>
      @endif

      {{-- Form Upload --}}
      <section class="bg-white p-6 rounded-xl shadow-md space-y-4" data-aos="fade-up">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Upload Laporan Keuangan</h2>
        <form action="{{ route('admin.laporan_keuangan.upload') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
          @csrf
          <div>
            <label class="block mb-1 text-gray-700 font-medium">Judul</label>
            <input type="text" name="judul" required placeholder="Masukkan Judul"
                   class="w-full border border-gray-300 rounded px-3 py-2 bg-white focus:ring focus:ring-blue-300">
          </div>
          <div>
            <label class="block mb-1 text-gray-700 font-medium">Deskripsi</label>
            <textarea name="deskripsi" rows="3" placeholder="Tulis deskripsi singkat..."
                      class="w-full border border-gray-300 rounded px-3 py-2 bg-white focus:ring focus:ring-blue-300"></textarea>
          </div>
          <div>
            <label class="block mb-1 text-gray-700 font-medium">Unggah File (PDF)</label>
            <input type="file" name="file" required accept=".pdf"
                   class="w-full border border-gray-300 rounded px-3 py-2 bg-white focus:ring focus:ring-blue-300">
          </div>
          <div class="text-center">
            <button type="submit" class="bg-blue-700 text-white px-6 py-2 rounded hover:bg-blue-800 transition">
              Upload Laporan
            </button>
          </div>
        </form>
      </section>

      {{-- Daftar Tabel --}}
      <section class="overflow-x-auto" data-aos="fade-up">
        <h2 class="text-2xl font-semibold text-gray-800 text-center mb-4">Daftar Laporan</h2>
        <table class="min-w-full table-auto border border-gray-300 rounded shadow-sm bg-white">
          <thead class="bg-gray-200 text-gray-700">
            <tr>
              <th class="p-3 border text-left">Judul</th>
              <th class="p-3 border text-left">Deskripsi</th>
              <th class="p-3 border text-center">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @forelse($laporans as $laporan)
              <tr class="hover:bg-gray-50 transition">
                <td class="p-3 border align-top">{{ $laporan->judul }}</td>
                <td class="p-3 border align-top">{{ $laporan->deskripsi }}</td>
                <td class="p-3 border text-center space-x-2">
                  <a href="{{ asset('storage/' . $laporan->file_path) }}" target="_blank" class="text-blue-600 hover:underline">Lihat</a>
                  <a href="{{ route('admin.laporan_keuangan.edit', $laporan->id) }}" class="text-yellow-600 hover:underline">Edit</a>
                  <form action="{{ route('admin.laporan_keuangan.delete', $laporan->id) }}" method="POST"
                        class="inline-block" onsubmit="return confirm('Yakin hapus?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                  </form>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="3" class="text-center text-gray-500 italic p-4">Tidak ada data laporan keuangan.</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </section>
    </main>

    @include('partials.footer')
  </div>

  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>AOS.init({ duration: 800, once: true });</script>
</body>
</html>
