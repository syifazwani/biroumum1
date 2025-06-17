<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Foto - Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">

    @include('partials.navbaradmin')

    <main class="container mx-auto p-6 flex-grow">
        <h1 class="text-3xl font-bold mb-6 text-center text-gray-800">Daftar Foto</h1>

        <div class="mb-4 flex justify-between items-center">
            <a href="{{ route('admin.dashboard') }}">
                <button class="px-4 py-2 rounded bg-gray-300 hover:bg-gray-400 text-gray-800 flex items-center gap-2 transition">
                    ← Kembali ke Admin
                </button>
            </a>
            <a href="{{ route('foto.create') }}">
                <button class="px-4 py-2 rounded bg-blue-600 hover:bg-blue-700 text-white transition">Tambah Foto</button>
            </a>
        </div>

        @if(session('success'))
            <div class="mb-4 p-3 bg-green-200 text-green-800 rounded shadow animate-pulse">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-x-auto bg-white p-4 rounded shadow-md hover:shadow-xl transition duration-300">
            <table class="min-w-full border border-gray-300 text-gray-700">
                <thead class="bg-gray-100 text-left">
                    <tr>
                        <th class="p-3 border">ID</th>
                        <th class="p-3 border">Album</th>
                        <th class="p-3 border">Foto</th>
                        <th class="p-3 border">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($fotos as $foto)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="p-3 border text-center">{{ $foto->id }}</td>
                        <td class="p-3 border">{{ $foto->album->title ?? 'Tidak ada album' }}</td>
                        <td class="p-3 border">
                            <img src="{{ asset('storage/' . $foto->image_path) }}" alt="Foto" class="w-24 h-24 object-cover rounded shadow-md mx-auto">
                        </td>
                        <td class="p-3 border space-x-2 text-center">
                            <a href="{{ route('admin.foto.edit', $foto->id) }}" 
                               class="inline-block bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600 transition">
                               Edit
                            </a>
                            <form action="{{ route('foto.destroy', $foto->id) }}" method="POST" class="inline-block" 
                                  onsubmit="return confirm('Yakin ingin hapus foto ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700 transition">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-6 text-center">
            {{ $fotos->links() }}
        </div>
    </main>

    <footer class="bg-blue-800 text-white py-4 mt-8">
        <div class="container mx-auto text-center text-sm">
            &copy; 2025 Biro Umum & ASD SETDA DKI Jakarta. All rights reserved.
        </div>
    </footer>

</body>
</html>
