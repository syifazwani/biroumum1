@extends('layouts.app') {{-- Sesuaikan dengan layout adminmu --}}

@section('content')
<div class="p-6">
    <a href="{{ route('admin.dashboard') }}">
      <button class="mb-4 px-4 py-2 rounded bg-gray-300 hover:bg-gray-400 text-gray-800 flex items-center gap-2">
        ← Kembali ke Admin
      </button>
    </a>
    <h3 class="text-xl font-semibold mb-4">Kebijakan dan Regulasi</h3>

    {{-- Form Upload Kebijakan --}}
    <form action="{{ route('admin.kebijakan.upload') }}" method="POST" enctype="multipart/form-data" class="mb-6">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 items-end">
            <div>
                <label for="judul" class="block mb-1">Judul Kebijakan</label>
                <input type="text" name="judul" id="judul" class="w-full border rounded px-3 py-2" required>
            </div>
            <div>
                <label for="file" class="block mb-1">File PDF</label>
                <input type="file" name="file" id="file" class="w-full border rounded px-3 py-2" required accept=".pdf">
            </div>
            <div class="md:col-span-2">
                <button type="submit" class="bg-blue-700 text-white px-4 py-2 rounded hover:bg-blue-800">Upload</button>
            </div>
        </div>
    </form>

    {{-- Daftar Kebijakan --}}
    @if(count($kebijakans) > 0)
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        @foreach($kebijakans as $k)
        <div class="bg-white rounded-lg shadow p-4">
            <h4 class="text-lg font-semibold mb-2 truncate">📄 {{ $k->judul }}</h4>

            {{-- Preview PDF --}}
            <div class="h-48 border mb-3 rounded overflow-hidden">
                <iframe 
                    src="{{ asset('storage/' . $k->file_path) }}#toolbar=0&navpanes=0&scrollbar=0" 
                    class="w-full h-full" 
                    frameborder="0">
                </iframe>
            </div>

            <a href="{{ asset('storage/' . $k->file_path) }}" target="_blank" class="text-blue-600 hover:underline">Lihat File</a><br>
            <a href="{{ asset('storage/' . $k->file_path) }}" download class="text-sm mt-2 inline-block px-3 py-1 bg-blue-600 text-white rounded hover:bg-blue-700">Unduh</a>

            {{-- Tombol Hapus --}}
            <form action="{{ route('admin.kebijakan.delete', $k->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus file ini?');" class="mt-3">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-sm bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">Hapus</button>
            </form>
        </div>
        @endforeach
    </div>
    @else
    <p>Tidak ada kebijakan yang tersedia.</p>
    @endif
</div>
@endsection
