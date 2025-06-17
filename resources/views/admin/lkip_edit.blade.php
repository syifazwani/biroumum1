<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit LKIP - Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col" style="background-image: url('{{ asset('img/batik.jpg') }}'); background-size: cover; background-position: center;">

    @include('partials.navbaradmin') {{-- Navbar Admin --}}

    <main class="flex-grow container mx-auto p-6">
        <div class="max-w-3xl mx-auto bg-white/90 p-8 rounded-xl shadow-lg mt-6">

            <a href="{{ route('admin.lkip') }}">
                <button class="mb-4 px-4 py-2 rounded bg-gray-300 hover:bg-gray-400 text-gray-800 flex items-center gap-2 transition">
                    ← Kembali ke Admin LKIP
                </button>
            </a>

            <h2 class="text-3xl font-bold mb-6 text-center text-gray-800">Edit LKIP</h2>

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

            <form action="{{ route('admin.lkip.update', $lkip->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <div>
                    <label class="block font-semibold mb-1 text-gray-700">Judul</label>
                    <input type="text" name="judul" value="{{ old('judul', $lkip->judul) }}" required
                        class="w-full border-gray-300 border rounded p-2 focus:ring-2 focus:ring-yellow-400">
                </div>

                <div>
                    <label class="block font-semibold mb-1 text-gray-700">Deskripsi</label>
                    <textarea name="deskripsi" rows="3"
                        class="w-full border-gray-300 border rounded p-2 focus:ring-2 focus:ring-yellow-400">{
