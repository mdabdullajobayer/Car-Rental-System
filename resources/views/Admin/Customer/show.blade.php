@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card shadow border-0 p-5">
                    <h1>Customer Details</h1>
                    <div class="form-group">
                        <h5><label for="name">Customer Name: </label> {{ $user->name }}</h5>
                        <h5><label for="name">Customer Email: </label> {{ $user->email }}</h5>
                    </div>
                    <h3 class="mt-5">Retals History</h3>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Car Name</th>
                                <th scope="col">Start Date</th>
                                <th scope="col">End Date</th>
                                <th scope="col">Total Cost</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($user->rentals as $r)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $r->car->name }}</td>
                                    <td>{{ $r->start_date }}</td>
                                    <td>{{ $r->end_date }}</td>
                                    <td> {{ $r->total_cost }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center"> No Hostory Found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
