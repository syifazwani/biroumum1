<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen LKIP - Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col" style="background-image: url('{{ asset('img/batik.jpg') }}'); background-size: cover; background-position: center;">

    @include('partials.navbaradmin') {{-- Navbar Admin --}}

    <main class="flex-grow container mx-auto p-6">
        <div class="max-w-5xl mx-auto bg-white/90 p-8 rounded-xl shadow-lg mt-6">

            <a href="{{ route('admin.dashboard') }}">
                <button class="mb-4 px-4 py-2 rounded bg-gray-300 hover:bg-gray-400 text-gray-800 flex items-center gap-2 transition">
                    ← Kembali ke Admin
                </button>
            </a>

            <h2 class="text-3xl font-bold mb-6 text-center text-gray-800">Manajemen LKIP</h2>

            {{-- Pesan Sukses --}}
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-800 p-3 rounded mb-6">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Form Upload LKIP --}}
            <form action="{{ route('admin.lkip.upload') }}" method="POST" enctype="multipart/form-data"
                  class="bg-white p-6 rounded-xl shadow space-y-4 hover:shadow-lg transition">
                @csrf
                <div>
                    <label class="block mb-1 text-gray-700 font-medium">Judul</label>
                    <input type="text" name="judul" required placeholder="Masukkan Judul LKIP"
                           class="w-full border-gray-300 border rounded px-3 py-2 bg-white text-gray-800 focus:ring-2 focus:ring-blue-300">
                </div>
                <div>
                    <label class="block mb-1 text-gray-700 font-medium">Deskripsi</label>
                    <textarea name="deskripsi" rows="3" placeholder="Tulis deskripsi singkat..."
                              class="w-full border-gray-300 border rounded px-3 py-2 bg-white text-gray-800 focus:ring-2 focus:ring-blue-300"></textarea>
                </div>
                <div>
                    <label class="block mb-1 text-gray-700 font-medium">Unggah File (PDF)</label>
                    <input type="file" name="file" required accept=".pdf"
                           class="w-full border-gray-300 border rounded px-3 py-2 bg-white text-gray-800 focus:ring-2 focus:ring-blue-300">
                </div>
                <div class="text-center">
                    <button type="submit" class="bg-blue-700 text-white px-6 py-2 rounded hover:bg-blue-800 transition">
                        Upload LKIP
                    </button>
                </div>
            </form>

            {{-- Daftar LKIP --}}
            @if(count($lkips) > 0)
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 mt-8">
                    @foreach($lkips as $lkip)
                        <div class="bg-white rounded-xl shadow-md hover:shadow-xl transition p-4">
                            <h4 class="text-lg font-semibold mb-2 text-gray-800 truncate">📄 {{ $lkip->judul }}</h4>
                            <p class="text-sm text-gray-600 mb-3">{{ Str::limit($lkip->deskripsi, 100) }}</p>

                            {{-- Preview PDF --}}
                            <div class="h-48 border border-gray-300 mb-3 rounded overflow-hidden bg-gray-50">
                                <iframe 
                                    src="{{ asset('storage/' . $lkip->file_path) }}#toolbar=0"
                                    class="w-full h-full" frameborder="0"></iframe>
                            </div>

                            <div class="flex justify-between items-center text-sm mt-2">
                                <a href="{{ asset('storage/' . $lkip->file_path) }}" target="_blank" class="text-blue-600 hover:underline">
                                    Lihat
                                </a>
                                <a href="{{ route('admin.lkip.edit', $lkip->id) }}" class="text-yellow-600 hover:underline">
                                    Edit
                                </a>
                                <form action="{{ route('admin.lkip.delete', $lkip->id) }}" method="POST" 
                                      onsubmit="return confirm('Yakin hapus file ini?')" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-center text-gray-500 italic mt-8">Tidak ada file LKIP yang tersedia.</p>
            @endif

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
