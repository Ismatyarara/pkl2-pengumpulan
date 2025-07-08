@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
              <div class="card-header">Detail Data Guru</div>
              <div class="card-body">
                
                <div class="mb-3">
                    <strong>Nama User:</strong>
                    {{ $guru->user->name }} ({{ $guru->user->email }})
                </div>

                <div class="mb-3">
                    <strong>NIP:</strong>
                    {{ $guru->nip }}
                </div>

                <div class="mb-3">
                    <strong>Mata Pelajaran:</strong>
                    {{ $guru->mapel }}
                </div>

                <div class="mb-3">
                    <strong>Telepon:</strong>
                    {{ $guru->telepon ?? '-' }}
                </div>

                <div class="mb-3">
                    <strong>Alamat:</strong>
                    {{ $guru->alamat ?? '-' }}
                </div>

                <a href="{{ route('guru_profiles.index') }}" class="btn btn-secondary">Kembali</a>
              </div>
            </div>
        </div>
    </div>
</div>
@endsection
