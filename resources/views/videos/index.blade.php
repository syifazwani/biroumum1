<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Daftar Video</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">
</head>
<body class="bg-gray-100 text-black font-sans" style="background-image: url('{{ asset('img/batik.jpg') }}'); background-size: cover; background-position: center;">
  <div class="flex flex-col min-h-screen bg-white/95">

    {{-- Navbar --}}
    @include('partials.navbaradmin')

    <main class="flex-grow container mx-auto px-4 py-10">
      <h1 class="text-3xl font-bold mb-6 text-center text-gray-800">Daftar Video</h1>

      {{-- Tombol Aksi --}}
      <div class="mb-6 flex justify-between items-center">
        <a href="{{ route('admin.dashboard') }}">
          <button class="px-4 py-2 rounded bg-gray-300 hover:bg-gray-400 text-gray-800 flex items-center gap-2 transition">
            ← Kembali ke Admin
          </button>
        </a>
        <a href="{{ route('videos.create') }}">
          <button class="px-4 py-2 rounded bg-blue-600 hover:bg-blue-700 text-white transition">
            Tambah Video
          </button>
        </a>
      </div>

      {{-- Flash Messages --}}
      @if(session('success'))
        <div class="mb-4 p-3 bg-green-200 text-green-800 rounded shadow">{{ session('success') }}</div>
      @endif
      @if(session('error'))
        <div class="mb-4 p-3 bg-red-200 text-red-800 rounded shadow">{{ session('error') }}</div>
      @endif

      {{-- Tabel Video --}}
      <div class="overflow-x-auto bg-white rounded-xl shadow-lg p-4" data-aos="fade-up">
        <table class="min-w-full text-gray-800 border border-gray-300 text-sm">
          <thead class="bg-gray-100">
            <tr>
              <th class="p-3 border text-left">ID</th>
              <th class="p-3 border text-left">Judul</th>
              <th class="p-3 border text-left">URL Video</th>
              <th class="p-3 border text-left">Deskripsi</th>
              <th class="p-3 border text-left">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($videos as $video)
              <tr class="hover:bg-gray-50 transition">
                <td class="p-3 border">{{ $video->id }}</td>
                <td class="p-3 border font-semibold">{{ $video->title }}</td>
                <td class="p-3 border">
                  <a href="{{ $video->video_url }}" target="_blank" class="text-blue-600 underline break-all">{{ $video->video_url }}</a>
                </td>
                <td class="p-3 border">{{ $video->description }}</td>
                <td class="p-3 border space-y-2">
                  <a href="{{ route('videos.edit', $video->id) }}" class="inline-block bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600 transition">
                    Edit
                  </a>
                  <form action="{{ route('videos.destroy', $video->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus video ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700 transition">
                      Hapus
                    </button>
                  </form>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="5" class="p-4 text-center text-gray-500 italic">Belum ada video ditambahkan.</td>
              </tr>
            @endforelse
          </tbody>
        </table>
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
