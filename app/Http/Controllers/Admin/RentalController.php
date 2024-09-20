<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Rental;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RentalController extends Controller
{
    public function index()
    {
        $Rentals = Rental::with('user', 'car')->get();
        return view('Admin.Rentals.index', compact('Rentals'));
    }

    public function create()
    {
        $car = Car::all();
        $customer = User::where('role', 'customer')->get();
        return view('Admin.Rentals.create', compact('car', 'customer'));
    }

    public function edit(Rental $rental)
    {
        $car = Car::all();
        $customer = User::where('role', 'customer')->get();
        return view('Admin.Rentals.edit', compact('rental', 'car', 'customer'));
    }

    public function show(Request $request, Rental $rental)
    {
        return view('Admin.Rentals.show', compact('rental'));
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required',
            'car_id' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'status' => 'required',
            'total_cost' => 'required',
        ]);
        $user = Rental::create($validated);
        return redirect()->back()->with('success', 'Rentals Create successfully!');
    }
    public function update(Request $request, Rental $rental)
    {
        $validated = $request->validate([
            'user_id' => 'required',
            'car_id' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'status' => 'required',
            'total_cost' => 'required',
        ]);
        $rental->update($validated);
        return to_route('rentals.index')->with('success', 'Rentals Updated successfully!');
    }

    public function destroy(Rental $rental)
    {
        $rental->delete();
        return redirect()->back()->with('success', 'Rentals Delete successfully');
    }
}
