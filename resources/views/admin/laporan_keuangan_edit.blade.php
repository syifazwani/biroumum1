<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Laporan Keuangan - Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col" style="background-image: url('{{ asset('img/batik.jpg') }}'); background-size: cover; background-position: center;">

    @include('partials.navbaradmin') {{-- Navbar Admin --}}

    <main class="flex-grow container mx-auto p-6">
        <div class="max-w-3xl mx-auto bg-white/90 p-8 rounded-xl shadow-lg mt-6">

            <a href="{{ route('admin.laporan_keuangan') }}">
                <button class="mb-4 px-4 py-2 rounded bg-gray-300 hover:bg-gray-400 text-gray-800 flex items-center gap-2 transition">
                    ← Kembali ke Admin Laporan Keuangan
                </button>
            </a>

            <h2 class="text-3xl font-bold mb-6 text-center text-gray-800">Edit Laporan Keuangan</h2>

            {{-- Validasi Error --}}
            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Success Message --}}
            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('admin.laporan_keuangan.update', $laporan->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <div>
                    <label class="block font-semibold mb-1 text-gray-700">Judul</label>
                    <input type="text" name="judul" value="{{ old('judul', $laporan->judul) }}" required
                        class="w-full border-gray-300 border rounded p-2 focus:ring-2 focus:ring-yellow-400">
                </div>

                <div>
                    <label class="block font-semibold mb-1 text-gray-700">Deskripsi</label>
                    <textarea name="deskripsi" rows="3" required
                        class="w-full border-gray-300 border rounded p-2 focus:ring-2 focus:ring-yellow-400">{{ old('deskripsi', $laporan->deskripsi) }}</textarea>
                </div>

                <div>
                    <label class="block font-semibold mb-1 text-gray-700">Ganti File (PDF) <span class="text-sm text-gray-500">(Opsional)</span></label>
                    <input type="file" name="file" accept="application/pdf" class="w-full text-gray-800">
                </div>

                @if ($laporan->file_path)
                    <p class="text-sm text-gray-600">File Saat Ini: 
                        <a href="{{ asset('storage/' . $laporan->file_path) }}" target="_blank" class="text-blue-600 underline hover:text-blue-800">
                            {{ basename($laporan->file_path) }}
                        </a>
                    </p>
                @endif

                <div class="flex justify-end">
                    <button type="submit" class="bg-yellow-600 text-white px-6 py-2 rounded hover:bg-yellow-700 transition">Update</button>
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
