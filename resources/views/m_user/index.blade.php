{{-- @extends('m_user/template')
@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>CRUD User</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('m_user.create') }}"> Input User</a>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-borderd">
        <tr>
            <th width="20px" class="text-center">User Id</th>
            <th width="150px" class="text-center">Level Id</th>
            <th width="200px" class="text-center">Username</th>
            <th width="200px" class="text-center">Nama</th>
            <th width="150px" class="text-center">Password</th>
        </tr>
        @foreach ($useri as $m_user)
            <tr>
                <td>{{ $m_user->user_id }}</td>
                <td>{{ $m_user->level_id }}</td>
                <td>{{ $m_user->username }}</td>
                <td>{{ $m_user->nama }}</td>
                <td>{{ $m_user->password }}</td>

                <td class="text-center">
                    <form action="{{ route('m_user.destroy', $m_user->user_id) }}" method="post">
                        <a class="btn btn-info btn-sm" href="{{ route('m_user.show', $m_user->user_id) }}">Show</a>
                        <a class="btn btn-primary btn-sm" href="{{ route('m_user.edit', $m_user->user_id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"
                            onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    <table class="table table-borderd">
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Nama</th>
            <th>Level</th>
        </tr>
        @foreach($useri as $user)
        <tr>
            <td>{{ $user->user_id }}</td>
            <td>{{ $user->username }}</td>
            <td>{{ $user->nama }}</td>
            <td>{{ $user->level_id }}</td> <!-- Menampilkan nama level -->
        </tr>
        @endforeach
    </table>
    
@endsection --}}
@extends('m_user/template')

@section('content')
<div class="container mt-5">
    <div class="row mb-4">
        <div class="col-lg-6">
            <h2 class="text-primary">Manajemen Pengguna</h2>
        </div>
        <div class="col-lg-6 text-end">
            <a class="btn btn-success" href="{{ route('m_user.create') }}">+ Tambah User</a>
        </div>
    </div>

    <!-- Notifikasi sukses -->
    @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ Session::get('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- Tabel User -->
    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Nama</th>
                        <th>Level</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($useri as $user)
                    <tr>
                        <td>{{ $user->user_id }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->nama }}</td>
                        <td>
                            <span class="badge bg-info">
                                {{ $user->level->level_nama ?? 'Tidak Diketahui' }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('m_user.show', $user->user_id) }}" class="btn btn-info btn-sm">Lihat</a>
                            <a href="{{ route('m_user.edit', $user->user_id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('m_user.destroy', $user->user_id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

