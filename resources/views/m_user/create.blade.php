@extends('m_user/template')

@section('content')
<div class="container mt-5">
    <div class="row mb-4">
        <div class="col-lg-6">
            <h2 class="text-primary"><i class="bi bi-person-plus"></i> Tambah Pengguna</h2>
        </div>
        <div class="col-lg-6 text-end">
            <a class="btn btn-secondary" href="{{ route('m_user.index') }}">⬅ Kembali</a>
        </div>
    </div>

    <!-- Notifikasi kesalahan -->
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Oops!</strong> Input gagal, periksa kembali data Anda:
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- Form Tambah User -->
    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('m_user.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="username" class="form-label"><strong>Username</strong></label>
                    <input type="text" name="username" id="username" class="form-control" placeholder="Masukkan Username" required>
                </div>

                <div class="mb-3">
                    <label for="level_id" class="form-label"><strong>Level ID</strong></label>
                    <input type="text" name="level_id" id="level_id" class="form-control" placeholder="Masukkan Level ID" required>
                </div>

                <div class="mb-3">
                    <label for="nama" class="form-label"><strong>Nama Lengkap</strong></label>
                    <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan Nama" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label"><strong>Password</strong></label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan Password" required>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-primary"><i class="bi bi-check-lg"></i> Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
