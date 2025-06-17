<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Daftar Video</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">

    @include('partials.navbaradmin')

    <!-- Content -->
    <main class="container mx-auto p-6 flex-grow">
        <div class="max-w-5xl mx-auto p-6 rounded-xl shadow-lg bg-white mt-4">

            <h1 class="text-3xl font-bold mb-8 text-center text-gray-800">Daftar Video</h1>

            <div class="mb-6 flex justify-between items-center">
                <a href="{{ route('admin.dashboard') }}">
                    <button class="px-4 py-2 rounded bg-gray-300 hover:bg-gray-400 text-gray-800 flex items-center gap-2 transition">
                        ← Kembali ke Admin
                    </button>
                </a>
                <a href="{{ route('videos.create') }}">
                    <button class="px-4 py-2 rounded bg-blue-600 hover:bg-blue-700 text-white transition">Tambah Video</button>
                </a>
            </div>

            @if(session('success'))
                <div class="mb-4 p-3 bg-green-200 text-green-800 rounded shadow">{{ session('success') }}</div>
            @endif
            @if(session('error'))
                <div class="mb-4 p-3 bg-red-200 text-red-800 rounded shadow">{{ session('error') }}</div>
            @endif

            <div class="overflow-x-auto">
                <table class="min-w-full border border-gray-300 text-gray-700">
                    <thead class="bg-gray-100 text-left">
                        <tr>
                            <th class="p-3 border">ID</th>
                            <th class="p-3 border">Judul</th>
                            <th class="p-3 border">URL Video</th>
                            <th class="p-3 border">Deskripsi</th>
                            <th class="p-3 border">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($videos as $video)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="p-3 border">{{ $video->id }}</td>
                            <td class="p-3 border font-semibold">{{ $video->title }}</td>
                            <td class="p-3 border">
                                <a href="{{ $video->video_url }}" target="_blank" class="text-blue-600 underline break-words">{{ $video->video_url }}</a>
                            </td>
                            <td class="p-3 border">{{ $video->description }}</td>
                            <td class="p-3 border space-x-2">
                                <a href="{{ route('videos.edit', $video->id) }}" 
                                   class="inline-block bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600 transition">
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
                        @endforeach
                    </tbody>
                </table>
            </div>

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
