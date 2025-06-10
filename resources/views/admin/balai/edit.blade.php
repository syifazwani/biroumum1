@extends('layouts.app')

@section('content')
<div class="p-6">
  <h2 class="text-xl font-bold mb-4">Edit Konten Balai Kota</h2>
  <form action="/admin/balai/{{ $item->id }}" method="POST">
    @csrf
    @method('PUT')
    <input type="text" name="title" value="{{ $item->title }}" class="w-full mb-3 p-2 border rounded">
    <input type="text" name="image" value="{{ $item->image }}" class="w-full mb-3 p-2 border rounded">
    <textarea name="content" rows="5" class="w-full mb-3 p-2 border rounded">{{ $item->content }}</textarea>
    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Update</button>
  </form>
</div>
@endsection
