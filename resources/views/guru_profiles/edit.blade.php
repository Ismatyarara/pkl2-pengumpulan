@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
              <div class="card-header">Edit Data Guru</div>
              <div class="card-body">

              <form action="{{ route('guru_profiles.update', $guru->id) }}" method="post">
                @csrf  
                @method('PUT')

                <div class="form-group">
                    <label>User</label>
                    <select name="user_id" class="form-control" required>
                        <option value="">-- Pilih User --</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}" @selected($user->id == $guru->user_id)>
                                {{ $user->name }} ({{ $user->email }})
                            </option>
                        @endforeach
                    </select>
                </div><br>

                <div class="form-group">
                    <label>NIP</label>
                    <input type="text" class="form-control" name="nip" value="{{ $guru->nip }}" required>
                </div><br>

                <div class="form-group">
                    <label>Mata Pelajaran</label>
                    <input type="text" class="form-control" name="mapel" value="{{ $guru->mapel }}" required>
                </div><br>

                <div class="form-group">
                    <label>Telepon</label>
                    <input type="text" class="form-control" name="telepon" value="{{ $guru->telepon }}">
                </div><br>

                <div class="form-group">
                    <label>Alamat</label>
                    <textarea class="form-control" name="alamat" rows="3">{{ $guru->alamat }}</textarea>
                </div><br>

                <button type="submit" class="btn btn-primary">Update</button>
              </form>

              </div>
            </div>
        </div>
    </div>
</div>
@endsection
