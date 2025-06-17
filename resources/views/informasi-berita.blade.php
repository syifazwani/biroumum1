<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Berita - Biro Umum & ASD SETDA DKI Jakarta</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .animate-fadeInUp {
            animation: fadeInUp 0.7s ease-out forwards;
        }
    </style>
</head>
<body class="bg-gradient-to-b from-gray-100 to-white min-h-screen flex flex-col">

    <!-- Navbar -->
    @include('partials.navbar')

    <!-- Main Content -->
    <main class="flex-grow py-10 px-4">
        <div class="max-w-5xl mx-auto text-center mb-8 animate-fadeInUp">
            <h1 class="text-4xl font-extrabold text-gray-800 mb-4 tracking-tight">📚 Daftar Berita</h1>
            <p class="text-gray-600">Temukan informasi terbaru seputar Biro Umum & ASD SETDA DKI Jakarta.</p>
        </div>

        <div class="max-w-4xl mx-auto space-y-6">
            @foreach($beritas as $index => $berita)
                <article class="p-6 bg-white shadow-md rounded-xl border border-gray-200 hover:shadow-xl transform hover:-translate-y-1 transition duration-300 animate-fadeInUp" style="animation-delay: {{ $index * 0.2 }}s;">
                    <h2 class="text-2xl font-semibold bg-gradient-to-r from-blue-600 to-teal-400 bg-clip-text text-transparent mb-2">
                        {{ $berita->title }}
                    </h2>
                    <p class="text-gray-700 mb-4 leading-relaxed">{{ Str::limit(strip_tags($berita->isi), 150) }}</p>
                    <a href="{{ url('/berita/' . $berita->slug) }}" class="inline-flex items-center text-blue-600 hover:text-blue-800 transition duration-200 group">
                        Baca selengkapnya 
                        <svg class="w-5 h-5 ml-1 transform group-hover:translate-x-1 transition duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </article>
            @endforeach
        </div>
    </main>

    <!-- Footer -->
    @include('partials.footer')

</body>
</html>
