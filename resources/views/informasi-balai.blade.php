<body class="bg-gray-100 text-black flex flex-col min-h-screen font-sans" style="background-image: url('{{ asset('img/batik.jpg') }}'); background-size: cover; background-position: center;">
  <div class="flex flex-col min-h-screen bg-white/95">
@extends('layouts.app')

@section('content')
    <h1>Informasi Balai</h1>
    @foreach($balais as $balai)
        <article>
            <h2>{{ $balai->nama_balai }}</h2>
            <p>{{ Str::limit($balai->deskripsi, 150) }}</p>
            <a href="{{ url('/balai/' . $balai->slug) }}">Detail</a>
        </article>
    @endforeach
@endsection
