@extends('layouts.backend')

@section('title', 'Daftar Tugas Projek Akhir')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-body">

            <h1 class="mb-4">Daftar Tugas Projek Akhir</h1>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <a href="{{ route('backend.tugas_projek_akhir.create') }}" class="btn btn-primary mb-3">
                + Tambah Tugas
            </a>

            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Pembimbing</th>
                            <th>Deadline</th>
                            <th>Status</th>
                            <th width="150px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($projects as $index => $project)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $project->judul }}</td>
                                <td>{{ $project->pembimbing->name ?? '-' }}</td>
                                <td>{{ \Carbon\Carbon::parse($project->deadline)->format('d-m-Y H:i') }}</td>
                                <td>
                                    <span class="badge bg-info text-dark text-capitalize">
                                        {{ $project->status }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('backend.tugas_projek_akhir.edit', $project->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('backend.tugas_projek_akhir.destroy', $project->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger" type="submit">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">Belum ada data Tugas Projek Akhir.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
@endsection
