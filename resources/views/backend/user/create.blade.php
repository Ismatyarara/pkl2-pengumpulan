@extends('layouts.backend')

@section('content')
<div class="container mt-5"> {{-- Tambahkan margin-top agar tidak nempel navbar --}}
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Tambah User</div>

        <div class="card-body">
          <form action="{{ route('user.store') }}" method="POST">
            @csrf

            <div class="mb-3">
              <label for="name" class="form-label">Nama</label>
              <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" name="email" required>
            </div>

            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" id="password" name="password" required>
            </div>

                <div class="mb-3">
                <label for="role" class="form-label">Role</label>
                <select name="role" id="role" class="form-control" required>
                    <option value="">-- Pilih Role --</option
                    <option value="guru">Guru</option>
                    <option value="murid">Murid</option>
                </select>
                </div>


            <button type="submit" class="btn btn-primary">Simpan</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
