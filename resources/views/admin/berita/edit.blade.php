<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Berita - Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">

    @include('partials.navbaradmin')

    <main class="container mx-auto p-6 flex-grow">
        <div class="max-w-3xl mx-auto bg-white p-6 rounded-lg shadow-lg mt-4">
            <a href="/admin/berita"
                   class="inline-flex items-center gap-2 px-4 py-2 bg-gray-300 text-gray-800 hover:bg-gray-400 rounded-lg transition">
                    ← Kembali ke Admin Berita
                </a>
            <h1 class="text-2xl font-bold text-gray-800 mb-6">Edit Berita</h1>

            <!-- Tampilkan error validasi jika ada -->
            @if ($errors->any())
                <div class="mb-4 p-4 bg-red-100 border border-red-400 rounded text-red-700">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Form Edit Berita -->
            <form action="{{ route('admin.berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Judul -->
                <div class="mb-4">
                    <label for="title" class="block text-sm font-medium text-gray-700">Judul</label>
                    <input type="text" name="title" id="title" required
                           class="w-full px-4 py-2 border border-gray-300 rounded bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500"
                           value="{{ old('title', $berita->title) }}">
                </div>

                <!-- Link Eksternal -->
                <div class="mb-4">
                    <label for="external_link" class="block text-sm font-medium text-gray-700">Link Eksternal Berita</label>
                    <input type="url" name="external_link" id="external_link"
                           class="w-full px-4 py-2 border border-gray-300 rounded bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500"
                           value="{{ old('external_link', $berita->external_link ?? '') }}">
                </div>

                <!-- Konten -->
                <div class="mb-4">
                    <label for="content" class="block text-sm font-medium text-gray-700">Isi Berita</label>
                    <textarea name="content" id="content" rows="6"
                              class="w-full px-4 py-2 border border-gray-300 rounded bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500"
                              required>{{ old('content', $berita->content) }}</textarea>
                </div>

                <!-- Tombol -->
                <div class="flex items-center gap-3 pt-2">
                    <button type="submit"
                            class="px-5 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                        Simpan
                    </button>
                    <a href="{{ route('admin.berita.index') }}"
                       class="px-5 py-2 bg-gray-200 text-gray-800 rounded hover:bg-gray-300 transition">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </main>

    <footer class="bg-blue-800 text-white py-4 mt-8">
        <div class="container mx-auto text-center text-sm">
            &copy; 2025 Biro Umum & ASD SETDA DKI Jakarta. All rights reserved.
        </div>
    </footer>

   <!-- CKEditor -->
<script src="https://cdn.ckeditor.com/4.16.2/full/ckeditor.js"></script>
<script>
    CKEDITOR.replace('content', {
        filebrowserUploadUrl: "{{ route('ckeditor.upload') }}?_token={{ csrf_token() }}",
        filebrowserUploadMethod: 'form',
        removePlugins: 'image2', // gunakan image klasik yang lebih fleksibel
    });
</script>

</body>
</html>
