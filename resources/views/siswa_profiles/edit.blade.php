@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
              <div class="card-header">Update Data Siswa</div>
              <div class="card-body">
              <form action="{{ route('siswa_profiles.update', $siswa->id) }}" method="post">
                @csrf  
                @method('PUT')

                <div class="form-group">
                    <label>User</label>
                    <select name="user_id" class="form-control" required>
                        <option value="">-- Pilih User --</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}" {{ $siswa->user_id == $user->id ? 'selected' : '' }}>
                                {{ $user->name }} ({{ $user->email }})
                            </option>
                        @endforeach
                    </select>
                </div><br>

                <div class="form-group">
                    <label>NIS</label>
                    <input type="text" class="form-control" name="nis" value="{{ old('nis', $siswa->nis) }}" required>
                </div><br>

                <div class="form-group">
                    <label>Kelas</label>
                    <select class="form-control" name="kelas" required>
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
                </div><br>

                <div class="form-group">
                    <label>Telepon</label>
                    <input type="text" class="form-control" name="telepon" value="{{ old('telepon', $siswa->telepon) }}">
                </div><br>

                <div class="form-group">
                    <label>Alamat</label>
                    <textarea class="form-control" name="alamat" rows="3" required>{{ old('alamat', $siswa->alamat) }}</textarea>
                </div><br>

                <button type="submit" class="btn btn-primary">Update</button>
              </form>
              </div>
            </div>
        </div>
    </div>
</div>
@endsection
