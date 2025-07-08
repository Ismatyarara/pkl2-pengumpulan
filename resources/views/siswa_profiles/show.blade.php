@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
              <div class="card-header">Detail Data Siswa</div>
              <div class="card-body">
                
                <div class="mb-3">
                    <strong>Nama User:</strong>
                    {{ $siswa->user->name }} ({{ $siswa->user->email }})
                </div>

                <div class="mb-3">
                    <strong>NIP:</strong>
                    {{ $siswa->nis }}
                </div>

                <div class="mb-3">
                    <strong>Kelas:</strong>
                    {{ $siswa->kelas }}
                </div>

                <div class="mb-3">
                    <strong>Telepon:</strong>
                    {{ $siswa->telepon }}
                </div>

                <div class="mb-3">
                    <strong>Alamat:</strong>
                    {{ $siswa->alamat }}
                </div>

                <a href="{{ route('siswa_profiles.index') }}" class="btn btn-secondary">Kembali</a>
              </div>
            </div>
        </div>
    </div>
</div>
@endsection
