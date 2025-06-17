<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Dasar Hukum - Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col" style="background-image: url('{{ asset('img/batik.jpg') }}'); background-size: cover; background-position: center;">

    @include('partials.navbaradmin') {{-- Navbar khusus admin --}}

    <!-- Content -->
    <main class="flex-grow container mx-auto p-6">
        <div class="max-w-3xl mx-auto bg-white/90 p-8 rounded-xl shadow-lg mt-6">

            <h2 class="text-3xl font-bold mb-6 text-center text-gray-800">Edit Data Dasar Hukum</h2>

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

            <form action="{{ url('admin/dasarhukum/update/' . $dasarHukum->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                <div>
                    <label class="block font-semibold mb-1 text-gray-700" for="nama_file">Nama File</label>
                    <input type="text" id="nama_file" name="nama_file" value="{{ old('nama_file', $dasarHukum->nama_file) }}" required
                        class="w-full border-gray-300 border rounded p-2 focus:ring-2 focus:ring-yellow-400" />
                </div>

                <div>
                    <label class="block font-semibold mb-1 text-gray-700" for="file">Ganti File (Opsional)</label>
                    <input type="file" id="file" name="file" accept="application/pdf" class="w-full text-gray-800" />
                </div>

                @if ($dasarHukum->path)
                    <p class="text-sm text-gray-600">File Saat Ini: 
                        <a href="{{ asset('storage/' . $dasarHukum->path) }}" target="_blank" class="text-blue-600 underline hover:text-blue-800">
                            {{ basename($dasarHukum->path) }}
                        </a>
                    </p>
                @endif

                <div class="flex justify-end">
                    <button type="submit" class="bg-yellow-500 text-white px-6 py-2 rounded hover:bg-yellow-600 transition">Update</button>
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
