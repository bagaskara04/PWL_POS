@extends('layouts.app')

@section('subtitle', 'Kategori')
@section('content_header_title', 'Kategori')
@section('content_header_subtitle', 'Create')

@section('content')
    <div class="container">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Buat kategori baru</h3>
            </div>

            <form action="../kategori" method="post">
                <div class="card-body">
                    {{-- Kode Kategori --}}
                    <div class="form-group">
                        <label for="kategori_kode">Kode Kategori</label>
                        <input type="text" class="form-control @error('kategori_kode') is-invalid @enderror"
                            id="kategori_kode" name="kategori_kode" placeholder="Kode Kategori"> {{-- Menyimpan input sebelumnya --}}

                        @error('kategori_kode')
                            <div class="alert alert-danger">{{ $message }}</div> {{-- Typo diperbaiki --}}
                        @enderror
                    </div>

                    {{-- Nama Kategori --}}
                    <div class="form-group">
                        <label for="kategori_nama">Nama Kategori</label>
                        <input type="text" class="form-control" id="kategori_nama" name="kategori_nama"
                            placeholder="Nama Kategori">
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection
