<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Konten Balai Kota</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">

  {{-- Navbar --}}
  @include('partials.navbaradmin')

  {{-- Konten --}}
  <main class="flex-grow">
    <div class="min-h-screen py-10 px-4">
      <div class="bg-white/95 rounded-lg p-8 max-w-3xl mx-auto shadow-md">

        {{-- Tombol Kembali --}}
        <a href="/admin/balai">
          <button class="mb-4 px-4 py-2 rounded bg-gray-300 hover:bg-gray-400 text-gray-800 flex items-center gap-2">
            ← Kembali ke Admin Balai
          </button>
        </a>

        {{-- Judul Halaman --}}
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Tambah Konten Balai Kota</h2>

        {{-- Form Tambah Konten --}}
        <form action="/admin/balai" method="POST">
          @csrf

          {{-- Judul --}}
          <div class="mb-4">
            <label for="title" class="block text-gray-800 font-medium mb-1">Judul</label>
            <input type="text" name="title" id="title" placeholder="Judul konten"
              class="w-full px-4 py-2 border border-gray-300 rounded bg-gray-50 text-gray-800 
                     focus:outline-none focus:ring-2 focus:ring-blue-500"
              required>
          </div>

          {{-- Path Gambar --}}
          <div class="mb-4">
            <label for="image" class="block text-gray-800 font-medium mb-1">Path Gambar</label>
            <input type="text" name="image" id="image" placeholder="Contoh: img/nama.jpg"
              class="w-full px-4 py-2 border border-gray-300 rounded bg-gray-50 text-gray-800 
                     focus:outline-none focus:ring-2 focus:ring-blue-500">
          </div>

          {{-- Isi Konten --}}
          <div class="mb-6">
            <label for="content" class="block text-gray-800 font-medium mb-1">Isi Konten</label>
            <textarea name="content" id="content" rows="6" placeholder="Tuliskan isi konten balai kota"
              class="w-full px-4 py-2 border border-gray-300 rounded bg-gray-50 text-gray-800 
                     focus:outline-none focus:ring-2 focus:ring-blue-500"
              required></textarea>
          </div>

          {{-- Tombol Simpan --}}
          <div class="flex justify-start">
            <button type="submit"
              class="bg-green-600 hover:bg-green-700 text-white font-semibold px-6 py-2 rounded shadow transition">
              Simpan
            </button>
          </div>
        </form>

      </div>
    </div>
  </main>

  {{-- Footer --}}
  @include('partials.footer')

  {{-- CKEditor --}}
  <script src="https://cdn.ckeditor.com/4.16.2/full/ckeditor.js"></script>
  <script>
    CKEDITOR.replace('content', {
      filebrowserUploadUrl: "{{ route('ckeditor.upload') }}?_token={{ csrf_token() }}",
      filebrowserUploadMethod: 'form',
      removePlugins: 'image2'
    });
  </script>
</body>
</html>
