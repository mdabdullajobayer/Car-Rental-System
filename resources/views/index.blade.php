@extends('layouts.app')
@section('content')
    <!-- Hero Section -->
    <div class="bg-light py-5 text-center">
        <div class="container">
            <h1 class="display-4">Find Your Perfect Car</h1>
            <p class="lead">Explore a wide range of cars at affordable prices.</p>
            <a href="{{ route('cars.index') }}" class="btn btn-primary btn-lg">Browse Cars</a>
        </div>
    </div>

    <!-- Featured Cars Section -->
    <div class="container mt-5">
        <h1>Available Cars</h1>

        <!-- Filter Form -->
        <form method="GET" action="{{ route('home') }}">
            <div class="row mb-3">
                <div class="col-md-3">
                    <label for="car_type">Car Type:</label>
                    <select name="car_type" id="car_type" class="form-control">
                        <option value="">All Types</option>
                        @foreach ($cartype as $car)
                            <option value="{{ $car->car_type }}"
                                {{ request('car_type') == $car->car_type ? 'selected' : '' }}>
                                {{ $car->car_type }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-3">
                    <label for="brand">Brand:</label>
                    <select name="brand" id="brand" class="form-control">
                        <option value="">All Types</option>
                        @foreach ($brands as $car)
                            <option value="{{ $car->brand }}" {{ request('brand') == $car->brand ? 'selected' : '' }}>
                                {{ $car->brand }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-3">
                    <label for="price">Daily Rent Price:</label>
                    <input type="number" name="price" id="price" class="form-control" value="{{ request('price') }}">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Filter</button>
                    <a href="{{ route('home') }}" class="btn btn-secondary">Reset</a>
                </div>
            </div>
        </form>

        <!-- Cars List -->
        <div class="row">
            @foreach ($cars as $car)
                <div class="col-md-4">
                    <div class="card mb-4">
                        <img src="{{ asset($car->image) }}" class="card-img-top" alt="{{ $car->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $car->name }} ({{ $car->year }})</h5>
                            <p class="card-text">
                                Brand: {{ $car->brand }}<br>
                                Type: {{ $car->car_type }}<br>
                                Daily Rent Price: Taka {{ $car->daily_rent_price }}<br>
                                Availability: {{ $car->availability ? 'Available' : 'Not Available' }}
                            </p>
                            @if ($car->availability)
                                <a href="{{ route('cars.view', $car->id) }}" class="btn btn-success w-100">Rent Now</a>
                            @else
                                <button class="btn btn-danger w-100" disabled>Not Available</button>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
