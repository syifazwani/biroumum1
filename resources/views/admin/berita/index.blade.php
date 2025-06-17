<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin - Daftar Berita</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">

    @include('partials.navbaradmin')

    <!-- Content -->
    <main class="container mx-auto p-6 flex-grow">
        <div class="max-w-5xl mx-auto p-6 rounded-xl shadow-lg bg-white mt-4">

            <!-- Header Page -->
            <h1 class="text-3xl font-bold mb-8 text-center text-gray-800">Admin: Daftar Berita</h1>

            <!-- Tombol Kembali -->
            <div class="mb-6">
                <a href="{{ route('admin.dashboard') }}" 
                   class="inline-flex items-center gap-2 px-4 py-2 bg-gray-300 text-gray-800 hover:bg-gray-400 rounded-lg transition">
                    ← Kembali ke Admin
                </a>
            </div>

            <!-- Tambah Berita -->
            <div class="mb-6 text-right">
                <a href="{{ url('/admin/berita/create') }}" 
                   class="inline-block px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                    + Tambah Berita
                </a>
            </div>

            <!-- Alert Sukses -->
            @if(session('success'))
                <div class="mb-4 px-4 py-3 bg-green-100 border border-green-300 text-green-800 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Table -->
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-300 rounded shadow-sm">
                    <thead class="bg-gray-100 text-gray-700">
                        <tr>
                            <th class="text-left px-4 py-2 border-b">Judul</th>
                            <th class="text-left px-4 py-2 border-b">Slug</th>
                            <th class="text-left px-4 py-2 border-b">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($beritas as $berita)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-4 py-3 border-b text-gray-800">{{ $berita->title }}</td>
                                <td class="px-4 py-3 border-b text-sm text-gray-600">{{ $berita->slug }}</td>
                                <td class="px-4 py-3 border-b space-x-2">
                                    <a href="{{ url('/admin/berita/' . $berita->id . '/edit') }}" 
                                       class="inline-block px-3 py-1 bg-yellow-100 text-yellow-800 border border-yellow-300 rounded hover:bg-yellow-200 text-sm">
                                        Edit
                                    </a>
                                    <form action="{{ url('/admin/berita/' . $berita->id) }}" method="POST" 
                                          class="inline-block"
                                          onsubmit="return confirm('Yakin ingin hapus?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="px-3 py-1 bg-red-100 text-red-800 border border-red-300 rounded hover:bg-red-200 text-sm">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="px-4 py-6 text-center text-gray-500">Belum ada berita.</td>
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
