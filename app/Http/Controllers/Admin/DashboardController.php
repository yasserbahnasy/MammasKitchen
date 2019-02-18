<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Item;
use App\Slider;
use App\Reservation;
use App\Contact;

class DashboardController extends Controller
{
    public function index()
    {
      $categoryCount = Category::count();
      $itemCount = Item::count();
      $sliderCount = Slider::count();
      $contactCount = Contact::count();
      $reservations = Reservation::where('stutus',false)->get();

      return view('admin.dashboard',compact('categoryCount','itemCount','sliderCount','reservations','contactCount'));
    }
}
