<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informasi Balai - Biro Umum & ASD SETDA DKI Jakarta</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 min-h-screen flex flex-col">

    @include('partials.navbar')

    <main class="flex-grow py-10 px-4" style="background-image: url('/path/to/background.jpg'); background-size: cover; background-position: center;">
        <div class="bg-white/95 rounded-lg p-8 max-w-4xl mx-auto shadow-md">
            <h1 class="text-3xl font-bold text-gray-800 mb-8 text-center">Informasi Balai</h1>

            @foreach($balais as $balai)
                <article class="mb-6 p-5 bg-white border border-gray-200 rounded-lg shadow hover:shadow-lg transition duration-300 ease-in-out">
                    <h2 class="text-xl font-semibold text-green-700 mb-2">{{ $balai->title }}</h2>
                    <p class="text-gray-700 mb-4">
                        {{ Str::limit(strip_tags($balai->deskripsi), 150) }}
                    </p>
                    <a href="{{ url('/balai/' . $balai->slug) }}" class="text-green-600 hover:underline font-medium">
                        Lihat Detail →
                    </a>
                </article>
            @endforeach
        </div>
    </main>

  @include('partials.footer')

</body>
</html>
