<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Berita - Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">

    {{-- Navbar Admin --}}
    @include('partials.navbaradmin')

    <!-- Main Content -->
    <main class="container mx-auto p-6 flex-grow">
        <div class="max-w-3xl mx-auto bg-white p-6 rounded-xl shadow-lg mt-4">
            
            <!-- Tombol Kembali -->
            <a href="/admin/berita"
                class="inline-flex items-center gap-2 px-4 py-2 bg-gray-300 text-gray-800 hover:bg-gray-400 rounded-lg transition">
                ← Kembali ke Admin Berita
            </a>

            <!-- Header -->
            <h1 class="text-3xl font-bold mb-6 text-center text-gray-800">Tambah Berita</h1>

            <!-- Notifikasi Error -->
            @if ($errors->any())
            <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <!-- Form Tambah Berita -->
            <form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Judul -->
                <div class="mb-4">
                    <label for="title" class="block font-semibold text-gray-700 mb-2">Judul</label>
                    <input type="text" name="title" id="title" required
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring focus:ring-blue-200 focus:outline-none"
                           value="{{ old('title') }}">
                </div>

                <!-- Konten -->
                <div class="mb-6">
                    <label for="content" class="block font-semibold text-gray-700 mb-2">Konten</label>
                    <textarea name="content" id="content" rows="10"
                              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring focus:ring-blue-200 focus:outline-none"
                              required>{{ old('content') }}</textarea>
                </div>

                <!-- Tombol Simpan -->
                <div class="flex justify-end">
                    <button type="submit"
                            class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </main>

    <!-- Footer -->
    @include('partials.footer')

    <!-- CKEditor -->
    <script src="https://cdn.ckeditor.com/4.16.2/full/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('content', {
            filebrowserUploadUrl: "{{ route('ckeditor.upload') }}?_token={{ csrf_token() }}",
            filebrowserUploadMethod: 'form',
            removePlugins: 'image2', // agar tidak terlalu dibatasi
        });
    </script>

</body>
</html>
