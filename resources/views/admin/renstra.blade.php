<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Renstra - Biro Umum dan ASD DKI Jakarta</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>
<body class="bg-gray-100 text-black flex flex-col min-h-screen" style="background-image: url('{{ asset('img/batik.jpg') }}'); background-size: cover; background-position: center;">

<div class="flex flex-col min-h-screen bg-white/95">
    @include('partials.navbar')

    <a href="{{ route('admin.dashboard') }}">
        <button class="mt-4 ml-4 px-4 py-2 rounded bg-gray-300 hover:bg-gray-400 text-gray-800 flex items-center gap-2">
            ← Kembali ke Admin
        </button>
    </a>

    <main class="container mx-auto px-6 py-10 space-y-10">
        <h1 class="text-4xl font-bold text-center text-[#0077b6]" data-aos="fade-down">Manajemen Renstra</h1>

        {{-- Form Upload Renstra --}}
        <section class="bg-white p-6 rounded-xl shadow-md space-y-4" data-aos="fade-up">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">Upload Renstra Baru</h2>
            <form action="{{ route('admin.renstra.upload') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-gray-700 font-medium">Nama File</label>
                    <input type="text" name="nama_file" required placeholder="Contoh: Renstra 2023-2026"
                        class="w-full border border-gray-300 rounded px-3 py-2 bg-white focus:ring focus:ring-blue-300 focus:outline-none">
                </div>
                <div>
                    <label class="block text-gray-700 font-medium">Unggah File (PDF)</label>
                    <input type="file" name="file" required accept=".pdf"
                        class="w-full border border-gray-300 rounded px-3 py-2 bg-white focus:ring focus:ring-blue-300 focus:outline-none">
                </div>
                <div class="text-center">
                    <button type="submit" class="bg-blue-700 text-white px-6 py-2 rounded hover:bg-blue-800 transition">
                        Upload Renstra
                    </button>
                </div>
            </form>
        </section>

        {{-- Daftar Renstra --}}
        <section class="space-y-6" data-aos="fade-up">
            <h2 class="text-2xl font-semibold text-gray-800 text-center">Daftar Renstra</h2>
            @if(count($files) > 0)
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                    @foreach($files as $file)
                        <div class="bg-white rounded-xl shadow-md hover:shadow-lg p-4 transition" data-aos="zoom-in">
                            <h3 class="text-lg font-semibold text-gray-800 mb-3 truncate">📄 {{ $file->nama_file }}</h3>

                            <div class="h-48 border border-gray-300 mb-3 rounded overflow-hidden bg-gray-50">
                                <iframe src="{{ asset('storage/' . $file->file_path) }}#toolbar=0&navpanes=0&scrollbar=0"
                                        class="w-full h-full" frameborder="0"></iframe>
                            </div>

                            <div class="flex justify-between text-sm">
                                <a href="{{ asset('storage/' . $file->file_path) }}" target="_blank" class="text-blue-600 hover:underline">Lihat</a>
                                <a href="{{ route('admin.renstra.edit', $file->id) }}" class="text-yellow-600 hover:underline">Edit</a>
                                <form action="{{ route('admin.renstra.delete', $file->id) }}" method="POST"
                                      class="inline-block" onsubmit="return confirm('Yakin hapus file ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-center text-gray-500 italic mt-6">Tidak ada file Renstra yang tersedia.</p>
            @endif
        </section>
    </main>

    @include('partials.footer')
</div>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>AOS.init({ duration: 800, once: true });</script>
</body>
</html>
