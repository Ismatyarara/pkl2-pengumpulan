@extends('layouts.backend')

@section('content')
<div class="container mt-4">
  <div class="card shadow-sm border-0">
    <div class="card-header bg-white">
      <h5 class="mb-0">Tambah Tugas</h5>
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

      <form action="{{ route('backend.tugas.store') }}" method="POST">
        @csrf

        <div class="mb-3">
          <label for="form_id" class="form-label">Form Kelas</label>
          <select name="form_id" id="form_id" class="form-select" required>
            <option value="">-- Pilih Form Kelas --</option>
            @foreach ($form_kelas as $form)
              <option value="{{ $form->id }}" @selected(old('form_id') == $form->id)>
                {{ $form->nama_form }} - {{ $form->kelas }}
              </option>
            @endforeach
          </select>
        </div>

        <div class="mb-3">
          <label for="judul" class="form-label">Judul Tugas</label>
          <input type="text" name="judul" id="judul" class="form-control" required value="{{ old('judul') }}">
        </div>

        <div class="mb-3">
          <label for="deskripsi" class="form-label">Deskripsi</label>
          <textarea name="deskripsi" id="deskripsi" class="form-control" rows="4">{{ old('deskripsi') }}</textarea>
        </div>

        <div class="mb-3">
          <label for="kelas" class="form-label">Kelas</label>
          <select name="kelas" id="kelas" class="form-select" required>
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

        <div class="mb-3">
          <label for="deadline" class="form-label">Deadline</label>
          <input type="datetime-local" name="deadline" id="deadline" class="form-control" required value="{{ old('deadline') }}">
        </div>

        <div class="text-end">
          <a href="{{ route('backend.tugas.index') }}" class="btn btn-secondary">Kembali</a>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
