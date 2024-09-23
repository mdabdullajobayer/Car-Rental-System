<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(Request $request)
    {
        $cars = Car::query();

        if ($request->has('car_type') && $request->car_type != '') {
            $cars->where('car_type', $request->car_type);
        }

        if ($request->has('brand') && $request->brand != '') {
            $cars->where('brand', $request->brand);
        }

        if ($request->has('price') && $request->price != '') {
            $cars->where('daily_rent_price', '<=', $request->price);
        }
        $cars = $cars->limit(12)->get();
        $brands = Car::select('brand')->distinct()->get();
        $cartype = Car::select('car_type')->distinct()->get();
        return view('index', compact('cars', 'brands', 'cartype'));
    }
    
}
