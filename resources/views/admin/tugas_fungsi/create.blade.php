<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Tugas dan Fungsi</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">

    @include('partials.navbaradmin')

    <main class="container mx-auto p-6 flex-grow">
        <div class="max-w-3xl mx-auto bg-white p-6 rounded-xl shadow-lg">

            <a href="{{ route('tugasfungsi.index') }}">
                <button class="mb-4 px-4 py-2 rounded bg-gray-300 hover:bg-gray-400 text-gray-800 flex items-center gap-2 transition">
                    ← Kembali ke Daftar
                </button>
            </a>

            <h1 class="text-2xl font-bold mb-6 text-gray-800 text-center animate-pulse">Tambah File Tugas dan Fungsi</h1>

            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4 animate-fade-in">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('tugasfungsi.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf

                <div>
                    <label class="block mb-1 font-semibold text-gray-700">Nama File</label>
                    <input type="text" name="nama_file" required
                           class="w-full border border-gray-300 rounded p-2 focus:ring focus:ring-blue-300 text-gray-800 bg-white" />
                </div>

                <div>
                    <label class="block mb-1 font-semibold text-gray-700">Upload File (PDF / Gambar)</label>
                    <input type="file" name="file" accept=".pdf,.jpg,.jpeg,.png,.webp" required
                           class="w-full border border-gray-300 rounded p-2 focus:ring focus:ring-blue-300 text-gray-800 bg-white" />
                </div>

                <button type="submit" 
                        class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                    Simpan
                </button>
            </form>

        </div>
    </main>

    <footer class="bg-blue-800 text-white py-4 mt-8">
        <div class="container mx-auto text-center text-sm">
            &copy; 2025 Biro Umum & ASD SETDA DKI Jakarta. All rights reserved.
        </div>
    </footer>

</body>
</html>
