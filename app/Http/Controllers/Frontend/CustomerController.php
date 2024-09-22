<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Rental;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function index()
    {
        $rentel = Rental::where('user_id', Auth::user()->id)->get();
        return view('Customer.Home', compact('rentel'));
    }
}
