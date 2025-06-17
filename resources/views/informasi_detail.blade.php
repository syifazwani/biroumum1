<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Informasi Balai</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">

    <!-- Navbar -->
    @include('partials.navbar')

    <!-- Main Content -->
    <main class="flex-grow py-10 px-4 bg-gray-100">
        <div class="bg-white/95 rounded-lg p-8 max-w-3xl mx-auto shadow-md">
            <!-- Judul -->
            <h1 class="text-3xl font-bold text-gray-800 mb-4">{{ $item->title }}</h1>

            <!-- Konten -->
            <div class="prose max-w-none text-gray-800 mb-6">
                {!! $item->content !!}
            </div>

            <!-- Tombol Kembali -->
            <a href="{{ url('/informasi-balai') }}"
               class="inline-block bg-blue-600 text-white px-5 py-2 rounded hover:bg-blue-700 transition">
                ← Kembali ke Daftar Informasi
            </a>
        </div>
    </main>

    <!-- Footer -->
  @include('partials.footer')

</body>
</html>
