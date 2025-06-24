@extends('layouts.admin') {{-- atau sesuaikan dengan layout admin kamu --}}

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Manajemen Hero Slider</h1>

    <a href="{{ route('hero-slider.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded mb-4 inline-block">+ Tambah Slider</a>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-2 mb-4 rounded">
            {{ session('success') }}
        </div>
    @endif

    <table class="min-w-full bg-white shadow-md rounded overflow-hidden">
        <thead>
            <tr>
                <th class="px-4 py-2 border">#</th>
                <th class="px-4 py-2 border">Gambar</th>
                <th class="px-4 py-2 border">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sliders as $slider)
            <tr>
                <td class="px-4 py-2 border">{{ $loop->iteration }}</td>
                <td class="px-4 py-2 border">
                    <img src="{{ asset('storage/' . $slider->image_path) }}" class="w-32">
                </td>
                <td class="px-4 py-2 border">
                    <a href="{{ route('hero-slider.edit', $slider->id) }}" class="bg-yellow-400 hover:bg-yellow-500 text-white px-2 py-1 rounded">Edit</a>
                    <form action="{{ route('hero-slider.destroy', $slider->id) }}" method="POST" class="inline" onsubmit="return confirm('Hapus slider ini?')">
                        @csrf
                        @method('DELETE')
                        <button class="bg-red-500 hover:bg-red-600 text-white px-2 py-1 rounded">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
