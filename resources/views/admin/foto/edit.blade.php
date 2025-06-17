<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Edit Foto - Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">

    @include('partials.navbaradmin')

    <!-- Content -->
    <main class="container mx-auto p-6 flex-grow">
        <div class="max-w-3xl mx-auto p-6 rounded-xl shadow-lg bg-white mt-4">
            <a href="{{ route('foto.index') }}">
                    <button class="px-4 py-2 rounded bg-gray-300 hover:bg-gray-400 text-gray-800 flex items-center gap-2 transition">
                        ← Kembali ke Dashboard
                    </button>
                </a>
            <h1 class="text-2xl font-bold mb-6 text-center text-gray-800">Edit Foto</h1>

            @if ($errors->any())
                <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $err)
                            <li>{{ $err }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.foto.update', $foto->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                @method('PUT')

                <div>
                    <label for="album_id" class="block text-gray-700 font-semibold mb-2">Album:</label>
                    <select name="album_id" id="album_id" required class="w-full border border-gray-300 rounded p-2">
                        <option value="">-- Pilih Album --</option>
                        @foreach($albums as $album)
                            <option value="{{ $album->id }}" {{ $foto->album_id == $album->id ? 'selected' : '' }}>
                                {{ $album->title }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Foto Saat Ini:</label>
                    <img src="{{ asset('storage/' . $foto->image_path) }}" alt="Foto" class="w-40 h-auto rounded border border-gray-300">
                </div>

                <div>
                    <label for="file" class="block text-gray-700 font-semibold mb-2">Ganti Foto (Opsional):</label>
                    <input type="file" name="file" id="file" class="w-full">
                </div>

                <div class="flex gap-4">
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded shadow hover:bg-blue-700 transition">
                        Update
                    </button>
                    <a href="{{ route('foto.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded shadow hover:bg-gray-600 transition">
                        Kembali ke Daftar Foto
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
