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
