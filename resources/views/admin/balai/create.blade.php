@extends('layouts.app')

@section('content')
<div class="min-h-screen py-10 px-4 bg-gray-100" style="background-size: cover; background-position: center;">
  <div class="bg-white/95 rounded-lg p-8 max-w-3xl mx-auto shadow-md">
    <a href="/admin/balai">
        <button class="mb-4 px-4 py-2 rounded bg-gray-300 hover:bg-gray-400 text-gray-800 flex items-center gap-2">
            ← Kembali ke Admin Balai
        </button>
    </a>
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Tambah Konten Balai Kota</h2>

    <form action="/admin/balai" method="POST">
      @csrf

      {{-- Input Judul --}}
      <div class="mb-4">
        <label for="title" class="block text-gray-800 font-medium mb-1">Judul</label>
        <input type="text" name="title" id="title" placeholder="Judul konten"
          class="w-full px-4 py-2 border border-gray-300 rounded bg-gray-50 text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500"
          required>
      </div>

      {{-- Input Path Gambar --}}
      <div class="mb-4">
        <label for="image" class="block text-gray-800 font-medium mb-1">Path Gambar</label>
        <input type="text" name="image" id="image" placeholder="Contoh: img/nama.jpg"
          class="w-full px-4 py-2 border border-gray-300 rounded bg-gray-50 text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500"
          >
      </div>

      {{-- Textarea Isi Konten --}}
      <div class="mb-6">
        <label for="content" class="block text-gray-800 font-medium mb-1">Isi Konten</label>
        <textarea name="content" id="content" rows="6" placeholder="Tuliskan isi konten balai kota"
          class="w-full px-4 py-2 border border-gray-300 rounded bg-gray-50 text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500"
          required></textarea>
      </div>

      {{-- Tombol Aksi --}}
      <div class="flex justify-start">
        <button type="submit"
          class="bg-green-600 hover:bg-green-700 text-white font-semibold px-6 py-2 rounded shadow transition">
          Simpan
        </button>
      </div>
    </form>
  </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.ckeditor.com/4.16.2/full/ckeditor.js"></script>
<script>
    CKEDITOR.replace('content', {
        filebrowserUploadUrl: "{{ route('ckeditor.upload') }}?_token={{ csrf_token() }}",
        filebrowserUploadMethod: 'form',
        removePlugins: 'image2', // gunakan image klasik yang lebih fleksibel
    });
</script>

@endsection
