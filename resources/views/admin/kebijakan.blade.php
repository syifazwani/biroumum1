<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Kelola Kebijakan - Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col" style="background-image: url('{{ asset('img/batik.jpg') }}'); background-size: cover; background-position: center;">

    @include('partials.navbaradmin') {{-- Navbar dari dashboard --}}

    <!-- Content -->
    <main class="container mx-auto p-6 flex-grow">
        <div class="max-w-5xl mx-auto p-6 rounded-xl shadow-lg bg-white/90 mt-4">

            <h1 class="text-3xl font-bold mb-8 text-center text-gray-800">Kelola Kebijakan dan Regulasi</h1>

            <!-- Tombol Kembali -->
            <div class="mb-6">
                <a href="{{ route('admin.dashboard') }}">
                    <button class="px-4 py-2 rounded bg-gray-300 hover:bg-gray-400 text-gray-800 flex items-center gap-2 transition">
                        ← Kembali ke Dashboard
                    </button>
                </a>
            </div>

            <!-- Form Upload Kebijakan -->
            <form action="{{ route('admin.kebijakan.upload') }}" method="POST" enctype="multipart/form-data" 
                  class="mb-8 bg-white p-6 rounded shadow space-y-4 hover:shadow-lg transition">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="judul" class="block mb-1 text-gray-700 font-medium">Judul Kebijakan</label>
                        <input type="text" name="judul" id="judul" 
                               class="w-full border border-gray-300 rounded px-3 py-2 text-gray-800 bg-white focus:ring focus:ring-blue-300 focus:outline-none" 
                               required>
                    </div>
                    <div>
                        <label for="file" class="block mb-1 text-gray-700 font-medium">File PDF</label>
                        <input type="file" name="file" id="file" accept=".pdf" 
                               class="w-full border border-gray-300 rounded px-3 py-2 text-gray-800 bg-white focus:ring focus:ring-blue-300 focus:outline-none" 
                               required>
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="bg-blue-700 text-white px-6 py-2 rounded hover:bg-blue-800 transition">
                        Upload Kebijakan
                    </button>
                </div>
            </form>

            <!-- Daftar Kebijakan -->
            @if(count($kebijakans) > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                @foreach($kebijakans as $k)
                <div class="bg-white rounded-lg shadow hover:shadow-md transition p-4 relative group">
                    <h4 class="text-lg font-semibold mb-2 text-gray-800 truncate">📄 {{ $k->judul }}</h4>

                    <!-- Preview PDF -->
                    <div class="h-48 border border-gray-300 mb-3 rounded overflow-hidden bg-gray-50">
                        <iframe 
                            src="{{ asset('storage/' . $k->file_path) }}#toolbar=0&navpanes=0&scrollbar=0" 
                            class="w-full h-full" 
                            frameborder="0">
                        </iframe>
                    </div>

                    <a href="{{ asset('storage/' . $k->file_path) }}" target="_blank" 
                       class="text-blue-600 hover:underline block mb-1 text-sm">Lihat File</a>
                    <a href="{{ asset('storage/' . $k->file_path) }}" download 
                       class="text-sm inline-block px-3 py-1 bg-blue-600 text-white rounded hover:bg-blue-700 transition mb-2">Unduh</a>

                    <!-- Tombol Hapus -->
                    <form action="{{ route('admin.kebijakan.delete', $k->id) }}" method="POST" 
                          onsubmit="return confirm('Yakin ingin menghapus file ini?');" class="mt-2">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                class="w-full text-sm bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700 transition">
                            Hapus
                        </button>
                    </form>
                </div>
                @endforeach
            </div>
            @else
            <p class="text-gray-500 italic text-center mt-8">Tidak ada kebijakan yang tersedia.</p>
            @endif

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
