<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Foto - Admin</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">

  {{-- Navbar --}}
  @include('partials.navbaradmin')

  <main class="container mx-auto p-6 flex-grow">
    <div class="max-w-xl mx-auto bg-white p-6 rounded-lg shadow-lg mt-4">

      <!-- Tombol Kembali -->
      <div class="mb-4">
        <a href="{{ route('foto.index') }}" class="inline-flex items-center gap-2 px-4 py-2 bg-gray-300 text-gray-800 hover:bg-gray-400 rounded-lg transition">
          ← Kembali ke Daftar Foto
        </a>
      </div>

      <!-- Judul -->
      <h1 class="text-2xl font-bold text-center text-gray-800 mb-6">Edit Foto</h1>

      <!-- Validasi Error -->
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
      <form action="{{ route('admin.foto.update', $foto->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Pilih Album -->
        <div class="mb-4">
          <label for="album_id" class="block font-medium text-gray-700 mb-1">Album</label>
          <select name="album_id" id="album_id" required
                  class="w-full px-4 py-2 border border-gray-300 rounded bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500">
            <option value="">-- Pilih Album --</option>
            @foreach($albums as $album)
              <option value="{{ $album->id }}" {{ $foto->album_id == $album->id ? 'selected' : '' }}>
                {{ $album->title }}
              </option>
            @endforeach
          </select>
        </div>

        <!-- Foto Saat Ini -->
        <div class="mb-4">
          <label class="block font-medium text-gray-700 mb-1">Foto Saat Ini</label>
          <img src="{{ asset('storage/' . $foto->image_path) }}" alt="Foto" class="w-32 h-32 object-cover rounded shadow">
        </div>

        <!-- Upload Baru (Opsional) -->
        <div class="mb-6">
          <label for="file" class="block font-medium text-gray-700 mb-1">Ganti Foto (opsional)</label>
          <input type="file" name="file" id="file"
                 class="w-full px-4 py-2 border border-gray-300 rounded bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <!-- Tombol Aksi -->
        <div class="flex justify-end gap-3">
          <button type="submit"
                  class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded shadow transition">
            Update
          </button>
          <a href="{{ route('foto.index') }}"
             class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold px-6 py-2 rounded shadow transition">
            Batal
          </a>
        </div>
      </form>

    </div>
  </main>

  <!-- Footer -->
  @include('partials.footer')
  
</body>
</html>
