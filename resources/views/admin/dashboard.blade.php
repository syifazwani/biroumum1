@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
<div class="max-w-md mx-auto p-4 rounded shadow">

  <h1 class="text-2xl font-bold mb-6 text-center">Dashboard Admin</h1>

  <div class="grid grid-cols-2 gap-4">
    <button
      class="bg-blue-600 text-white py-4 rounded-full shadow hover:bg-blue-700 transition"
      onclick="location.href='{{ route('admin.organisasi') }}'"
    >
      Organisasi
    </button>

    <button
      class="bg-blue-600 text-white py-4 rounded-full shadow hover:bg-blue-700 transition"
      onclick="location.href='{{ route('admin.kebijakan') }}'"
    >
      Kebijakan
    </button>

    <button
      class="bg-blue-600 text-white py-4 rounded-full shadow hover:bg-blue-700 transition"
      onclick="location.href='{{ route('admin.renstra') }}'"
    >
      Renstra
    </button>

<button
      class="bg-blue-600 text-white py-4 rounded-full shadow hover:bg-blue-700 transition"
      onclick="location.href='{{ route('admin.lkip') }}'"
    >
      LKIP
    </button>

    <button
      class="bg-blue-600 text-white py-4 rounded-full shadow hover:bg-blue-700 transition"
      onclick="location.href='{{ route('admin.laporan_keuangan') }}'"
    >
      Laporan Keuangan
    </button>

    <button
      class="bg-blue-600 text-white py-4 rounded-full shadow hover:bg-blue-700 transition"
      onclick="location.href='{{ route('admin.organisasi') }}'"
    >
      Informasi
    </button>

    <button
      class="bg-blue-600 text-white py-4 rounded-full shadow hover:bg-blue-700 transition"
      onclick="location.href='{{ route('foto.index') }}'"
    >
      Foto
    </button>
    
    <button
      class="bg-blue-600 text-white py-4 rounded-full shadow hover:bg-blue-700 transition"
      onclick="location.href='{{ route('album.index') }}'"
    >
      Album
    </button>

    <button
      class="bg-blue-600 text-white py-4 rounded-full shadow hover:bg-blue-700 transition"
      onclick="location.href='{{ route('videos.index') }}'"
    >
      Video
    </button>

    <button
      class="bg-blue-600 text-white py-4 rounded-full shadow hover:bg-blue-700 transition"
      onclick="location.href='{{ route('admin.berita.index') }}'"
    >
      Berita
    </button>

    <button
      class="bg-blue-600 text-white py-4 rounded-full shadow hover:bg-blue-700 transition"
      onclick="location.href='{{ route('admin.visi_misi.index') }}'"
    >
      Visi-misi
    </button>

    <button
      class="bg-blue-600 text-white py-4 rounded-full shadow hover:bg-blue-700 transition"
      onclick="location.href='admin/dasarhukum'"
    >
      Dasar Hukum
    </button>

    <button
      class="bg-blue-600 text-white py-4 rounded-full shadow hover:bg-blue-700 transition"
      onclick="location.href='{{ route('tugasfungsi.index') }}'"
    >
      tugas dan fungsi
    </button>

    <button
      class="bg-blue-600 text-white py-4 rounded-full shadow hover:bg-blue-700 transition"
      onclick="location.href='admin/strukturorganisasippid'"
    >
      struktur ppid
    </button>


  </div>

</div>
@endsection
