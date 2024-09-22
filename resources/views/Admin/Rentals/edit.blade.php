@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow border-0 p-5">
                    <h3>Edit Rentals</h3>
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('rentals.update', $rental->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="row mb-3">
                            <label for="car_id" class="col-md-4 col-form-label text-md-end">{{ __('Select Car') }}</label>
                            <div class="col-md-6">
                                <select id="car_id" class="form-control @error('car_id') is-invalid @enderror"
                                    name="car_id" required autofocus>
                                    <option value="">-- Select Car --</option>
                                    @foreach ($car as $c)
                                        <option value="{{ $c->id }}"
                                            {{ old('car_id', $rental->car_id) == $c->id ? 'selected' : '' }}>
                                            {{ $c->name }}, Total Cost: {{ $c->daily_rent_price }}
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
                                    name="user_id" required>
                                    <option value="">-- Select Customer --</option>
                                    @foreach ($customer as $c)
                                        <option value="{{ $c->id }}"
                                            {{ old('user_id', $rental->user_id) == $c->id ? 'selected' : '' }}>
                                            {{ $c->name }}
                                        </option>
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
                                    name="status" required>
                                    <option value="">-- Select Status --</option>
                                    <option value="Pending"
                                        {{ old('status', $rental->status) == 'Pending' ? 'selected' : '' }}>Pending
                                    </option>
                                    <option value="Ongoing"
                                        {{ old('status', $rental->status) == 'Ongoing' ? 'selected' : '' }}>Ongoing
                                    </option>
                                    <option value="Completed"
                                        {{ old('status', $rental->status) == 'Completed' ? 'selected' : '' }}>Completed
                                    </option>
                                    <option value="Canceled"
                                        {{ old('status', $rental->status) == 'Canceled' ? 'selected' : '' }}>Canceled
                                    </option>
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
                                <input type="date" id="start_date"
                                    class="form-control @error('start_date') is-invalid @enderror" name="start_date"
                                    value="{{ old('start_date', $rental->start_date) }}" required />
                                @error('start_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="end_date" class="col-md-4 col-form-label text-md-end">{{ __('End Date') }}</label>
                            <div class="col-md-6">
                                <input type="date" id="end_date"
                                    class="form-control @error('end_date') is-invalid @enderror" name="end_date"
                                    value="{{ old('end_date', $rental->end_date) }}" required />
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
                                    value="{{ old('total_cost', $rental->total_cost) }}" required />
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
                                    {{ __('Update Rentals') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
