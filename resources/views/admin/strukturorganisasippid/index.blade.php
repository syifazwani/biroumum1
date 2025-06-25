<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Struktur Organisasi PPID - Admin</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css" />
</head>
<body class="bg-gray-100 text-black flex flex-col min-h-screen font-sans" style="background-image: url('{{ asset('img/batik.jpg') }}'); background-size: cover; background-position: center;">
  <div class="flex flex-col min-h-screen bg-white/95">

    {{-- Navbar --}}
    @include('partials.navbaradmin')

    {{-- Konten Utama --}}
    <main class="container mx-auto px-6 py-10 flex-grow">
      <a href="{{ route('admin.dashboard') }}">
        <button class="mb-6 px-4 py-2 rounded bg-gray-300 hover:bg-gray-400 text-gray-800 flex items-center gap-2">
          ← Kembali ke Admin
        </button>
      </a>

      <h2 class="text-3xl font-bold text-[#0077b6] mb-8 text-center animate-pulse">Kelola Struktur Organisasi PPID</h2>

      {{-- Pesan Sukses --}}
      @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4 animate-fade-in">
          {{ session('success') }}
        </div>
      @endif

      {{-- Pesan Error --}}
      @if(session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4 animate-fade-in">
          {{ session('error') }}
        </div>
      @endif

      {{-- Form Upload --}}
      <section class="bg-white p-6 rounded-2xl shadow-md mb-10" data-aos="fade-up">
        <form action="{{ url('admin/strukturorganisasippid/upload') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
          @csrf
          <div>
            <label class="block font-medium mb-1 text-gray-700">Nama File</label>
            <input type="text" name="nama_file" value="{{ old('nama_file') }}" required
                   class="w-full border border-gray-300 rounded px-4 py-2 focus:ring focus:ring-blue-300 text-gray-800 bg-white" />
            @error('nama_file')
              <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
          </div>

          <div>
            <label class="block font-medium mb-1 text-gray-700">Pilih File Gambar (jpg, jpeg, png)</label>
            <input type="file" name="file" accept=".jpg,.jpeg,.png" required 
                   class="text-gray-700 file:mr-4 file:py-2 file:px-4 file:border-0 
                          file:text-sm file:font-semibold file:bg-blue-50 
                          file:text-blue-700 hover:file:bg-blue-100" />
            @error('file')
              <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
          </div>

          <div class="text-center">
            <button type="submit" class="bg-[#0077b6] text-white px-6 py-2 rounded hover:bg-[#005f87] transition">
              Upload
            </button>
          </div>
        </form>
      </section>

      {{-- Daftar Struktur --}}
      <section class="bg-white p-6 rounded-2xl shadow-md" data-aos="fade-up">
        @if($strukturList->count() > 0)
        <div class="overflow-x-auto">
          <table class="w-full border-collapse border border-gray-300 bg-white text-gray-800">
            <thead>
              <tr class="bg-gray-100 text-gray-700">
                <th class="border border-gray-300 px-4 py-2">No</th>
                <th class="border border-gray-300 px-4 py-2">Nama File</th>
                <th class="border border-gray-300 px-4 py-2">Gambar</th>
                <th class="border border-gray-300 px-4 py-2">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach($strukturList as $index => $item)
              <tr class="hover:bg-gray-50 transition duration-200">
                <td class="border border-gray-300 px-4 py-2 text-center">{{ $index + 1 }}</td>
                <td class="border border-gray-300 px-4 py-2 text-center font-semibold break-words">{{ $item->nama_file }}</td>
                <td class="border border-gray-300 px-4 py-2 text-center">
                  <img src="{{ asset('storage/' . $item->path) }}" alt="{{ $item->nama_file }}" class="max-h-24 mx-auto rounded shadow">
                </td>
                <td class="border border-gray-300 px-4 py-2 text-center space-y-2">
                  <a href="{{ url('admin/strukturorganisasippid/edit/' . $item->id) }}"
                     class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded inline-block transition">
                    Edit
                  </a>
                  <form action="{{ url('admin/strukturorganisasippid/delete/' . $item->id) }}" method="POST" class="inline-block"
                        onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded transition">
                      Hapus
                    </button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        @else
        <p class="text-center text-gray-500 italic">Belum ada data struktur yang diunggah.</p>
        @endif
      </section>
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
