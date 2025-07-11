@extends('layouts.backend')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white">
                    <h5 class="mb-0">Detail Tugas</h5>
                </div>

                <div class="card-body">
                    <table class="table table-borderless">
                        <tr>
                            <th>Form Kelas</th>
                            <td>{{ $tugas->form->nama_form ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Judul</th>
                            <td>{{ $tugas->judul }}</td>
                        </tr>
                        <tr>
                            <th>Kelas</th>
                            <td>{{ $tugas->kelas }}</td>
                        </tr>
                        <tr>
                            <th>Deskripsi</th>
                            <td>{{ $tugas->deskripsi }}</td>
                        </tr>
                        <tr>
                            <th>Deadline</th>
                          <td>{{ date('d M Y, H:i', strtotime($tugas->deadline)) }}</td>
                        </tr>
                    </table>

                    <div class="d-flex justify-content-between mt-4">
                        <a href="{{ route('backend.tugas.index') }}" class="btn btn-secondary">Kembali</a>
                        <a href="{{ route('backend.tugas.edit', $tugas->id) }}" class="btn btn-primary">Edit Tugas</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
