<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Rental;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RentalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function rentcar(Request $request)
    {
        try {
            $getdata = Car::where('id', $request->input('car_id'))->where('availability', 1)->first();
            $validated = $request->validate([
                'start_date' => 'required|date',
                'end_date' => 'required|date|after_or_equal:start_date',
            ]);
            $validated['user_id'] = Auth::id();
            $validated['car_id'] = $getdata->id;
            $validated['status'] = 'Pending';
            $validated['total_cost'] = $getdata->daily_rent_price;

            Rental::create($validated);
            // Car::where('id', $validated['car_id'])->update(['availability' => 0]);
            return redirect()->back()->with('success', 'Rentals Create successfully!');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function cancelRent(Request $request, Rental $rent)
    {
        try {
            Car::where('id', $request->id)->update(['availability' => 1]);
            $rent->update(['status' => 'canceled']);
            return redirect()->back()->with('success', 'Rentals Updated successfully!');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
