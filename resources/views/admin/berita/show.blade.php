<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Detail Berita - Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Animasi Keyframes */
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
            animation: fadeInUp 0.6s ease-out forwards;
        }
    </style>
</head>
<body class="bg-gradient-to-b from-gray-100 to-white min-h-screen flex flex-col">

    @include('partials.navbaradmin')

    <!-- Content -->
    <main class="container mx-auto p-6 flex-grow">
        <div class="max-w-3xl mx-auto p-6 rounded-2xl shadow-2xl bg-white mt-6 transition transform hover:scale-[1.01] animate-fadeInUp">

            <article class="space-y-4">
                <h1 class="text-4xl font-extrabold text-gray-800 mb-2 tracking-tight animate-fadeInUp">
                    {{ $berita->title }}
                </h1>
                <p class="text-sm text-gray-500 mb-4 animate-fadeInUp delay-100">
                    🗓️ Tanggal: {{ $berita->created_at->format('d M Y') }}
                </p>

                @if($berita->image)
                    <div class="overflow-hidden rounded-lg shadow-md animate-fadeInUp delay-200">
                        <img src="{{ asset('storage/' . $berita->image) }}" 
                             alt="{{ $berita->title }}" 
                             class="w-full h-auto transform hover:scale-105 transition duration-500 ease-in-out">
                    </div>
                @endif

                <div class="prose max-w-none text-gray-700 leading-relaxed animate-fadeInUp delay-300">
                    {!! $berita->content !!}
                </div>

                <div class="mt-8 animate-fadeInUp delay-400">
                    <a href="{{ url('/berita') }}" 
                       class="inline-block bg-blue-600 text-white px-6 py-3 rounded-full shadow-lg hover:bg-blue-700 hover:scale-105 transform transition duration-300 ease-in-out">
                        ← Kembali ke Daftar Berita
                    </a>
                </div>
            </article>

        </div>
    </main>

    @include('partials.footer')

</body>
</html>
