@extends('layouts.backend')

@section('content')
<div class="container mt-5"> {{-- Tambahkan jarak dari navbar --}}
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Edit User</div>

        <div class="card-body">
          <form action="{{ route('backend.user.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group mb-3">
              <label>Nama</label>
              <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
            </div>

            <div class="form-group mb-3">
              <label>Email</label>
              <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
            </div>

            <div class="form-group mb-3">
              <label>Password (Kosongkan jika tidak diubah)</label>
              <input type="password" name="password" class="form-control">
            </div>

            <div class="form-group mb-3">
              <label>Role</label>
              <select name="role" class="form-control" required>
                <option value="">-- Pilih Role --</option>
                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="guru" {{ $user->role == 'guru' ? 'selected' : '' }}>Guru</option>
                <option value="murid" {{ $user->role == 'murid' ? 'selected' : '' }}>Murid</option>
              </select>
            </div>

            <div class="d-flex justify-content-between">
              <a href="{{ route('backend.user.index') }}" class="btn btn-secondary">Batal</a>
              <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
