<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Struktur Organisasi</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">

    @include('partials.navbaradmin')

    <main class="container mx-auto p-6 flex-grow">
        <div class="max-w-3xl mx-auto bg-white p-6 rounded-xl shadow-md mt-4 hover:shadow-lg transition transform hover:scale-[1.01]">

            <h1 class="text-2xl font-bold mb-4 text-gray-800 text-center">Update Struktur Organisasi</h1>

            {{-- Tombol Kembali --}}
            <a href="{{ route('admin.dashboard') }}">
                <button class="mb-4 px-4 py-2 rounded bg-gray-300 hover:bg-gray-400 text-gray-800 flex items-center gap-2 transition">
                    ← Kembali ke Admin
                </button>
            </a>

            {{-- Pesan Sukses --}}
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-800 p-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Form Upload Struktur Organisasi --}}
            <form method="POST" action="{{ route('admin.organisasi.upload') }}" enctype="multipart/form-data" class="space-y-5">
                @csrf
                <div>
                    <label class="block font-medium text-gray-700 mb-1">Pilih File Gambar (jpg, jpeg, png)</label>
                    <input type="file" name="image" required 
                           class="w-full text-gray-800 bg-white border border-gray-300 rounded p-2 
                                  focus:ring focus:ring-blue-300 focus:outline-none 
                                  file:mr-4 file:py-2 file:px-4 file:border-0 file:text-sm 
                                  file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                </div>

                <button type="submit" 
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-3 rounded-lg shadow-md transition transform hover:scale-105">
                    Upload
                </button>
            </form>

            {{-- Tampilkan Gambar Saat Ini --}}
            @if($image)
                <h2 class="text-lg font-semibold mt-6 text-gray-800 text-center">Gambar Saat Ini:</h2>
                <div class="flex justify-center mt-4">
                    <img src="{{ asset('storage/' . $image->image_path) }}" 
                         class="max-w-xl rounded shadow-lg border border-gray-300 p-2 bg-white">
                </div>
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
