@extends('layouts.backend')

@section('content')
<div class="container mt-5"> {{-- kasih jarak dari navbar --}}
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white">
                    <h5 class="mb-0">Edit Data Siswa</h5>
                </div>

                <div class="card-body">
                    <form action="{{ route('backend.siswa_profiles.update', $siswa->id) }}" method="POST">
                        @csrf  
                        @method('PUT')

                        {{-- User --}}
                        <div class="mb-3">
                            <label class="form-label">User</label>
                            <select name="user_id" class="form-control" required>
                                <option value="">-- Pilih User --</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}" {{ $siswa->user_id == $user->id ? 'selected' : '' }}>
                                        {{ $user->name }} ({{ $user->email }})
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- NIS --}}
                        <div class="mb-3">
                            <label class="form-label">NIS</label>
                            <input type="text" name="nis" class="form-control" value="{{ old('nis', $siswa->nis) }}" required>
                        </div>

                        {{-- Kelas --}}
                        <div class="mb-3">
                            <label class="form-label">Kelas</label>
                            <select name="kelas" class="form-control" required>
                                <option value="">-- Pilih Kelas --</option>
                                @php
                                    $kelasList = [
                                        'XII RPL 1','XII RPL 2','XII RPL 3',
                                        'XI RPL 1','XI RPL 2','XI RPL 3',
                                        'XII TKR 1','XI TKR 1','XI TKR 2',
                                        'XII TSM 1','XII TSM 2','XI TSM 1'
                                    ];
                                @endphp
                                @foreach ($kelasList as $kelas)
                                    <option value="{{ $kelas }}" {{ $siswa->kelas == $kelas ? 'selected' : '' }}>{{ $kelas }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Telepon --}}
                        <div class="mb-3">
                            <label class="form-label">Telepon</label>
                            <input type="text" name="telepon" class="form-control" value="{{ old('telepon', $siswa->telepon) }}">
                        </div>

                        {{-- Alamat --}}
                        <div class="mb-3">
                            <label class="form-label">Alamat</label>
                            <textarea name="alamat" class="form-control" rows="3">{{ old('alamat', $siswa->alamat) }}</textarea>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('backend.siswa_profiles.index') }}" class="btn btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
