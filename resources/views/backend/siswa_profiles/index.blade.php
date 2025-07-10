@extends('layouts.backend')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Data Siswa</h5>
                    <a href="{{ route('backend.siswa_profiles.create') }}" class="btn btn-primary btn-sm">+ Tambah Siswa</a>
                </div>

                <div class="card-body">
                    {{-- Notifikasi sukses --}}
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    {{-- Tabel --}}
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>No</th>
                                    <th>User</th>
                                    <th>NIS</th>
                                    <th>Kelas</th>
                                    <th>Telepon</th>
                                    <th>Alamat</th>
                                    <th class="text-nowrap">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($data as $siswa)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $siswa->user->name }}</td>
                                        <td>{{ $siswa->nis }}</td>
                                        <td>{{ $siswa->kelas }}</td>
                                        <td>{{ $siswa->telepon ?? '-' }}</td>
                                        <td>{{ $siswa->alamat ?? '-' }}</td>
                                        <td class="text-nowrap">
                                            <form action="{{ route('backend.siswa_profiles.destroy', $siswa->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                                                @csrf
                                                @method('DELETE')
                                                <a href="{{ route('backend.siswa_profiles.edit', $siswa->id) }}" class="btn btn-sm btn-success">Edit</a>
                                                <a href="{{ route('backend.siswa_profiles.show', $siswa->id) }}" class="btn btn-sm btn-warning">Lihat</a>
                                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center">Belum ada data siswa.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div> {{-- end table --}}
                </div> {{-- end card-body --}}
            </div>
        </div>
    </div>
</div>
@endsection
