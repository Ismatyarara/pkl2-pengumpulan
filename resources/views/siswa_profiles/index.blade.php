@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Data Siswa</div>

                <div class="card-body">
                    {{-- Notifikasi sukses --}}
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    {{-- Tombol Tambah --}}
                    <a href="{{ route('siswa_profiles.create') }}" class="btn btn-primary mb-3">Tambah siswa</a>

                    {{-- Tabel Data --}}
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>User</th>
                                <th>NIS</th>
                                <th>Kelas</th>
                                <th>Telepon</th>
                                <th>Alamat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no = 1; @endphp
                            @foreach ($data as $siswa)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $siswa->user->name ?? '-' }}</td>
                                <td>{{ $siswa->nis }}</td>
                                <td>{{ $siswa->kelas }}</td>
                                <td>{{ $siswa->telepon ?? '-' }}</td>
                                <td>{{ $siswa->alamat ?? '-' }}</td>
                                <td>
                                    <form action="{{ route('siswa_profiles.destroy', $siswa->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('siswa_profiles.edit', $siswa->id) }}" class="btn btn-success btn-sm">Edit</a>
                                        <a href="{{ route('siswa_profiles.show', $siswa->id) }}" class="btn btn-warning btn-sm">Show</a>
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            @if($data->isEmpty())
                            <tr>
                                <td colspan="7" class="text-center">Belum ada data siswa.</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
