<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Visi dan Misi - Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col" style="background-image: url('{{ asset('img/batik.jpg') }}'); background-size: cover; background-position: center;">

    @include('partials.navbaradmin')

    <main class="container mx-auto p-6 flex-grow">
        <div class="max-w-6xl mx-auto">

            {{-- Tombol Kembali --}}
            <a href="{{ route('admin.dashboard') }}">
                <button class="mb-4 px-4 py-2 rounded bg-gray-300 hover:bg-gray-400 text-gray-800 flex items-center gap-2 transition duration-300 ease-in-out">
                    ← Kembali ke Admin
                </button>
            </a>

            <h2 class="text-3xl font-extrabold mb-6 text-center text-gray-800 animate-fade-in">Manajemen Visi dan Misi</h2>

            {{-- Pesan Sukses --}}
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-800 p-3 rounded mb-6 animate-pulse">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Form Upload --}}
            <form action="{{ route('admin.visi_misi.store') }}" method="POST" enctype="multipart/form-data" 
                  class="bg-white p-6 rounded-xl shadow-lg space-y-4 hover:shadow-2xl transition duration-300">
                @csrf
                <div>
                    <label class="block text-gray-700 font-semibold mb-1">Nama File</label>
                    <input type="text" name="nama_file" required placeholder="Masukkan Nama File" 
                           class="w-full border border-gray-300 rounded px-4 py-2 bg-white text-gray-800 focus:ring-2 focus:ring-blue-400 focus:outline-none">
                </div>
                <div>
                    <label class="block text-gray-700 font-semibold mb-1">Unggah File PDF</label>
                    <input type="file" name="file" required accept=".pdf" 
                           class="w-full border border-gray-300 rounded px-4 py-2 bg-white text-gray-800 focus:ring-2 focus:ring-blue-400 focus:outline-none">
                </div>
                <div class="text-center">
                    <button type="submit" class="bg-blue-700 text-white px-6 py-2 rounded-full hover:bg-blue-800 transition duration-300 ease-in-out">
                        Upload Visi & Misi
                    </button>
                </div>
            </form>

            {{-- Daftar File --}}
            @if(count($visi_misi) > 0)
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mt-8 animate-fade-in-up">
                    @foreach($visi_misi as $item)
                        <div class="bg-white rounded-2xl shadow-md p-4 flex flex-col hover:scale-105 hover:shadow-xl transition duration-300 ease-in-out">
                            <h4 class="text-lg font-semibold mb-2 text-gray-800 truncate">📄 {{ $item->nama_file }}</h4>

                            <div class="h-48 border mb-3 rounded overflow-hidden bg-gray-50">
                                <iframe src="{{ asset('storage/' . $item->path) }}#toolbar=0" class="w-full h-full" frameborder="0"></iframe>
                            </div>

                            <div class="flex justify-between items-center text-sm mt-auto">
                                <a href="{{ Storage::url($item->path) }}" target="_blank" class="text-blue-600 hover:underline transition">Lihat / Download</a>
                                <a href="{{ route('admin.visi_misi.edit', $item->id) }}" class="text-yellow-600 hover:underline transition">Edit</a>
                                <form action="{{ route('admin.visi_misi.destroy', $item->id) }}" method="POST" class="inline-block" 
                                      onsubmit="return confirm('Yakin ingin menghapus file ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline transition">Hapus</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-center text-gray-500 italic mt-6 animate-fade-in">Tidak ada file Visi dan Misi yang tersedia.</p>
            @endif

        </div>
    </main>

    <footer class="bg-blue-800 text-white py-4 mt-8">
        <div class="container mx-auto text-center text-sm">
            &copy; 2025 Biro Umum & ASD SETDA DKI Jakarta. All rights reserved.
        </div>
    </footer>

</body>
</html>
