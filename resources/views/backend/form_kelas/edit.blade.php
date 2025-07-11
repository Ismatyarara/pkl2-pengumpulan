@extends('layouts.backend')

@section('content')
<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card shadow-sm border-0">
        <div class="card-header bg-white">
          <h5 class="mb-0">Edit Form Kelas</h5>
        </div>

        <div class="card-body">
          @if ($errors->any())
            <div class="alert alert-danger">
              <ul class="mb-0">
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif

          <form action="{{ route('backend.form_kelas.update', $form_kelas->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="guru_id" class="form-label">Nama Guru</label>
                <select name="guru_id" id="guru_id" class="form-select">
                    @foreach($guruList as $guru)
                    <option value="{{ $guru->id }}" {{ $form_kelas->guru_id == $guru->id ? 'selected' : '' }}>
                        {{ $guru->nama }}
                    </option>
                    @endforeach
                </select>
                </div>


            <div class="mb-3">
              <label for="nama_form" class="form-label">Nama Form</label>
              <input type="text" name="nama_form" id="nama_form" 
                     class="form-control" 
                     value="{{ old('nama_form', $form_kelas->nama_form) }}" required>
            </div>

            <div class="mb-3">
              <label for="kelas" class="form-label">Kelas</label>
              <input type="text" name="kelas" id="kelas" 
                     class="form-control" 
                     value="{{ old('kelas', $form_kelas->kelas) }}" required>
            </div>

            <div class="mb-3">
              <label for="deskripsi" class="form-label">Deskripsi</label>
              <textarea name="deskripsi" id="deskripsi" rows="3" class="form-control">{{ old('deskripsi', $form_kelas->deskripsi) }}</textarea>
            </div>

            <div class="d-flex justify-content-end">
              <a href="{{ route('backend.form_kelas.index') }}" class="btn btn-secondary me-2">Kembali</a>
              <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
