@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold text-center mb-8 text-blue-700">Informasi Balai</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($balais as $balai)
            <div class="bg-white shadow-md rounded-lg overflow-hidden hover:scale-105 transition-transform duration-300">
                <div class="p-4">
                    <h2 class="text-xl font-semibold text-gray-800 mb-2">{{ $balai->nama_balai }}</h2>
                    <p class="text-gray-600 mb-4">{{ Str::limit($balai->deskripsi, 150) }}</p>
                    <a href="{{ url('/balai/' . $balai->slug) }}" 
                       class="inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition-colors duration-200">
                        Detail
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
