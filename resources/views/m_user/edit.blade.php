@extends('m_user/template')

@section('content')
<div class="container mt-5">
    <div class="row mb-4">
        <div class="col-lg-6">
            <h2 class="text-primary">Edit Pengguna</h2>
        </div>
        <div class="col-lg-6 text-end">
            <a class="btn btn-secondary" href="{{ route('m_user.index') }}">⬅ Kembali</a>
        </div>
    </div>

    <!-- Notifikasi Error -->
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Oops!</strong> Terjadi kesalahan:<br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- Form Edit -->
    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('m_user.update', $useri->user_id) }}" method="post">
                @csrf
                @method('PUT')
                
                <div class="mb-3">
                    <label class="form-label"><strong>User ID</strong></label>
                    <input type="text" name="user_id" value="{{ $useri->user_id }}" class="form-control" readonly>
                </div>

                <div class="mb-3">
                    <label class="form-label"><strong>Level ID</strong></label>
                    <input type="text" name="level_id" value="{{ $useri->level_id }}" class="form-control" placeholder="Masukkan Level ID">
                </div>

                <div class="mb-3">
                    <label class="form-label"><strong>Username</strong></label>
                    <input type="text" name="username" value="{{ $useri->username }}" class="form-control" placeholder="Masukkan Username">
                </div>

                <div class="mb-3">
                    <label class="form-label"><strong>Nama</strong></label>
                    <input type="text" name="nama" value="{{ $useri->nama }}" class="form-control" placeholder="Masukkan Nama Lengkap">
                </div>

                <div class="mb-3">
                    <strong>Password:</strong>
                    <input type="password" name="password" value="{{ $useri->password }}" class="form-control"
                        placeholder="Masukkan password">
                </div>
            </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-primary"><i class="bi bi-check-lg"></i> Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
