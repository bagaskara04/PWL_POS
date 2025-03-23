@extends('m_user/template')

@section('content')
<div class="container mt-5">
    <div class="row mb-4">
        <div class="col-lg-6">
            <h2 class="text-primary"><i class="bi bi-person"></i> Detail Pengguna</h2>
        </div>
        <div class="col-lg-6 text-end">
            <a class="btn btn-secondary" href="{{ route('m_user.index') }}">⬅ Kembali</a>
        </div>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-borderless">
                <tr>
                    <th class="text-muted">User ID</th>
                    <td>{{ $useri->user_id }}</td>
                </tr>
                <tr>
                    <th class="text-muted">Level</th>
                    <td>
                        <span class="badge bg-info">
                            {{ $useri->level->level_nama ?? 'Tidak Diketahui' }}
                        </span>
                    </td>
                </tr>
                <tr>
                    <th class="text-muted">Username</th>
                    <td>{{ $useri->username }}</td>
                </tr>
                <tr>
                    <th class="text-muted">Nama</th>
                    <td>{{ $useri->nama }}</td>
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection
