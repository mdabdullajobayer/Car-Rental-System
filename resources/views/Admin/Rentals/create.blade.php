@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow border-0 p-5">
                    <h3>Add New Rentals</h3>
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('rentals.store') }}">
                        @csrf
                        <div class="row mb-3">
                            <label for="car_id" class="col-md-4 col-form-label text-md-end">{{ __('Select Car') }}</label>
                            <div class="col-md-6">
                                <select id="car_id" class="form-control @error('car_id') is-invalid @enderror"
                                    name="car_id" required autocomplete="car" autofocus>
                                    <option value=" ">-- Select Car --</option>
                                    @foreach ($car as $c)
                                        <option value="{{ $c->id }}">{{ $c->name }}, Total Cost:
                                            {{ $c->daily_rent_price }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('car_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="user_id"
                                class="col-md-4 col-form-label text-md-end">{{ __('Select Customer') }}</label>
                            <div class="col-md-6">
                                <select id="user_id" class="form-control @error('user_id') is-invalid @enderror"
                                    name="user_id" required autocomplete="user_id" autofocus>
                                    <option value=" ">-- Select Car --</option>
                                    @foreach ($customer as $c)
                                        <option value="{{ $c->id }}">{{ $c->name }}</option>
                                    @endforeach
                                </select>
                                @error('user_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="status"
                                class="col-md-4 col-form-label text-md-end">{{ __('Select Status') }}</label>
                            <div class="col-md-6">
                                <select id="status" class="form-control @error('status') is-invalid @enderror"
                                    name="status" required autocomplete="status" autofocus>
                                    <option value=" ">-- Select Status --</option>
                                    <option value="Ongoing">Ongoing</option>
                                    <option value="Completed">Completed</option>
                                    <option value="Canceled">Canceled</option>
                                </select>
                                @error('status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="start_date"
                                class="col-md-4 col-form-label text-md-end">{{ __('Start Date') }}</label>
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
                            <label for="end_date"
                                class="col-md-4 col-form-label text-md-end">{{ __('Start Date') }}</label>
                            <div class="col-md-6">
                                <input type="date"id="end_date"
                                    class="form-control @error('end_date') is-invalid @enderror" name="end_date" required
                                    autocomplete="end_date" autofocus />
                                @error('end_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="total_cost"
                                class="col-md-4 col-form-label text-md-end">{{ __('Total Cost') }}</label>
                            <div class="col-md-6">
                                <input type="text" id="total_cost"
                                    class="form-control @error('total_cost') is-invalid @enderror" name="total_cost"
                                    required autocomplete="total_cost" autofocus />
                                @error('total_cost')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Create Rentals') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
