<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Tugas dan Fungsi</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">

    @include('partials.navbaradmin')

    <main class="container mx-auto p-6 flex-grow">
        <div class="max-w-4xl mx-auto bg-white p-6 rounded-xl shadow-lg">

            <a href="{{ route('admin.dashboard') }}">
                <button class="mb-4 px-4 py-2 rounded bg-gray-300 hover:bg-gray-400 text-gray-800 flex items-center gap-2 transition">
                    ← Kembali ke Admin
                </button>
            </a>

            <h1 class="text-2xl font-bold mb-4 text-gray-800 text-center animate-pulse">Kelola Tugas dan Fungsi</h1>

            <div class="flex justify-end mb-4">
                <a href="{{ route('tugasfungsi.create') }}" 
                   class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition">
                   + Tambah File
                </a>
            </div>

            @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4 animate-fade-in">
                {{ session('success') }}
            </div>
            @endif

            @if($tugas_fungsi->isEmpty())
                <p class="text-gray-500 text-center italic">Tidak ada data.</p>
            @else
                <ul class="space-y-3">
                    @foreach($tugas_fungsi as $item)
                        <li class="border p-4 rounded shadow flex justify-between items-center bg-gray-50 hover:bg-gray-100 transition">
                            <div class="flex flex-col">
                                <span class="font-medium text-gray-700">{{ $item->nama_file }}</span>
                                <a href="{{ Storage::url($item->path) }}" target="_blank" class="text-blue-600 underline text-sm mt-1 hover:text-blue-800">
                                    Download
                                </a>
                            </div>
                            <form action="{{ route('tugasfungsi.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus file ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline text-sm">
                                    Hapus
                                </button>
                            </form>
                        </li>
                    @endforeach
                </ul>
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
