<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit Video</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">

    @include('partials.navbaradmin')

    <!-- Content -->
    <main class="container mx-auto p-6 flex-grow">
        <div class="max-w-3xl mx-auto p-6 rounded-xl shadow-lg bg-white mt-4">
            <a href="{{ route('videos.index') }}">
                    <button class="px-4 py-2 rounded bg-gray-300 hover:bg-gray-400 text-gray-800 flex items-center gap-2 transition">
                        ← Kembali ke Dashboard Video
                    </button>
                </a>
            <h1 class="text-3xl font-bold mb-6 text-center text-gray-800">Edit Video</h1>

            @if ($errors->any())
                <div class="mb-4 p-3 bg-red-200 text-red-800 rounded shadow">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('videos.update', $video->id) }}" method="POST" class="space-y-5">
                @csrf
                @method('PUT')

                <!-- Judul Video -->
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Judul Video</label>
                    <input type="text" name="title" id="title" value="{{ old('title', $video->title) }}"
                        class="w-full border border-gray-300 p-3 rounded text-gray-900 placeholder-gray-400 
                        focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition" required>
                </div>

                <!-- URL Video -->
                <div>
                    <label for="video_url" class="block text-sm font-medium text-gray-700 mb-1">URL Video</label>
                    <input type="url" name="video_url" id="video_url" value="{{ old('video_url', $video->video_url) }}"
                        class="w-full border border-gray-300 p-3 rounded text-gray-900 placeholder-gray-400 
                        focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition" required>
                </div>

                <!-- Deskripsi -->
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
                    <textarea name="description" id="description" rows="4"
                        class="w-full border border-gray-300 p-3 rounded text-gray-900 placeholder-gray-400 
                        focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">{{ old('description', $video->description) }}</textarea>
                </div>

                <!-- Tombol -->
                <div class="flex justify-between">
                    <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-3 rounded-lg shadow-md transition transform hover:scale-105">
                        Update
                    </button>
                    <a href="{{ route('videos.index') }}"
                        class="bg-gray-400 hover:bg-gray-500 text-white font-semibold px-6 py-3 rounded-lg shadow-md transition transform hover:scale-105">
                        Batal
                    </a>
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
