@extends('layouts.backend')

@section('content')
<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-10">
      <div class="card shadow-sm border-0">
        <div class="card-header bg-white">
          <div class="d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Data Form Kelas</h5>
            <a href="{{ route('backend.form_kelas.create') }}" class="btn btn-primary btn-sm">+ Tambah Form</a>
          </div>
        </div>

        <div class="card-body">
          @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{ session('success') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          @endif

          <div class="table-responsive">
            <table class="table table-striped align-middle">
              <thead class="table-light">
                <tr>
                  <th>No</th>
                  <th>Nama Guru</th>
                  <th>Nama Form</th>
                  <th>Kelas</th>
                  <th>Deskripsi</th>
                  <th class="text-nowrap">Aksi</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($data as $item)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->guru->nama ?? '-' }}</td>
                    <td>{{ $item->nama_form }}</td>
                    <td>{{ $item->kelas }}</td>
                    <td>{{ $item->deskripsi }}</td>
                    <td class="text-nowrap">
                      <form action="{{ route('backend.form_kelas.destroy', $item->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <a href="{{ route('backend.form_kelas.edit', $item->id) }}" class="btn btn-success btn-sm">Edit</a>
                        <a href="{{ route('backend.form_kelas.show', $item->id) }}" class="btn btn-warning btn-sm">Lihat</a>
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin mau hapus?')">Hapus</button>
                      </form>
                    </td>
                  </tr>
                @empty
                  <tr>
                    <td colspan="6" class="text-center">Belum ada data form kelas.</td>
                  </tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
        
      </div>
    </div>
  </div>
</div>
@endsection
