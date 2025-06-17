<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Struktur Organisasi PPID</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">

    @include('partials.navbaradmin')

    <main class="container mx-auto p-6 flex-grow">
        <div class="max-w-lg mx-auto bg-white p-6 rounded-xl shadow-lg mt-6">

            <a href="/admin/strukturorganisasippid">
                <button class="mb-4 px-4 py-2 rounded bg-gray-300 hover:bg-gray-400 text-gray-800 flex items-center gap-2 transition">
                    ← Kembali ke Admin Struktur PPID
                </button>
            </a>

            <h2 class="text-2xl font-bold mb-6 text-center text-gray-800 animate-pulse">Edit Struktur Organisasi PPID</h2>

            @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <ul class="list-disc list-inside text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="{{ url('admin/strukturorganisasippid/update/' . $struktur->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf

                <div>
                    <label class="block font-medium mb-1 text-gray-700">Nama File</label>
                    <input type="text" name="nama_file" value="{{ old('nama_file', $struktur->nama_file) }}" required
                        class="w-full border border-gray-300 rounded p-2 focus:ring focus:ring-blue-300 text-gray-800 bg-white" />
                </div>

                <div>
                    <p class="font-medium text-gray-700 mb-2">Gambar Saat Ini:</p>
                    <img src="{{ asset('storage/' . $struktur->path) }}" alt="{{ $struktur->nama_file }}" class="max-h-40 mx-auto rounded shadow" />
                </div>

                <div>
                    <label class="block font-medium mb-1 text-gray-700">Ganti Gambar (opsional)</label>
                    <input type="file" name="file" accept=".jpg,.jpeg,.png" 
                           class="text-gray-700 file:mr-4 file:py-2 file:px-4 file:border-0 
                                  file:text-sm file:font-semibold file:bg-blue-50 
                                  file:text-blue-700 hover:file:bg-blue-100" />
                </div>

                <div class="flex justify-between items-center mt-4">
                    <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition">
                        Simpan Perubahan
                    </button>
                    <a href="{{ url('admin/strukturorganisasippid') }}" 
                       class="text-blue-600 hover:underline text-sm">Batal</a>
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
