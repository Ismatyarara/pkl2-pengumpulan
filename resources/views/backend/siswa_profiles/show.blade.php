@extends('layouts.backend')

@section('content')
<div class="container mt-5"> {{-- Tambah jarak dari navbar --}}
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white">
                    <h5 class="mb-0">Detail Data Siswa</h5>
                </div>
                <div class="card-body">

                    <div class="mb-3">
                        <strong>Nama User:</strong><br>
                        {{ $siswa->user->name }} ({{ $siswa->user->email }})
                    </div>

                    <div class="mb-3">
                        <strong>NIS:</strong><br>
                        {{ $siswa->nis }}
                    </div>

                    <div class="mb-3">
                        <strong>Kelas:</strong><br>
                        {{ $siswa->kelas }}
                    </div>

                    <div class="mb-3">
                        <strong>Telepon:</strong><br>
                        {{ $siswa->telepon ?? '-' }}
                    </div>

                    <div class="mb-3">
                        <strong>Alamat:</strong><br>
                        {{ $siswa->alamat ?? '-' }}
                    </div>

                    <div class="text-end">
                        <a href="{{ route('backend.siswa_profiles.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
