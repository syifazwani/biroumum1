@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-white/95 py-10 px-4" style="background-size: cover; background-position: center;">
    <div class="max-w-4xl mx-auto">
        <h1 class="text-3xl font-bold text-gray-800 mb-8">Daftar Berita</h1>

        @foreach($beritas as $berita)
            <article class="mb-8 p-6 bg-white shadow-md rounded-lg border border-gray-200 hover:shadow-lg transition">
                <h2 class="text-xl font-semibold text-blue-700 mb-2">{{ $berita->judul }}</h2>
                <p class="text-gray-700 mb-4">{{ Str::limit(strip_tags($berita->isi), 150) }}</p>
                <a href="{{ url('/berita/' . $berita->slug) }}" class="inline-block text-blue-600 hover:underline">
                    Baca selengkapnya →
                </a>
            </article>
        @endforeach
    </div>
</div>
@endsection
