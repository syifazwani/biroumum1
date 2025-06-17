<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tambah Album</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">

    @include('partials.navbaradmin')

    <!-- Content -->
    <main class="container mx-auto p-6 flex-grow">
        <div class="max-w-3xl mx-auto p-6 rounded-xl shadow-lg bg-white mt-4">
            <a href="{{ route('album.index') }}">
                    <button class="px-4 py-2 rounded bg-gray-300 hover:bg-gray-400 text-gray-800 flex items-center gap-2 transition">
                        ← Kembali ke Dashboard Album
                    </button>
                </a>
            <h1 class="text-3xl font-bold mb-8 text-center text-blue-700">Tambah Album</h1>

            <form action="{{ route('album.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
                @csrf

                <!-- Judul Album -->
                <div>
                    <label for="title" class="block text-gray-700 font-semibold mb-2">Judul Album</label>
                    <input type="text" name="title" id="title" placeholder="Masukkan Judul Album"
                           class="w-full border border-gray-300 p-3 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition" required>
                </div>

                <!-- Cover Image -->
                <div>
                    <label for="cover_image" class="block text-gray-700 font-semibold mb-2">Cover Album</label>
                    <input type="file" name="cover_image" id="cover_image"
                           class="w-full border border-gray-300 p-3 rounded bg-white cursor-pointer focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition" required>
                </div>

                <!-- Tombol Simpan -->
                <div class="flex justify-end">
                    <button type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded-xl shadow transition transform hover:scale-105">
                        Simpan Album
                    </button>
                </div>
            </form>

        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-blue-800 text-white py-4 mt-8">
        <div class="container mx-auto text-center text-sm">
            &copy; 2025 Biro Umum & ASD SETDA DKI Jakarta. All rights reserved.
        </div>
    </footer>

</body>
</html>
