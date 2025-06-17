<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Album</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">

    <!-- Navbar Admin (Opsional) -->
    @include('partials.navbaradmin')

    <div class="container mx-auto p-6">
        <div class="flex justify-between items-center mb-6">
            <a href="{{ route('admin.dashboard') }}">
                <button class="px-4 py-2 rounded bg-gray-300 hover:bg-gray-400 text-gray-800 flex items-center gap-2 transition">
                    ← Kembali ke Admin
                </button>
            </a>
            <a href="{{ route('album.create') }}" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded transition">
                + Tambah Album
            </a>
        </div>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4 animate-fade-in" role="alert">
                <strong class="font-bold">Sukses!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @forelse($albums as $album)
            <div class="bg-white rounded-lg shadow hover:shadow-lg transition p-4 flex flex-col">
                <img src="{{ asset('storage/' . $album->cover_image) }}" alt="Cover Album" 
                     class="w-full h-48 object-cover rounded mb-3 border border-gray-200">
                <h2 class="text-lg font-semibold text-gray-800 truncate">{{ $album->title }}</h2>
                <div class="mt-auto flex justify-between items-center pt-3">
                    <a href="{{ route('album.edit', $album) }}" 
                       class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded text-sm transition">
                        Edit
                    </a>
                    <form action="{{ route('album.destroy', $album) }}" method="POST" onsubmit="return confirm('Yakin ingin hapus album ini?')" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded text-sm transition">
                            Hapus
                        </button>
                    </form>
                </div>
            </div>
            @empty
                <p class="col-span-full text-center text-gray-600 italic">Belum ada album yang ditambahkan.</p>
            @endforelse
        </div>
    </div>

    <footer class="bg-blue-800 text-white py-4 mt-8">
        <div class="container mx-auto text-center text-sm">
            &copy; 2025 Biro Umum & ASD SETDA DKI Jakarta. All rights reserved.
        </div>
    </footer>

</body>
</html>
