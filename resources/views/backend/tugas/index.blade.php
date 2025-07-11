@extends('layouts.backend')

@section('content')
<div class="container mt-4">
  <div class="card shadow-sm border-0">
    <div class="card-header bg-white d-flex justify-content-between align-items-center">
      <h5 class="mb-0">Data Tugas</h5>
      <a href="{{ route('backend.tugas.create') }}" class="btn btn-primary btn-sm">+ Tambah Tugas</a>
    </div>

    <div class="card-body">
      @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif

      <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
          <thead class="table-light">
            <tr>
              <th>No</th>
              <th>Form Kelas</th>
              <th>Judul</th>
              <th>Kelas</th>
              <th>Deskripsi</th>
              <th>Deadline</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @forelse($data as $item)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->form->nama_form ?? '-' }}</td>
                <td>{{ $item->judul }}</td>
                <td>{{ $item->kelas }}</td>
                <td>{{ $item->deskripsi }}</td>
                <td>{{ \Carbon\Carbon::parse($item->deadline)->format('d M Y, H:i') }}</td>
                <td class="text-nowrap">
                  <a href="{{ route('backend.tugas.edit', $item->id) }}" class="btn btn-success btn-sm">Edit</a>
                  <a href="{{ route('backend.tugas.show', $item->id) }}" class="btn btn-sm btn-warning">Lihat</a>
                  <form action="{{ route('backend.tugas.destroy', $item->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin mau hapus?')">Hapus</button>
                  </form>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="7" class="text-center text-muted">Belum ada tugas.</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
