<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Video</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">

    @include('partials.navbaradmin')

    <main class="container mx-auto p-6 flex-grow">
        <div class="max-w-3xl mx-auto bg-white p-6 rounded-xl shadow-lg mt-4">
            <a href="{{ route('videos.index') }}">
                    <button class="px-4 py-2 rounded bg-gray-300 hover:bg-gray-400 text-gray-800 flex items-center gap-2 transition">
                        ← Kembali ke Dashboard Video
                    </button>
                </a>

            <h1 class="text-3xl font-bold mb-6 text-center text-gray-800">Tambah Video</h1>

            @if ($errors->any())
                <div class="mb-4 p-3 bg-red-200 text-red-800 rounded shadow">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('videos.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
                @csrf

                <!-- Judul Video -->
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Judul Video</label>
                    <input type="text" name="title" id="title" placeholder="Masukkan Judul Video"
                        class="w-full border border-gray-300 p-3 rounded text-gray-900 placeholder-gray-400 
                        focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition" required>
                </div>

                <!-- Upload Video -->
                <div>
                    <label for="video_file" class="block text-sm font-medium text-gray-700 mb-1">Upload Video</label>
                    <input type="file" name="video_file" id="video_file" accept="video/*"
                        class="w-full border border-gray-300 p-3 rounded text-gray-900 bg-white cursor-pointer 
                        focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition" required>
                </div>

                <!-- Deskripsi -->
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
                    <textarea name="description" id="description" rows="4" placeholder="Tulis deskripsi video..."
                        class="w-full border border-gray-300 p-3 rounded text-gray-900 placeholder-gray-400 
                        focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"></textarea>
                </div>

                <!-- Tombol -->
                <div class="flex justify-between">
                    <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-3 rounded-lg shadow-md transition transform hover:scale-105">
                        Simpan
                    </button>
                    <a href="{{ route('videos.index') }}"
                        class="bg-gray-400 hover:bg-gray-500 text-white font-semibold px-6 py-3 rounded-lg shadow-md transition transform hover:scale-105">
                        Batal
                    </a>
                </div>
            </form>

        </div>
    </main>

    <footer class="bg-blue-800 text-white py-4 mt-8">
        <div class="container mx-auto text-center text-sm">
            &copy; 2025 Biro Umum & ASD SETDA DKI Jakarta. All rights reserved.
        </div>
    </footer>

</body>
</html>
