@extends('layouts.app')

@section('content')
<div class="p-6">
  <h2 class="text-xl font-bold mb-4">Tambah Konten Balai Kota</h2>
  <form action="/admin/balai" method="POST">
    @csrf
    <input type="text" name="title" placeholder="Judul" class="w-full mb-3 p-2 border rounded">
    <input type="text" name="image" placeholder="Path Gambar (contoh: img/nama.jpg)" class="w-full mb-3 p-2 border rounded">
    <textarea name="content" rows="5" placeholder="Isi Konten" class="w-full mb-3 p-2 border rounded"></textarea>
    <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Simpan</button>
  </form>
</div>
@endsection
