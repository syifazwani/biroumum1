<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit PPID</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">

    @include('partials.navbaradmin')

    <!-- Content -->
    <main class="container mx-auto p-6 flex-grow">
        <div class="max-w-3xl mx-auto p-6 rounded-xl shadow-lg bg-white mt-4">

            <h1 class="text-2xl font-bold mb-6 text-center text-gray-800">Edit {{ $title }}</h1>

            <form action="{{ route('admin.ppid.update', [$tab, $item->id]) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')

                <div>
                    <label for="nama_file" class="block text-sm font-medium text-gray-700 mb-1">Nama File</label>
                    <input type="text" name="nama_file" id="nama_file" 
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none" 
                        value="{{ old('nama_file', $item->nama_file) }}">
                    @error('nama_file')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="file" class="block text-sm font-medium text-gray-700 mb-1">Upload File (biarkan kosong jika tidak ingin mengganti)</label>
                    <input type="file" name="file" id="file" 
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    @error('file')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror

                    @if($item->path)
                        <p class="mt-2 text-sm text-gray-600">File saat ini: 
                            <a href="{{ asset('storage/' . $item->path) }}" target="_blank" class="text-blue-600 hover:underline">Lihat File</a>
                        </p>
                    @endif
                </div>

                <div class="flex items-center justify-between">
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-700 transition">
                        Simpan Perubahan
                    </button>
                    <a href="{{ route('admin.ppid.index') }}" class="bg-gray-400 text-white px-4 py-2 rounded-lg shadow hover:bg-gray-500 transition">
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
