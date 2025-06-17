<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Kelola Dasar Hukum - Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col" style="background-image: url('{{ asset('img/batik.jpg') }}'); background-size: cover; background-position: center;">

    @include('partials.navbaradmin') {{-- Navbar dashboard --}}

    <!-- Content -->
    <main class="container mx-auto p-6 flex-grow">
        <div class="max-w-5xl mx-auto p-6 rounded-xl shadow-lg bg-white/90 mt-4">

            <h1 class="text-3xl font-bold mb-6 text-center text-gray-800">Kelola Dasar Hukum</h1>

            <!-- Tombol Kembali -->
            <div class="mb-6">
                <a href="{{ route('admin.dashboard') }}">
                    <button class="px-4 py-2 rounded bg-gray-300 hover:bg-gray-400 text-gray-800 flex items-center gap-2 transition">
                        ← Kembali ke Dashboard
                    </button>
                </a>
            </div>

            <!-- Pesan Sukses -->
            @if(session('success'))
                <div class="mb-4 p-3 bg-green-200 text-green-800 rounded shadow">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Form Upload Dasar Hukum Baru -->
            <div class="mb-8 p-6 border rounded-xl shadow bg-white space-y-4 hover:shadow-lg transition">
                <h2 class="text-xl font-semibold text-gray-700">Upload Dasar Hukum Baru</h2>
                <form action="{{ url('admin/dasarhukum/upload') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                    @csrf
                    <div>
                        <label for="nama_file" class="block font-semibold mb-1 text-gray-700">Nama File</label>
                        <input type="text" name="nama_file" id="nama_file" class="w-full border-gray-300 border rounded p-2 focus:ring-2 focus:ring-blue-400" required value="{{ old('nama_file') }}">
                        @error('nama_file') <p class="text-red-600 mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label for="file" class="block font-semibold mb-1 text-gray-700">Pilih File PDF</label>
                        <input type="file" name="file" id="file" accept="application/pdf" required class="block text-gray-800">
                        @error('file') <p class="text-red-600 mt-1">{{ $message }}</p> @enderror
                    </div>
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">Upload</button>
                </form>
            </div>

            <!-- Daftar Dasar Hukum -->
            <div class="space-y-8">
                @foreach($dasarHukum as $item)
                    <div class="p-6 border rounded-xl shadow bg-white space-y-4 hover:shadow-lg transition">
                        <div>
                            <label class="block font-semibold mb-1 text-gray-700">Nama File:</label>
                            <p class="mb-2 text-gray-800">{{ $item->nama_file }}</p>
                            <iframe src="{{ asset('storage/' . $item->path) }}#toolbar=0" class="w-full h-[400px] border rounded" frameborder="0"></iframe>
                            @if($item->path)
                                <a href="{{ Storage::url($item->path) }}" target="_blank" class="text-blue-600 underline mt-2 inline-block hover:text-blue-800 transition">Lihat File PDF</a>
                            @endif
                        </div>

                        <div class="flex flex-col sm:flex-row gap-4">
                            <!-- Form Update -->
                            <form action="{{ url('admin/dasarhukum/update/' . $item->id) }}" method="POST" enctype="multipart/form-data" class="flex-1 space-y-4">
                                @csrf
                                <div>
                                    <label class="block font-semibold mb-1 text-gray-700">Edit Nama File</label>
                                    <input type="text" name="nama_file" value="{{ old('nama_file', $item->nama_file) }}" class="w-full border-gray-300 border rounded p-2 focus:ring-2 focus:ring-yellow-400" required>
                                </div>
                                <div>
                                    <label class="block font-semibold mb-1 text-gray-700">Ganti File (Opsional)</label>
                                    <input type="file" name="file" accept="application/pdf" class="block text-gray-800">
                                </div>
                                <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600 transition">Update</button>
                            </form>

                            <!-- Form Hapus -->
                            <form action="{{ url('admin/dasarhukum/delete/' . $item->id) }}" method="POST" class="flex items-start">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 transition">Hapus</button>
                            </form>
                        </div>
                    </div>
                @endforeach
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
