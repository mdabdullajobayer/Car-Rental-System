<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::all();
        return view('Admin.Cars.index', compact('cars'));
    }

    public function create()
    {
        return view('Admin.Cars.create');
    }

    public function edit(Car $car)
    {
        return view('Admin.Cars.edit', compact('car'));
    }

    public function show(Car $car)
    {
        return view('Admin.Cars.show', compact('car'));
    }


    public function  store(Request $request)
    {
        try {
            $image = $request->file('image');
            $time = time();
            $fileName = $image->getClientOriginalName();
            $imageName = "{$time}-{$fileName}";
            $imageURL = 'uploads/' . $imageName;
            $image->move(public_path('uploads'), $imageName);
            $data = Car::create([
                "name" => $request->input('name'),
                "brand" => $request->input('brand'),
                "model" => $request->input('model'),
                "year" => $request->input('year'),
                "car_type" => $request->input('car_type'),
                "daily_rent_price" => $request->input('daily_rent_price'),
                "availability" => $request->input('availability'),
                'image' => $imageURL
            ]);
            if ($data) {
                return redirect()->back()->with('success', 'Car Successfully Created');
            } else {
                return redirect()->back()->with('error', 'Car Create Faild');
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public function update(Request $request)
    {
        try {
            if ($request->hasFile('image')) {

                $image = $request->file('image');
                $time = time();
                $fileName = $image->getClientOriginalName();
                $imageName = "{$time}-{$fileName}";
                $imageURL = 'uploads/' . $imageName;
                $image->move(public_path('uploads'), $imageName);
                $old_imaeg = $request->input('file_path');
                File::delete($old_imaeg);
                $data = Car::where('id', $request->id)->update([
                    "name" => $request->input('name'),
                    "brand" => $request->input('brand'),
                    "model" => $request->input('model'),
                    "year" => $request->input('year'),
                    "car_type" => $request->input('car_type'),
                    "daily_rent_price" => $request->input('daily_rent_price'),
                    "availability" => $request->input('availability'),
                    'image' => $imageURL
                ]);

                if ($data) {
                    return redirect()->back()->with('success', 'Car Successfully Updated');
                } else {
                    return redirect()->back()->with('error', 'Car Updated Faild');
                }
            } else {
                $data = Car::where('id', $request->id)->update([
                    "name" => $request->input('name'),
                    "brand" => $request->input('brand'),
                    "model" => $request->input('model'),
                    "year" => $request->input('year'),
                    "car_type" => $request->input('car_type'),
                    "daily_rent_price" => $request->input('daily_rent_price'),
                    "availability" => $request->input('availability'),
                ]);

                if ($data) {
                    return redirect()->back()->with('success', 'Car Successfully Updated');
                } else {
                    return redirect()->back()->with('error', 'Car Updated Faild');
                }
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function destroy(Request $request, Car $car)
    {
        try {
            $data = $car->delete();
            File::delete($car->image);
            if ($data) {
                return redirect()->back()->with('success', 'Car Delete Success');
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
