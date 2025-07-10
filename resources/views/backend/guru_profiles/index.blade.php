@extends('layouts.backend')

@section('content')
<div class="container mt-5"> {{-- Jarak dari navbar --}}
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white">
                    <h5 class="mb-0">Data Guru</h5>
                </div>

                <div class="card-body">
                    {{-- Notifikasi sukses --}}
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    {{-- Tombol Tambah --}}
                    <div class="mb-3 text-end">
                        <a href="{{ route('backend.guru_profiles.create') }}" class="btn btn-primary btn-sm">+ Tambah Guru</a>
                    </div>

                    {{-- Tabel Data --}}
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>No</th>
                                    <th>User</th>
                                    <th>NIP</th>
                                    <th>Mapel</th>
                                    <th>Telepon</th>
                                    <th>Alamat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($data as $index => $guru)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $guru->user->name ?? '-' }}</td>
                                        <td>{{ $guru->nip }}</td>
                                        <td>{{ $guru->mapel }}</td>
                                        <td>{{ $guru->telepon ?? '-' }}</td>
                                        <td>{{ $guru->alamat ?? '-' }}</td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('backend.guru_profiles.show', $guru->id) }}" class="btn btn-warning btn-sm">Lihat</a>
                                                <a href="{{ route('backend.guru_profiles.edit', $guru->id) }}" class="btn btn-success btn-sm">Edit</a>
                                                <form action="{{ route('backend.guru_profiles.destroy', $guru->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center">Belum ada data guru.</td>
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
