<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Laporan Keuangan - Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col" style="background-image: url('{{ asset('img/batik.jpg') }}'); background-size: cover; background-position: center;">

    @include('partials.navbaradmin') {{-- Navbar Admin --}}

    <main class="flex-grow container mx-auto p-6">
        <div class="max-w-5xl mx-auto bg-white/90 p-8 rounded-xl shadow-lg">

            <a href="{{ route('admin.dashboard') }}">
                <button class="mb-4 px-4 py-2 rounded bg-gray-300 hover:bg-gray-400 text-gray-800 flex items-center gap-2 transition">
                    ← Kembali ke Admin
                </button>
            </a>

            <h2 class="text-3xl font-bold mb-6 text-center text-gray-800">Manajemen Laporan Keuangan</h2>

            {{-- Pesan Sukses --}}
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-800 p-3 rounded mb-6">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Form Upload --}}
            <form action="{{ route('admin.laporan_keuangan.upload') }}" method="POST" enctype="multipart/form-data"
                  class="bg-white/90 p-6 rounded shadow-md space-y-4 hover:shadow-lg transition">
                @csrf
                <div>
                    <label class="block mb-1 text-gray-700 font-medium">Judul</label>
                    <input type="text" name="judul" required placeholder="Masukkan Judul"
                           class="w-full border border-gray-300 rounded px-3 py-2 text-gray-800 bg-white focus:ring focus:ring-blue-300 focus:outline-none">
                </div>
                <div>
                    <label class="block mb-1 text-gray-700 font-medium">Deskripsi</label>
                    <textarea name="deskripsi" rows="3" placeholder="Tulis deskripsi singkat..."
                              class="w-full border border-gray-300 rounded px-3 py-2 text-gray-800 bg-white focus:ring focus:ring-blue-300 focus:outline-none"></textarea>
                </div>
                <div>
                    <label class="block mb-1 text-gray-700 font-medium">Unggah File (PDF)</label>
                    <input type="file" name="file" required accept=".pdf"
                           class="w-full border border-gray-300 rounded px-3 py-2 text-gray-800 bg-white focus:ring focus:ring-blue-300 focus:outline-none">
                </div>
                <div class="text-center">
                    <button type="submit" class="bg-blue-700 text-white px-6 py-2 rounded hover:bg-blue-800 transition">
                        Upload Laporan
                    </button>
                </div>
            </form>

            {{-- Tabel Daftar Laporan --}}
            <div class="overflow-x-auto mt-8">
                <table class="min-w-full table-auto border border-gray-300 rounded shadow-sm bg-white">
                    <thead class="bg-gray-200 text-gray-700">
                        <tr>
                            <th class="p-3 border text-left">Judul</th>
                            <th class="p-3 border text-left">Deskripsi</th>
                            <th class="p-3 border text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($laporans as $laporan)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="p-3 border align-top">{{ $laporan->judul }}</td>
                            <td class="p-3 border align-top">{{ $laporan->deskripsi }}</td>
                            <td class="p-3 border text-center space-x-2">
                                <a href="{{ asset('storage/' . $laporan->file_path) }}" target="_blank" class="text-blue-600 hover:underline">Lihat</a>
                                <a href="{{ route('admin.laporan_keuangan.edit', $laporan->id) }}" class="text-yellow-600 hover:underline">Edit</a>
                                <form action="{{ route('admin.laporan_keuangan.delete', $laporan->id) }}" method="POST"
                                      class="inline-block" onsubmit="return confirm('Yakin hapus?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="text-center text-gray-500 italic p-4">Tidak ada data laporan keuangan.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    {{-- Footer --}}
    <footer class="bg-blue-800 text-white py-4 mt-8">
        <div class="container mx-auto text-center text-sm">
            &copy; 2025 Biro Umum & ASD SETDA DKI Jakarta. All rights reserved.
        </div>
    </footer>

</body>
</html>
