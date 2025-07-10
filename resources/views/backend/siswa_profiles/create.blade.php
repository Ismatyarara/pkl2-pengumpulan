@extends('layouts.backend')

@section('content')
<div class="container mt-5"> {{-- Jarak dari navbar --}}
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card shadow-sm border-0">
        <div class="card-header bg-white">
          <h5 class="mb-0">Tambah Data Siswa</h5>
        </div>

        <div class="card-body">
          <form action="{{ route('backend.siswa_profiles.store') }}" method="POST">
            @csrf

            {{-- User --}}
            <div class="mb-3">
              <label class="form-label">User</label>
              <select name="user_id" class="form-control" required>
                <option value="">-- Pilih User --</option>
                @foreach ($users as $user)
                  <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                @endforeach
              </select>
            </div>

            {{-- NIS --}}
            <div class="mb-3">
              <label class="form-label">NIS</label>
              <input type="text" name="nis" class="form-control" required>
            </div>

            {{-- Kelas --}}
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

            {{-- Telepon --}}
            <div class="mb-3">
              <label class="form-label">Telepon</label>
              <input type="text" name="telepon" class="form-control">
            </div>

            {{-- Alamat --}}
            <div class="mb-3">
              <label class="form-label">Alamat</label>
              <textarea name="alamat" class="form-control" rows="3"></textarea>
            </div>

            {{-- Tombol --}}
            <div class="d-flex justify-content-end">
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
          </form>
        </div> {{-- end card-body --}}
      </div>
    </div>
  </div>
</div>
@endsection
