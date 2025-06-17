<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Visi & Misi - Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col" style="background-image: url('{{ asset('img/batik.jpg') }}'); background-size: cover; background-position: center;">

    @include('partials.navbaradmin')

    <main class="container mx-auto p-6 flex-grow">
        <div class="max-w-3xl mx-auto p-6 rounded-xl shadow-lg bg-white mt-4">

            <a href="{{ route('admin.visi_misi.index') }}">
                <button class="mb-4 px-4 py-2 rounded bg-gray-300 hover:bg-gray-400 text-gray-800 flex items-center gap-2 transition">
                    ← Kembali ke Manajemen Visi dan Misi
                </button>
            </a>

            <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Edit File Visi & Misi</h2>

            {{-- Pesan Error (Jika Ada) --}}
            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-800 p-3 rounded mb-4">
                    <ul class="list-disc pl-5 space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.visi_misi.update', $item->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                @method('PUT')

                <div>
                    <label class="block mb-1 text-gray-700 font-medium">Nama File</label>
                    <input type="text" name="nama_file" value="{{ old('nama_file', $item->nama_file) }}" required
                        class="w-full border border-gray-300 rounded px-3 py-2 text-gray-800 bg-white focus:ring focus:ring-blue-300 focus:outline-none">
                </div>

                <div>
                    <p class="mb-2 text-gray-600">File saat ini: 
                        <a href="{{ Storage::url($item->path) }}" target="_blank" class="text-blue-600 hover:underline">
                            {{ $item->nama_file }}
                        </a>
                    </p>
                </div>

                <div>
                    <label class="block mb-1 text-gray-700 font-medium">Ganti File PDF (opsional)</label>
                    <input type="file" name="file" accept=".pdf"
                        class="w-full border border-gray-300 rounded px-3 py-2 text-gray-800 bg-white focus:ring focus:ring-blue-300 focus:outline-none">
                </div>

                <div class="text-center">
                    <button type="submit"
                        class="bg-yellow-600 text-white px-6 py-2 rounded hover:bg-yellow-700 transition">
                        Simpan Perubahan
                    </button>
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
