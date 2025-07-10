@extends('layouts.backend')

@section('content')
<div class="container mt-5"> {{-- Tambah margin top di sini --}}
  <div class="row justify-content-center">
    <div class="col-md-10">
      <div class="card">
        <div class="card-header">Data User</div>

        <div class="card-body">
          {{-- Notifikasi sukses --}}
          @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{ session('success') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          @endif

          {{-- Tombol Tambah dan Judul --}}
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="mb-0">Data User</h4>
            <a href="{{ route('backend.user.create') }}" class="btn btn-primary">Tambah User</a>
          </div>

          {{-- Tabel Data --}}
          <table class="table table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Role</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($data as $user)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $user->name }}</td>
                  <td>{{ $user->email }}</td>
                  <td>{{ $user->role }}</td>
                  <td>
                    <form action="{{ route('backend.user.destroy', $user->id) }}" method="POST" style="display: inline-block;">
                      @csrf
                      @method('DELETE')
                      <a href="{{ route('backend.user.edit', $user->id) }}" class="btn btn-success btn-sm">Edit</a>
                      <a href="{{ route('backend.user.show', $user->id) }}" class="btn btn-warning btn-sm">Lihat</a>
                      <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                    </form>
                  </td>
                </tr>
              @empty
                <tr>
                  <td colspan="5" class="text-center">Belum ada data user.</td>
                </tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
