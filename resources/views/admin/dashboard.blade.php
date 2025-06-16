@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
<div class="max-w-3xl mx-auto p-6 rounded shadow bg-white mt-8">

  <h1 class="text-3xl font-bold mb-8 text-center text-gray-800">Dashboard Admin</h1>

  {{-- Kelompok: Organisasi --}}
  <h2 class="text-xl font-semibold mb-4 text-gray-700">Organisasi</h2>
  <div class="grid grid-cols-2 sm:grid-cols-3 gap-4 mb-8">
    <button class="bg-blue-600 text-white text-lg font-semibold py-6 rounded-xl shadow hover:bg-blue-700 transition"
      onclick="location.href='{{ route('admin.organisasi') }}'">
      Organisasi
    </button>
    <button class="bg-blue-600 text-white text-lg font-semibold py-6 rounded-xl shadow hover:bg-blue-700 transition"
      onclick="location.href='{{ route('admin.kebijakan') }}'">
      Kebijakan
    </button>
    <button class="bg-blue-600 text-white text-lg font-semibold py-6 rounded-xl shadow hover:bg-blue-700 transition"
      onclick="location.href='{{ route('admin.renstra') }}'">
      Renstra
    </button>
    <button class="bg-blue-600 text-white text-lg font-semibold py-6 rounded-xl shadow hover:bg-blue-700 transition"
      onclick="location.href='{{ route('admin.lkip') }}'">
      LKIP
    </button>
    <button class="bg-blue-600 text-white text-lg font-semibold py-6 rounded-xl shadow hover:bg-blue-700 transition"
      onclick="location.href='{{ route('admin.laporan_keuangan') }}'">
      Laporan Keuangan
    </button>
  </div>

  {{-- Kelompok: PPID --}}
  <h2 class="text-xl font-semibold mb-4 text-gray-700">PPID</h2>
  <div class="grid grid-cols-2 sm:grid-cols-3 gap-4 mb-8">
    <button class="bg-green-600 text-white text-lg font-semibold py-6 rounded-xl shadow hover:bg-green-700 transition"
      onclick="location.href='{{ route('admin.visi_misi.index') }}'">
      Visi & Misi
    </button>
    <button class="bg-green-600 text-white text-lg font-semibold py-6 rounded-xl shadow hover:bg-green-700 transition"
      onclick="location.href='admin/dasarhukum'">
      Dasar Hukum
    </button>
    <button class="bg-green-600 text-white text-lg font-semibold py-6 rounded-xl shadow hover:bg-green-700 transition"
      onclick="location.href='{{ route('tugasfungsi.index') }}'">
      Tugas & Fungsi
    </button>
    <button class="bg-green-600 text-white text-lg font-semibold py-6 rounded-xl shadow hover:bg-green-700 transition"
      onclick="location.href='admin/strukturorganisasippid'">
      Struktur PPID
    </button>
  </div>

  {{-- Kelompok: Gallery --}}
  <h2 class="text-xl font-semibold mb-4 text-gray-700">Gallery</h2>
  <div class="grid grid-cols-2 sm:grid-cols-3 gap-4 mb-8">
    <button class="bg-purple-600 text-white text-lg font-semibold py-6 rounded-xl shadow hover:bg-purple-700 transition"
      onclick="location.href='{{ route('foto.index') }}'">
      Foto
    </button>
    <button class="bg-purple-600 text-white text-lg font-semibold py-6 rounded-xl shadow hover:bg-purple-700 transition"
      onclick="location.href='{{ route('videos.index') }}'">
      Video
    </button>
    <button class="bg-purple-600 text-white text-lg font-semibold py-6 rounded-xl shadow hover:bg-purple-700 transition"
      onclick="location.href='{{ route('album.index') }}'">
      Album
    </button>
  </div>

  {{-- Lainnya --}}
  <h2 class="text-xl font-semibold mb-4 text-gray-700">Lainnya</h2>
  <div class="grid grid-cols-2 sm:grid-cols-3 gap-4">
    <button class="bg-gray-600 text-white text-lg font-semibold py-6 rounded-xl shadow hover:bg-gray-700 transition"
      onclick="location.href='{{ route('admin.berita.index') }}'">
      Berita
    </button>
    <button class="bg-gray-600 text-white text-lg font-semibold py-6 rounded-xl shadow hover:bg-gray-700 transition"
      onclick="location.href='admin/balai'">
      Balai
    </button>
  </div>

</div>
@endsection
