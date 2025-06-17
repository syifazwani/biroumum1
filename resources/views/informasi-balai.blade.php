@extends('layouts.app')

@section('content')
<div class="min-h-screen py-10 px-4" style="background-size: cover; background-position: center;">
    <div class="bg-white/95 rounded-lg p-8 max-w-4xl mx-auto shadow-md">
        <h1 class="text-3xl font-bold text-gray-800 mb-8">Informasi Balai</h1>

        @foreach($balais as $balai)
            <article class="mb-6 p-5 bg-white border border-gray-200 rounded-lg shadow hover:shadow-lg transition">
                <h2 class="text-xl font-semibold text-green-700 mb-2">{{ $balai->nama_balai }}</h2>
                <p class="text-gray-700 mb-4">
                    {{ Str::limit(strip_tags($balai->deskripsi), 150) }}
                </p>
                <a href="{{ url('/balai/' . $balai->slug) }}" class="text-green-600 hover:underline">
                    Lihat Detail →
                </a>
            </article>
        @endforeach
    </div>
</div>
@endsection
