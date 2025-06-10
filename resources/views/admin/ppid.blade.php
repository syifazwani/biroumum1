@extends('layouts.app')

@section('content')
<div class="container">

    @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <ul class="nav nav-tabs">
      @foreach ($tabs as $slug => $title)
        <li class="nav-item">
          <a class="nav-link {{ $loop->first ? 'active' : '' }}" data-bs-toggle="tab" href="#{{ $slug }}">{{ $title }}</a>
        </li>
      @endforeach
    </ul>

    <div class="tab-content mt-3">
      @foreach ($tabs as $slug => $title)
        <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="{{ $slug }}">
          <h4>{{ $title }}</h4>

          <!-- Tombol tambah data baru -->
          <button class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#modalAdd{{ $slug }}">Tambah Baru</button>

          <table class="table table-bordered">
            <thead>
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
                      <a href="{{ asset('storage/' . $item->path) }}" target="_blank">Lihat File</a>
                    @else
                      Tidak ada file
                    @endif
                  </td>
                  <td>{{ $item->created_at }}</td>
                  <td>{{ $item->updated_at }}</td>
                  <td>
                    <a href="{{ route('admin.ppid.edit', [$slug, $item->id]) }}" class="btn btn-sm btn-primary">Edit</a>

                    <form action="{{ route('admin.ppid.destroy', [$slug, $item->id]) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Yakin ingin hapus data ini?')">
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-sm btn-danger">Hapus</button>
                    </form>

                  </td>
                </tr>
              @empty
                <tr><td colspan="6" class="text-center">Data kosong.</td></tr>
              @endforelse
            </tbody>
          </table>
        </div>

        <!-- Modal tambah data baru per tab -->
        <div class="modal fade" id="modalAdd{{ $slug }}" tabindex="-1" aria-labelledby="modalAddLabel{{ $slug }}" aria-hidden="true">
          <div class="modal-dialog">
            <form action="{{ route('admin.ppid.store', $slug) }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="modalAddLabel{{ $slug }}">Tambah Baru - {{ $title }}</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="mb-3">
                    <label for="nama_file_{{ $slug }}" class="form-label">Nama File</label>
                    <input type="text" name="nama_file" id="nama_file_{{ $slug }}" class="form-control" required>
                  </div>
                  <div class="mb-3">
                    <label for="file_{{ $slug }}" class="form-label">File</label>
                    <input type="file" name="file" id="file_{{ $slug }}" class="form-control" required>
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

</div>
@endsection
