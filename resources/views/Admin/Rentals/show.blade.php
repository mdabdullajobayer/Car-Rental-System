@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card shadow border-0 p-5">
                    <h1>Rental Details</h1>
                    <div class="form-group">
                        <h5><label for="name">Start Date: </label> {{ $rental->start_date }}</h5>
                        <h5><label for="name">End Date: </label> {{ $rental->end_date }}</h5>
                        <h5><strong><label for="name">Card Details: </label></strong><br>
                            Car Name: {{ $rental->car->name }}<br>
                            Car Name: {{ $rental->car->brand }}<br>
                            Total Cost: {{ $rental->car->total_cost }}<br>
                        </h5>
                        <h5><label for="name">Customer Details: </label> {{ $rental->user->name }}</h5>
                        <h5><label for="name">Status: </label> {{ $rental->status }}</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
