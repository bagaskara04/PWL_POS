<?php namespace App\Http\Controllers;

use App\Models\Reservasi;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservasi::with('customer')->get(); // pastikan relasi 'customer' ada
        return view('reservations.index', compact('reservations'));
    }

    public function edit($id)
    {
        $reservation = Reservasi::findOrFail($id);
        return view('reservations.edit', compact('reservation'));
    }

    public function update(Request $request, $id)
    {
        $reservation = Reservasi::findOrFail($id);    
        $reservation->update($request->all());
        return redirect()->route('reservations.index')->with('success', 'Data reservasi berhasil diubah.');
    }

    public function destroy($id)
    {
        $reservation = Reservasi::findOrFail($id);
        $reservation->delete();
        return redirect()->route('reservations.index')->with('success', 'Data reservasi berhasil dihapus.');
    }
}
