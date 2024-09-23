<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    public function index()
    {
        $customer = User::where('role', 'customer')->get();
        return view('Admin.Customer.index', compact('customer'));
    }

    public function create()
    {
        return view('Admin.Customer.create');
    }

    public function edit(User $customer)
    {
        return view('Admin.Customer.edit', compact('customer'));
    }

    public function show(Request $request, $id)
    {
        $user = User::where('id', $id)->with('rentals')->first();
        return view('Admin.Customer.show', compact('user'));
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone_number' => 'required',
            'address' => 'required',
            'password' => 'required|min:8|confirmed',
        ]);
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone_number' => $validated['phone_number'],
            'address' => $validated['address'],
            'password' => Hash::make($validated['password']),
        ]);
        return redirect()->back()->with('success', 'Customer registered successfully!');
    }
    public function update(Request $request, User $customer)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone_number' => 'required',
            'address' => 'required',
            'password' => 'required|min:8|confirmed',
        ]);

        $customer->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone_number' => $validated['phone_number'],
            'address' => $validated['address'],
            'password' => Hash::make($validated['password']),
        ]);
        return redirect()->back()->with('success', 'Customer Updated successfully!');
    }

    public function destroy(User $customer)
    {
        $customer->delete();
        return redirect()->back()->with('success', 'Customer Delete successfully');
    }
}
