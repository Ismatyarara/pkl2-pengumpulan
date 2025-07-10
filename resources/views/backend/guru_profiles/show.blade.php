@extends('layouts.backend')

@section('content')
<div class="container mt-5"> {{-- Tambah jarak dari navbar --}}
    <div class="row justify-content-center">
        <div class="col-md-6"> {{-- Lebih ramping --}}
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white">
                    <h5 class="mb-0">Detail Data Guru</h5>
                </div>

                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <strong>Nama User:</strong><br>
                            {{ $guru->user->name }} ({{ $guru->user->email }})
                        </li>
                        <li class="list-group-item">
                            <strong>NIP:</strong><br>
                            {{ $guru->nip }}
                        </li>
                        <li class="list-group-item">
                            <strong>Mata Pelajaran:</strong><br>
                            {{ $guru->mapel }}
                        </li>
                        <li class="list-group-item">
                            <strong>Telepon:</strong><br>
                            {{ $guru->telepon }}
                        </li>
                        <li class="list-group-item">
                            <strong>Alamat:</strong><br>
                            {{ $guru->alamat }}
                        </li>
                    </ul>

                    <div class="text-end mt-4">
                        <a href="{{ route('backend.guru_profiles.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
