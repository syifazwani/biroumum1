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
      PPID
    </button>

    <button
      class="bg-blue-600 text-white py-4 rounded-full shadow hover:bg-blue-700 transition"
      onclick="location.href='{{ route('admin.organisasi') }}'"
    >
      Informasi
    </button>

    <button
      class="bg-blue-600 text-white py-4 rounded-full shadow hover:bg-blue-700 transition"
      onclick="location.href='{{ route('admin.organisasi') }}'"
    >
      Foto & Video
    </button>

  </div>

</div>
@endsection
