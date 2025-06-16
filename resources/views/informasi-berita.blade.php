<body class="bg-gray-100 text-black flex flex-col min-h-screen font-sans" style="background-image: url('{{ asset('img/batik.jpg') }}'); background-size: cover; background-position: center;">
  <div class="flex flex-col min-h-screen bg-white/95">
@extends('layouts.app')

@section('content')
    <h1>Daftar Berita</h1>
    @foreach($beritas as $berita)
        <article>
            <h2>{{ $berita->judul }}</h2>
            <p>{{ Str::limit($berita->isi, 150) }}</p>
            <a href="{{ url('/berita/' . $berita->slug) }}">Baca selengkapnya</a>
        </article>
    @endforeach
@endsection
