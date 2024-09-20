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
        $car = Car::where('availability', 1)->get();
        $customer = User::where('role', 'customer')->get();
        return view('Admin.Rentals.create', compact('car', 'customer'));
    }

    public function edit(Rental $rental)
    {
        // $car = Car::where('availability', 1)->get();
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
        try {
            $validated = $request->validate([
                'user_id' => 'required',
                'car_id' => 'required',
                'start_date' => 'required',
                'end_date' => 'required',
                'status' => 'required',
                'total_cost' => 'required',
            ]);
            Rental::create($validated);
            Car::where('id', $validated['car_id'])->update(['availability' => 0]);
            return redirect()->back()->with('success', 'Rentals Create successfully!');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function update(Request $request, Rental $rental)
    {
        try {
            $validated = $request->validate([
                'user_id' => 'required',
                'car_id' => 'required',
                'start_date' => 'required',
                'end_date' => 'required',
                'status' => 'required',
                'total_cost' => 'required',
            ]);
            if (strtolower($validated['status']) === 'completed' || strtolower($validated['status']) === 'canceled') {
                Car::where('id', $validated['car_id'])->update(['availability' => 1]);
            }
            $rental->update($validated);
            return to_route('rentals.index')->with('success', 'Rentals Updated successfully!');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function destroy(Rental $rental)
    {
        $rental->delete();
        return redirect()->back()->with('success', 'Rentals Delete successfully');
    }
}
