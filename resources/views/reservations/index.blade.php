@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Data Reservasi</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pelanggan</th>
                <th>Nomor Kamar</th>
                <th>Tanggal Check-in</th>
                <th>Tanggal Check-out</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reservations as $index => $reservation)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>
                    <a href="{{ route('customers.show', $reservation->customer->id) }}">
                        {{ $reservation->customer->nama }}
                    </a>
                </td>
                <td>{{ $reservation->nomor_kamar }}</td>
                <td>{{ $reservation->check_in }}</td>
                <td>{{ $reservation->check_out }}</td>
                <td>
                    <a href="{{ route('reservations.edit', $reservation->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('reservations.destroy', $reservation->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus data ini?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
