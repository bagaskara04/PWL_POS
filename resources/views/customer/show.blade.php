@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Detail Pelanggan</h2>
    <div class="card">
        <div class="card-body">
            <p><strong>Nama:</strong> {{ $customer->nama }}</p>
            <p><strong>Email:</strong> {{ $customer->email }}</p>
            <p><strong>No HP:</strong> {{ $customer->no_hp }}</p>
            <p><strong>Alamat:</strong> {{ $customer->alamat }}</p>

            <a href="{{ route('reservations.index') }}" class="btn btn-secondary">Kembali</a>
            <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-primary">Edit</a>
        </div>
    </div>
</div>
@endsection
