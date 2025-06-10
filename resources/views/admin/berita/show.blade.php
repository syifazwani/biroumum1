@extends('layouts.app')

@section('content')
    <article>
        <h1>{{ $berita->title }}</h1>
        <p class="text-muted">Tanggal: {{ $berita->created_at->format('d M Y') }}</p>

        @if($berita->image)
            <img src="{{ asset('storage/' . $image->image) }}" alt="{{ $berita->title }}" class="img-fluid mb-3">
        @endif

        <div>
            {!! nl2br(e($berita->content)) !!}
        </div>

        <a href="{{ url('/berita') }}" class="btn btn-primary mt-4">Kembali ke Daftar Berita</a>
    </article>
@endsection
