@extends('layouts.backend')

@section('content')
<div class="container mt-5"> {{-- ← Tambah jarak dari navbar --}}
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white">
                    <h5 class="mb-0">Tambah Data Guru</h5>
                </div>

                <div class="card-body">
                    <form action="{{ route('backend.guru_profiles.store') }}" method="post">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">User</label>
                            <select name="user_id" class="form-control" required>
                                <option value="">-- Pilih User --</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">NIP</label>
                            <input type="text" class="form-control" name="nip" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Nama</label>
                            <input type="text" class="form-control" name="nama" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Mata Pelajaran</label>
                            <input type="text" class="form-control" name="mapel" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Telepon</label>
                            <input type="text" class="form-control" name="telepon">
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Alamat</label>
                            <textarea class="form-control" name="alamat" rows="3"></textarea>
                        </div>

                        <div class="text-end">
                            <a href="{{ route('backend.guru_profiles.index') }}" class="btn btn-outline-secondary">Batal</a>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
