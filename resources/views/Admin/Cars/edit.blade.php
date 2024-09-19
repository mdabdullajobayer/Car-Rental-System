@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card shadow border-0 p-5">
                    <h1>Edit Car</h1>
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif


                    <form action="{{ route('cars.update', $car->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Car Name</label>
                            <input type="text" name="name" class="form-control" value="{{ $car->name }}" required>
                        </div>

                        <div class="form-group">
                            <label for="brand">Brand</label>
                            <input type="text" name="brand" class="form-control" value="{{ $car->brand }}" required>
                        </div>

                        <div class="form-group">
                            <label for="model">Model</label>
                            <input type="text" name="model" class="form-control" value="{{ $car->model }}">
                        </div>

                        <div class="form-group">
                            <label for="year">Year</label>
                            <input type="number" name="year" class="form-control" value="{{ $car->year }}" required>
                        </div>

                        <div class="form-group">
                            <label for="car_type">Car Type</label>
                            <input type="text" name="car_type" class="form-control" value="{{ $car->car_type }}"
                                required>
                        </div>

                        <div class="form-group">
                            <label for="daily_rent_price">Daily Rent Price</label>
                            <input type="number" name="daily_rent_price" value="{{ $car->daily_rent_price }}"
                                class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="availability">Availability</label>
                            <select name="availability" class="form-control">
                                <option value="1" {{ $car->availability ? 'selected' : '' }}>Available</option>
                                <option value="0" {{ $car->availability ? ' ' : 'selected' }}>Not Available</option>
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="image">Car Image</label>
                            <img src="{{ url($car->image) }}" height="80" class="p-2" />
                            <input type="file" name="image" value="{{ $car->image }}" class="form-control">
                            <input type="hidden" name="file_path" value="{{ $car->image }}" class="form-control">
                            <input type="hidden" name="id" value="{{ $car->id }}" class="form-control">
                        </div>

                        <button type="submit" class="btn btn-success">Update Car</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
