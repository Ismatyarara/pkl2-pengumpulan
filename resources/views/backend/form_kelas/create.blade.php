@extends('layouts.backend')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Tambah Form Kelas</div>
                <div class="card-body">
                    <form action="{{ route('backend.form_kelas.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="guru_id" class="form-label">Guru</label>
                            <select name="guru_id" id="guru_id" class="form-control" required>
                                <option value="">-- Pilih Guru --</option>
                                @foreach ($guru as $guru)
                                    <option value="{{ $guru->id }}">{{ $guru->nama }} ({{ $guru->nip }})</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="nama_form" class="form-label">Nama Form</label>
                            <input type="text" name="nama_form" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea name="deskripsi" class="form-control" rows="3" required></textarea>
                        </div>
                        
                                <div class="mb-3">
                    <label class="form-label">Kelas</label>
                    <select name="kelas" class="form-control" required>
                        <option value="">-- Pilih Kelas --</option>
                        <option value="XII RPL 1">XII RPL 1</option>
                        <option value="XII RPL 2">XII RPL 2</option>
                        <option value="XII RPL 3">XII RPL 3</option>
                        <option value="XI RPL 1">XI RPL 1</option>
                        <option value="XI RPL 2">XI RPL 2</option>
                        <option value="XI RPL 3">XI RPL 3</option>
                        <option value="XII TKR 1">XII TKR 1</option>
                        <option value="XI TKR 1">XI TKR 1</option>
                        <option value="XI TKR 2">XI TKR 2</option>
                        <option value="XII TSM 1">XII TSM 1</option>
                        <option value="XII TSM 2">XII TSM 2</option>
                        <option value="XI TSM 1">XI TSM 1</option>
                    </select>
                    </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('backend.form_kelas.index') }}" class="btn btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
