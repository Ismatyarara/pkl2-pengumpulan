@extends('layouts.backend')

@section('title', 'Tambah Anggota Proyek')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-white">
            <h5 class="mb-0">Tambah Anggota Proyek</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('backend.proyekanggota.store') }}" method="POST">
                @csrf

                <!-- Pilih Proyek -->
                <div class="mb-3">
                    <label for="proyek_id" class="form-label">Pilih Proyek</label>
                    <select name="proyek_id" id="proyek_id" class="form-select" required>
                        <option value="">-- Pilih Proyek --</option>
                        @foreach ($projek as $item)
                            <option value="{{ $item->id }}">{{ $item->judul }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Pilih Murid -->
                <div class="mb-3">
                    <label for="murid_id" class="form-label">Pilih Murid</label>
                    <select name="murid_id" id="murid_id" class="form-select" required>
                        <option value="">-- Pilih Murid --</option>
                        @foreach ($murid as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Peran -->
                <div class="mb-3">
                    <label for="peran" class="form-label">Peran</label>
                    <input type="text" name="peran" id="peran" class="form-control" placeholder="Contoh: Ketua" required>
                </div>

                <!-- Tombol Submit -->
                <div class="d-flex justify-content-end">
                    <a href="{{ route('backend.proyekanggota.index') }}" class="btn btn-secondary me-2">Kembali</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection
