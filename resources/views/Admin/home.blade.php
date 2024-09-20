@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-3">
                        <div class="card shadow">
                            <div class="card-body">
                                <h5 class="card-title">Total Cars</h5>
                                <p class="card-text">{{ $totalCars }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card shadow">
                            <div class="card-body">
                                <h5 class="card-title">Available Cars</h5>
                                <p class="card-text">{{ $availableCars }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card shadow">
                            <div class="card-body">
                                <h5 class="card-title">Total Rentals</h5>
                                <p class="card-text">{{ $totalRentals }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card shadow">
                            <div class="card-body">
                                <h5 class="card-title">Total Earnings</h5>
                                <p class="card-text">Taka: {{ number_format($totalEarnings, 2) }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
