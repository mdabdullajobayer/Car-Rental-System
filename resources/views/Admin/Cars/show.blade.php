@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card shadow border-0 p-5">
                    <h1>Car Details</h1>
                    <div class="form-group">
                        <h5><label for="name">Car Name: </label> {{ $car->name }}</h5>
                    </div>

                    <div class="form-group">
                        <h5><label for="name">Brand: </label> {{ $car->brand }}</h5>
                    </div>

                    <div class="form-group">
                        <h5><label for="name">Model: </label> {{ $car->model }}</h5>
                    </div>

                    <div class="form-group">
                        <h5><label for="name">Year: </label> {{ $car->year }}</h5>
                    </div>

                    <div class="form-group">
                        <h5><label for="name">Car Type: </label> {{ $car->car_type }}</h5>
                    </div>

                    <div class="form-group">
                        <h5><label for="name">Daily Rent Price: </label> {{ $car->daily_rent_price }}</h5>
                    </div>

                    <div class="form-group">
                        <h5><label for="name">Availability: </label>
                            {{ $car->availability ? 'Available' : 'Not Available' }}</h5>
                    </div>

                    <div class="form-group mb-3">
                        <label for="image">Car Image</label>
                        <img src="{{ url($car->image) }}" height="80" class="p-2" />
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
