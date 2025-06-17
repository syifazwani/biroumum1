<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin - Ada Apa di Balai Kota</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">

    @include('partials.navbaradmin')

    <!-- Content -->
    <main class="container mx-auto p-6 flex-grow">
        <div class="max-w-5xl mx-auto p-6 rounded-xl shadow-lg bg-white mt-4">

            <!-- Judul Halaman -->
            <h1 class="text-3xl font-bold mb-8 text-center text-gray-800">Admin: Ada Apa di Balai Kota</h1>

            <!-- Tombol Kembali -->
            <div class="mb-6">
                <a href="{{ route('admin.dashboard') }}">
        <button class="mb-4 px-4 py-2 rounded bg-gray-300 hover:bg-gray-400 text-gray-800 flex items-center gap-2">
            ← Kembali ke Admin
        </button>
    </a>
            </div>

            <!-- Tombol Tambah -->
            <div class="mb-6 text-right">
                <a href="/admin/balai/create" 
                   class="inline-block bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                    + Tambah Konten
                </a>
            </div>

            <!-- Table Data -->
            <div class="overflow-x-auto">
                <table class="w-full table-auto border border-gray-300 rounded-lg shadow-sm">
                    <thead class="bg-gray-100 text-gray-700">
                        <tr>
                            <th class="border px-4 py-3 text-left">Judul</th>
                            <th class="border px-4 py-3 text-left">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        @forelse($items as $item)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="border px-4 py-3">{{ $item->title }}</td>
                                <td class="border px-4 py-3">
                                    <a href="/admin/balai/{{ $item->id }}/edit" 
                                       class="text-blue-600 hover:underline font-medium">Edit</a>
                                    |
                                    <form action="/admin/balai/{{ $item->id }}" method="POST" 
                                          class="inline-block ml-2" 
                                          onsubmit="return confirm('Yakin ingin menghapus?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="text-red-600 hover:underline font-medium">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2" class="text-center text-gray-500 px-4 py-6">Belum ada konten balai.</td>
                            </tr>
                        @endforelse
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
