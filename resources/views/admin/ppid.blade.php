<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Manajemen PPID - Biro Umum DKI Jakarta</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 text-black flex flex-col min-h-screen" style="background-image: url('{{ asset('img/batik.jpg') }}'); background-size: cover; background-position: center;">
  <div class="flex flex-col min-h-screen bg-white/95">

    @include('partials.navbar')

    <main class="container mx-auto px-6 py-10">
      <h1 class="text-3xl font-bold text-center text-[#0077b6] mb-6">Manajemen Dokumen PPID</h1>

      @if(session('success'))
        <div class="alert alert-success text-center">{{ session('success') }}</div>
      @endif

      {{-- Nav Tabs --}}
      <ul class="nav nav-tabs" id="ppidTabs" role="tablist">
        @foreach ($tabs as $slug => $title)
          <li class="nav-item" role="presentation">
            <button class="nav-link {{ $loop->first ? 'active' : '' }}" id="{{ $slug }}-tab" data-bs-toggle="tab" data-bs-target="#{{ $slug }}" type="button" role="tab">
              {{ $title }}
            </button>
          </li>
        @endforeach
      </ul>

      <div class="tab-content mt-4" id="ppidTabsContent">
        @foreach ($tabs as $slug => $title)
          <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="{{ $slug }}" role="tabpanel">
            <div class="d-flex justify-between align-items-center mb-3">
              <h2 class="text-xl font-semibold text-gray-800">{{ $title }}</h2>
              <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalAdd{{ $slug }}">+ Tambah Baru</button>
            </div>

            <div class="overflow-auto">
              <table class="table table-bordered table-striped align-middle bg-white">
                <thead class="table-light">
                  <tr>
                    <th>No</th>
                    <th>Nama File</th>
                    <th>File</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse($data[$slug] as $i => $item)
                    <tr>
                      <td>{{ $i+1 }}</td>
                      <td>{{ $item->nama_file }}</td>
                      <td>
                        @if($item->path)
                          <a href="{{ asset('storage/' . $item->path) }}" target="_blank" class="text-blue-600">Lihat File</a>
                        @else
                          <span class="text-muted">Tidak ada file</span>
                        @endif
                      </td>
                      <td>{{ $item->created_at }}</td>
                      <td>{{ $item->updated_at }}</td>
                      <td>
                        <a href="{{ route('admin.ppid.edit', [$slug, $item->id]) }}" class="btn btn-sm btn-primary mb-1">Edit</a>
                        <form action="{{ route('admin.ppid.destroy', [$slug, $item->id]) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Yakin ingin hapus data ini?')">
                          @csrf
                          @method('DELETE')
                          <button class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                      </td>
                    </tr>
                  @empty
                    <tr>
                      <td colspan="6" class="text-center text-muted">Data kosong.</td>
                    </tr>
                  @endforelse
                </tbody>
              </table>
            </div>
          </div>

          {{-- Modal Tambah --}}
          <div class="modal fade" id="modalAdd{{ $slug }}" tabindex="-1" aria-labelledby="modalAddLabel{{ $slug }}" aria-hidden="true">
            <div class="modal-dialog">
              <form action="{{ route('admin.ppid.store', $slug) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="modalAddLabel{{ $slug }}">Tambah Baru - {{ $title }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                  </div>
                  <div class="modal-body">
                    <div class="mb-3">
                      <label class="form-label">Nama File</label>
                      <input type="text" name="nama_file" class="form-control" required>
                    </div>
                    <div class="mb-3">
                      <label class="form-label">File</label>
                      <input type="file" name="file" class="form-control" required>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        @endforeach
      </div>
    </main>

    @include('partials.footer')
  </div>

  {{-- Script Bootstrap --}}
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
