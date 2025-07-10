@extends('layouts.backend')

@section('content')
<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card border-0 shadow-sm">
        <div class="card-header bg-white">
          <h5 class="mb-0">Detail User</h5>
        </div>

        <div class="card-body">
          <table class="table">
            <tr>
              <th width="150">Nama</th>
              <td>: {{ $user->name }}</td>
            </tr>
            <tr>
              <th>Email</th>
              <td>: {{ $user->email }}</td>
            </tr>
            <tr>
              <th>Role</th>
              <td>: <strong class="text-capitalize">{{ $user->role }}</strong></td>
            </tr>
          </table>

          <div class="text-start mt-4">
            <a href="{{ route('backend.user.index') }}" class="btn btn-sm btn-outline-secondary">
              ← Kembali
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
