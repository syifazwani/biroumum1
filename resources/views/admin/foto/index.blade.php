<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Foto - Admin</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">

  {{-- Navbar Admin --}}
  @include('partials.navbaradmin')

  <!-- Main Content -->
  <main class="container mx-auto p-6 flex-grow">
    <div class="max-w-6xl mx-auto bg-white p-6 rounded-lg shadow-lg mt-4">

      <!-- Header -->
      <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800">Daftar Foto</h1>
        <a href="{{ route('foto.create') }}" class="px-4 py-2 rounded bg-blue-600 hover:bg-blue-700 text-white transition">
          + Tambah Foto
        </a>
      </div>

      <!-- Tombol Kembali -->
      <div class="mb-4">
        <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center gap-2 px-4 py-2 bg-gray-300 hover:bg-gray-400 text-gray-800 rounded-lg transition">
          ← Kembali ke Admin
        </a>
      </div>

      <!-- Flash Messages -->
      @if(session('success'))
        <div class="mb-4 p-3 bg-green-200 text-green-800 rounded shadow">
          {{ session('success') }}
        </div>
      @endif

      <!-- Table -->
      <div class="overflow-x-auto">
        <table class="min-w-full border border-gray-300 text-gray-700">
          <thead class="bg-gray-100">
            <tr>
              <th class="p-3 border text-left">ID</th>
              <th class="p-3 border text-left">Album</th>
              <th class="p-3 border text-left">Foto</th>
              <th class="p-3 border text-left">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($fotos as $foto)
              <tr class="hover:bg-gray-50 transition">
                <td class="p-3 border">{{ $foto->id }}</td>
                <td class="p-3 border">{{ $foto->album->title ?? 'Tidak ada album' }}</td>
                <td class="p-3 border">
                  <img src="{{ asset('storage/' . $foto->image_path) }}" alt="Foto" class="w-24 h-24 object-cover rounded shadow">
                </td>
                <td class="p-3 border space-x-2">
                  <a href="{{ route('admin.foto.edit', $foto->id) }}"
                     class="inline-block bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600 transition">
                    Edit
                  </a>
                  <form action="{{ route('foto.destroy', $foto->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin hapus foto ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700 transition">
                      Hapus
                    </button>
                  </form>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="4" class="text-center p-4 text-gray-500">Belum ada foto yang ditambahkan.</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>

      <!-- Pagination -->
      <div class="mt-6">
        {{ $fotos->links() }}
      </div>

    </div>
  </main>

  <!-- Footer -->
  @include('partials.footer')

</body>
</html>
