@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
              <div class="card-header">Tambah Data Guru</div>
              <div class="card-body">

              <form action="{{ route('guru_profiles.store') }}" method="post">
                @csrf  

                <div class="form-group">
                    <label>User</label>
                    <select name="user_id" class="form-control" required>
                        <option value="">-- Pilih User --</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                        @endforeach
                    </select>
                </div><br>

                <div class="form-group">
                    <label>NIP</label>
                    <input type="text" class="form-control" name="nip" required>
                </div><br>

                <div class="form-group">
                    <label>Mata Pelajaran</label>
                    <input type="text" class="form-control" name="mapel" required>
                </div><br>

                <div class="form-group">
                    <label>Telepon</label>
                    <input type="text" class="form-control" name="telepon">
                </div><br>

                <div class="form-group">
                    <label>Alamat</label>
                    <textarea class="form-control" name="alamat" rows="3"></textarea>
                </div><br>

                <button type="submit" class="btn btn-primary">Simpan</button>
              </form>

              </div>
            </div>
        </div>
    </div>
</div>
@endsection
