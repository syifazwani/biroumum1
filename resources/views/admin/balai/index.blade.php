@extends('layouts.app')

@section('content')
<div class="p-6">
  <h2 class="text-xl font-bold mb-4">Admin: Ada Apa di Balai Kota</h2>
  <a href="/admin/balai/create" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Tambah Konten</a>
  <table class="w-full table-auto border-collapse border">
    <thead>
      <tr>
        <th class="border px-4 py-2">Judul</th>
        <th class="border px-4 py-2">Aksi</th>
      </tr>
    </thead>
    <tbody>
      @foreach($items as $item)
        <tr>
          <td class="border px-4 py-2">{{ $item->title }}</td>
          <td class="border px-4 py-2">
            <a href="/admin/balai/{{ $item->id }}/edit" class="text-blue-600">Edit</a>
            <form action="/admin/balai/{{ $item->id }}" method="POST" class="inline">
              @csrf
              @method('DELETE')
              <button type="submit" class="text-red-600 ml-2">Hapus</button>
            </form>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
