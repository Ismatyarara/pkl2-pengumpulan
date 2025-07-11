@extends('layouts.backend')

@section('content')
<div class="container mt-5"> {{-- kasih jarak dari navbar --}}
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white">
                    <h5 class="mb-0">Edit Data Tugas</h5>
                </div>

                <div class="card-body">
                    <form action="{{ route('backend.tugas.update', $tugas->id) }}" method="POST">
                        @csrf  
                        @method('PUT')

                        {{-- Form Kelas --}}
                        <div class="mb-3">
                            <label class="form-label">Form Kelas</label>
                            <select name="form_id" class="form-control" required>
                                <option value="">-- Pilih Form Kelas --</option>
                                @foreach ($form_kelas as $form)
                                    <option value="{{ $form->id }}" {{ $tugas->form_id == $form->id ? 'selected' : '' }}>
                                        {{ $form->nama_form }} - {{ $form->kelas }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Judul --}}
                        <div class="mb-3">
                            <label class="form-label">Judul</label>
                            <input type="text" name="judul" class="form-control" value="{{ old('judul', $tugas->judul) }}" required>
                        </div>

                        {{-- Deskripsi --}}
                        <div class="mb-3">
                            <label class="form-label">Deskripsi</label>
                            <textarea name="deskripsi" class="form-control" rows="3">{{ old('deskripsi', $tugas->deskripsi) }}</textarea>
                        </div>

                        {{-- Kelas --}}
                        <div class="mb-3">
                            <label class="form-label">Kelas</label>
                            <select name="kelas" class="form-control" required>
                                <option value="">-- Pilih Kelas --</option>
                                @php
                                    $kelasList = [
                                        'XII RPL 1','XII RPL 2','XII RPL 3',
                                        'XI RPL 1','XI RPL 2','XI RPL 3',
                                        'XII TKR 1','XI TKR 1','XI TKR 2',
                                        'XII TSM 1','XII TSM 2','XI TSM 1'
                                    ];
                                @endphp
                                @foreach ($kelasList as $kelas)
                                    <option value="{{ $kelas }}" {{ $tugas->kelas == $kelas ? 'selected' : '' }}>
                                        {{ $kelas }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Deadline --}}
                        <div class="mb-3">
                            <label class="form-label">Deadline</label>
                            <input type="datetime-local" name="deadline" class="form-control"
                                value="{{ old('deadline', \Carbon\Carbon::parse($tugas->deadline)->format('Y-m-d\TH:i')) }}" required>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('backend.tugas.index') }}" class="btn btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
