@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto p-6 bg-white shadow-md rounded-lg">
    <article>
        <h1 class="text-3xl font-bold text-gray-800 mb-2">{{ $berita->title }}</h1>
        <p class="text-sm text-gray-500 mb-4">Tanggal: {{ $berita->created_at->format('d M Y') }}</p>

        @if($berita->image)
            <img src="{{ asset('storage/' . $berita->image) }}"
                 alt="{{ $berita->title }}"
                 class="w-full h-auto rounded-md mb-4">
        @endif

        <div class="prose max-w-none text-gray-800">
            {!! nl2br(e($berita->content)) !!}
        </div>

        <div class="mt-6">
            <a href="{{ url('/berita') }}"
               class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                ← Kembali ke Daftar Berita
            </a>
        </div>
    </article>
</div>
@endsection
