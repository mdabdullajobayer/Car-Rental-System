<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Rental;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $totalCars = Car::count();
        $availableCars = Car::where('availability', 1)->count();
        $totalRentals = Rental::count();
        $totalEarnings = Rental::where('status', 'Completed')->sum('total_cost');
        return view('Admin.home', compact('totalCars', 'availableCars', 'totalRentals', 'totalEarnings'));
    }
}
