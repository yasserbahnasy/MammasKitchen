<?php

namespace App\Http\Controllers\Admin;

use App\Notifications\ReservationConfirmed;
use App\Reservation;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Notification;

class ReservationController extends Controller
{
  public function index()
  {
    $reservations = Reservation::all();
    return view('admin.reservation.index',compact('reservations'));
  }

  public function stutus($id)
  {
    $reservation = Reservation::find($id);
    $reservation->stutus = true;
    $reservation->save();

      /* Notification::route('mail',$reservation->email )
        ->route('nexmo','5555555555')
        ->notify(new ReservationConfirmed());
      */
    Toastr::success('Reservation successfully confirmed','Success',["positionClass" => "toast-top-right"]);
    return redirect()->back();
  }

  public function destroy($id)
  {
    $reservation = Reservation::find($id)->delete();
    Toastr::success('Reservation successfully Deleted','Success',["positionClass" => "toast-top-right"]);
    return redirect()->back();
  }

}
