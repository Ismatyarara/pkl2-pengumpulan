@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Data Guru</div>

                <div class="card-body">
                    {{-- Notifikasi sukses --}}
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    {{-- Tombol Tambah --}}
                    <a href="{{ route('guru_profiles.create') }}" class="btn btn-primary mb-3">Tambah Guru</a>

                    {{-- Tabel Data --}}
                    <table class="table table-striped">
                        <thead>
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
                            @php $no = 1; @endphp
                            @foreach ($data as $guru)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $guru->user->name ?? '-' }}</td>
                                <td>{{ $guru->nip }}</td>
                                <td>{{ $guru->mapel }}</td>
                                <td>{{ $guru->telepon ?? '-' }}</td>
                                <td>{{ $guru->alamat ?? '-' }}</td>
                                <td>
                                    <form action="{{ route('guru_profiles.destroy', $guru->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('guru_profiles.edit', $guru->id) }}" class="btn btn-success btn-sm">Edit</a>
                                        <a href="{{ route('guru_profiles.show', $guru->id) }}" class="btn btn-warning btn-sm">Show</a>
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            @if($data->isEmpty())
                            <tr>
                                <td colspan="7" class="text-center">Belum ada data guru.</td>
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
