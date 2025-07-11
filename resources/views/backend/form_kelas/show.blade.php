@extends('layouts.backend')

@section('content')
<div class="container mt-5"> {{-- Tambah jarak dari navbar --}}
    <div class="row justify-content-center">
        <div class="col-md-6"> {{-- Lebih ramping --}}
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white">
                    <h5 class="mb-0">Detail Data Form Kelas</h5>
                </div>

                <div class="card-body">
                   

                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <strong>Nama Guru:</strong><br>
                            {{ $form_kelas->guru->nama ?? '-' }}
                        </li>
                        <li class="list-group-item">
                            <strong>Nama Form:</strong><br>
                            {{ $form_kelas->nama_form }}
                        </li>
                        <li class="list-group-item">
                            <strong>Kelas:</strong><br>
                            {{ $form_kelas->kelas }}
                        </li>
                        <li class="list-group-item">
                            <strong>Deskripsi:</strong><br>
                            {{ $form_kelas->deskripsi ?? '-' }}
                        </li>
                        <li class="list-group-item">
                            <strong>Dibuat Pada:</strong><br>
                            {{ $form_kelas->created_at ? $form_kelas->created_at->format('d M Y, H:i') : '-' }}
                        </li>
                        <li class="list-group-item">
                            <strong>Terakhir Diubah:</strong><br>
                            {{ $form_kelas->updated_at ? $form_kelas->updated_at->format('d M Y, H:i') : '-' }}
                        </li>
                    </ul>

                    <div class="text-end mt-4">
                        <a href="{{ route('backend.form_kelas.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



<!-- catatan -->
  <!-- {{-- 
                        Format 'd M Y, H:i' artinya:
                        d = tanggal (01–31)
                        M = singkatan nama bulan (Jan, Feb, dst)
                        Y = tahun 4 digit
                        H = jam (00–23, format 24 jam)
                        i = menit (00–59)
                        Contoh hasil: 10 Jul 2025, 08:30
                    --}} -->