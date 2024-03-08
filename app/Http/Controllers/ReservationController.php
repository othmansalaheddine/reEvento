<?php

namespace App\Http\Controllers;

use App\Models\Evenement;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Http\Requests\EventRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user ;
        //dd(Auth::user()->id);

        $reservations = Reservation::where('id_user', Auth::user()->id);
        
        return view('reservation.index', compact('reservations'));

    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
 
     public function store(Request $request)
{
    $rules = [
        'id_event' => 'required|exists:evenements,id',
    ];

    $validator = Validator::make($request->all(), $rules);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    $event = Evenement::find($request->id_event);

    if ($event->places_number > 0) {
        $reservation = new Reservation();
        $reservation->id_user = auth()->id();
        $reservation->id_event = $request->id_event;
        $reservation->status = 'valid';
        $reservation->save();
        $reservation->ticket_number = $reservation->id;
        $reservation->save();
        $reservations = Reservation::all(); 

        return view('reservation.index' , compact('reservations'))->with('success' , 'reservation hh');
    } else {
        return redirect()->route('reservation.index')->with('error', 'Désolé...');
    }

}
     
     
    /**
     * Display the specified resource.
     */
    public function show(Reservation $reservation)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reservation $reservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        //dd($reservation->delete());
        return back()->with('success', 'reservation cancled');
    }
}
