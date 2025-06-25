<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Foto - Admin</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">

  {{-- Navbar Admin --}}
  @include('partials.navbaradmin')

  <main class="container mx-auto p-6 flex-grow">
    <div class="max-w-xl mx-auto bg-white p-6 rounded-lg shadow-lg mt-4">

      <!-- Tombol Kembali -->
      <div class="mb-4">
        <a href="{{ route('foto.index') }}" class="inline-flex items-center gap-2 px-4 py-2 bg-gray-300 text-gray-800 hover:bg-gray-400 rounded-lg transition">
          ← Kembali ke Daftar Foto
        </a>
      </div>

      <!-- Judul Halaman -->
      <h1 class="text-2xl font-bold text-center text-gray-800 mb-6">Tambah Foto</h1>

      <!-- Tampilkan Error Validasi -->
      @if ($errors->any())
        <div class="mb-4 p-4 bg-red-100 border border-red-400 rounded text-red-700">
          <ul class="list-disc list-inside">
            @foreach ($errors->all() as $err)
              <li>{{ $err }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <!-- Form -->
      <form action="{{ route('foto.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Pilih Album -->
        <div class="mb-4">
          <label for="album_id" class="block font-medium text-gray-700 mb-1">Album</label>
          <select name="album_id" id="album_id" required
                  class="w-full px-4 py-2 border border-gray-300 rounded bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500">
            <option value="">-- Pilih Album --</option>
            @foreach($albums as $album)
              <option value="{{ $album->id }}" {{ old('album_id') == $album->id ? 'selected' : '' }}>
                {{ $album->title }}
              </option>
            @endforeach
          </select>
        </div>

        <!-- Upload Foto -->
        <div class="mb-6">
          <label for="file" class="block font-medium text-gray-700 mb-1">Foto</label>
          <input type="file" name="file" id="file" required
                 class="w-full px-4 py-2 border border-gray-300 rounded bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <!-- Tombol Simpan -->
        <div class="flex justify-end">
          <button type="submit"
                  class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded shadow transition">
            Simpan
          </button>
        </div>
      </form>

    </div>
  </main>

 @include('partials.footer')

</body>
</html>
