<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kebijakan dan Regulasi - Biro Umum dan ASD DKI Jakarta</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>
<body class="bg-gray-100 text-black flex flex-col min-h-screen" style="background-image: url('{{ asset('img/batik.jpg') }}'); background-size: cover; background-position: center;">

    <div class="flex flex-col min-h-screen bg-white/95">
        @include('partials.navbar') {{-- Navbar sama dengan home.blade --}}

        <main class="container mx-auto px-6 py-10 space-y-10">
            <h1 class="text-4xl font-bold text-center text-[#0077b6]" data-aos="fade-down">Kebijakan dan Regulasi</h1>

            {{-- Form Upload Kebijakan --}}
            <section class="bg-white p-6 rounded-xl shadow-md space-y-4" data-aos="fade-up">
                <h2 class="text-2xl font-semibold text-gray-800 mb-4">Upload Kebijakan Baru</h2>
                <form action="{{ route('admin.kebijakan.upload') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="judul" class="block text-gray-700 font-medium">Judul Kebijakan</label>
                            <input type="text" name="judul" id="judul" required
                                   class="w-full border border-gray-300 rounded px-3 py-2 focus:ring focus:ring-blue-300 focus:outline-none">
                        </div>
                        <div>
                            <label for="file" class="block text-gray-700 font-medium">File PDF</label>
                            <input type="file" name="file" id="file" accept=".pdf" required
                                   class="w-full border border-gray-300 rounded px-3 py-2 focus:ring focus:ring-blue-300 focus:outline-none">
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="bg-blue-700 text-white px-6 py-2 rounded hover:bg-blue-800 transition">Upload</button>
                    </div>
                </form>
            </section>

            {{-- Daftar Kebijakan --}}
            <section class="space-y-6" data-aos="fade-up">
                <h2 class="text-2xl font-semibold text-gray-800 text-center">Daftar Kebijakan</h2>
                @if(count($kebijakans) > 0)
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                        @foreach($kebijakans as $k)
                            <div class="bg-white rounded-xl shadow-md hover:shadow-lg p-4 transition" data-aos="zoom-in">
                                <h3 class="text-lg font-semibold text-gray-800 mb-2 truncate">📄 {{ $k->judul }}</h3>
                                <div class="h-48 bg-gray-50 border border-gray-300 rounded overflow-hidden mb-3">
                                    <iframe src="{{ asset('storage/' . $k->file_path) }}#toolbar=0&navpanes=0&scrollbar=0" class="w-full h-full"></iframe>
                                </div>
                                <div class="flex justify-between text-sm">
                                    <a href="{{ asset('storage/' . $k->file_path) }}" target="_blank" class="text-blue-600 hover:underline">Lihat</a>
                                    <a href="{{ asset('storage/' . $k->file_path) }}" download class="text-green-600 hover:underline">Unduh</a>
                                </div>
                                <form action="{{ route('admin.kebijakan.delete', $k->id) }}" method="POST" class="mt-2" onsubmit="return confirm('Yakin ingin menghapus file ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="w-full text-sm bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700 transition mt-2">Hapus</button>
                                </form>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-center text-gray-500 italic mt-6">Tidak ada kebijakan yang tersedia.</p>
                @endif
            </section>
        </main>

        @include('partials.footer') {{-- Footer sama dengan home.blade --}}
    </div>

    <!-- AOS Animation -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>AOS.init({ duration: 800, once: true });</script>
</body>
</html>
