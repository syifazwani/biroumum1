<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Edit Struktur Organisasi - Biro Umum dan ASD</title>
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

    <main class="container mx-auto px-6 py-10 max-w-3xl">
      <h1 class="text-3xl font-bold text-center text-[#0077b6] mb-8" data-aos="fade-down">Update Struktur Organisasi</h1>

      @if(session('success'))
        <div class="bg-green-100 text-green-800 p-3 rounded mb-6 shadow" data-aos="fade-up">
          {{ session('success') }}
        </div>
      @endif

      <form method="POST" action="{{ route('admin.organisasi.upload') }}" enctype="multipart/form-data" 
            class="bg-white p-6 rounded-xl shadow-md space-y-4 hover:shadow-lg transition" data-aos="fade-up">
        @csrf
        <div>
          <label class="block font-medium text-gray-700 mb-1">Pilih File Gambar (jpg, jpeg, png)</label>
          <input type="file" name="image" required 
                 class="w-full border border-gray-300 rounded px-3 py-2 bg-white text-gray-800 focus:ring focus:ring-blue-300 focus:outline-none file:mr-4 file:py-2 file:px-4 file:border-0 file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
        </div>

        <div class="text-center">
          <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition w-full">
            Upload
          </button>
        </div>
      </form>

      @if($image)
        <h2 class="text-lg font-semibold mt-8 text-gray-800 text-center" data-aos="fade-up">Gambar Saat Ini:</h2>
        <img src="{{ asset('storage/' . $image->image_path) }}" 
             class="max-w-full mt-4 mx-auto rounded shadow border border-gray-300 p-2 bg-white" data-aos="zoom-in">
      @endif
    </main>

    @include('partials.footer')
  </div>

  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>AOS.init({ duration: 800, once: true });</script>
</body>
</html>
