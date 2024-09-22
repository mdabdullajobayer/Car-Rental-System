@extends('layouts.app')

@section('content')
    <style>
        footer.bg-dark.text-light.py-4 {
            display: none;
        }
    </style>
    <div class="container mt-5 mb-5">
        <div class="card">
            <div class="row no-gutters">
                <div class="col-md-6">
                    <img src="{{ asset($cars->image) }}" class="card-img" alt="{{ $cars->name }}">
                </div>
                <div class="col-md-6">
                    <div class="card-body">
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

                        <h5 class="card-title">{{ $cars->name }}</h5>
                        <p class="card-text"><strong>Brand:</strong> {{ $cars->brand }}</p>
                        <p class="card-text"><strong>Model:</strong> {{ $cars->model }}</p>
                        <p class="card-text"><strong>Year:</strong> {{ $cars->year }}</p>
                        <p class="card-text"><strong>Availability:</strong>
                            {{ $cars->availability ? 'Available' : 'Not Available' }}</p>
                        <p class="card-text"><strong>Daily Rent Price:</strong> Taka {{ $cars->daily_rent_price }}</p>

                        <form method="POST" action="{{ route('customer.rentcar') }}">
                            @csrf
                            <div class="row mb-3">
                                <label for="start_date" class="col-md-4 col-form-label">{{ __('Start Date') }}</label>
                                <div class="col-md-6">
                                    <input type="date"id="start_date"
                                        class="form-control @error('start_date') is-invalid @enderror" name="start_date"
                                        required autocomplete="start_date" autofocus />
                                    @error('start_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="end_date" class="col-md-4 col-form-label">{{ __('End Date') }}</label>
                                <div class="col-md-6">
                                    <input type="date"id="end_date"
                                        class="form-control @error('end_date') is-invalid @enderror" name="end_date"
                                        required autocomplete="end_date" autofocus />

                                    <input type="hidden"name="car_id" value="{{ $cars->id }}" />
                                    @error('end_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            @if ($cars->availability)
                                <button type="submit" class="btn btn-success">Rent
                                    This Car</button>
                            @else
                                <button class="btn btn-secondary" disabled>Not Available</button>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
