@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card shadow border-0 p-5">
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

                    <div class="d-flex justify-content-between">
                        <h2>Cars List</h2>
                        <div>
                            <a href="{{ route('cars.create') }}" class="btn btn-success">Create Cars</a>
                        </div>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Car Name</th>
                                <th scope="col">Brand</th>
                                <th scope="col">Model</th>
                                <th scope="col">Year of Manufacture</th>
                                <th scope="col">Car Type</th>
                                <th scope="col">Daily Rent Price</th>
                                <th scope="col">Availability Status</th>
                                <th scope="col">Car Image</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($cars as $item)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->brand }}</td>
                                    <td>{{ $item->model }}</td>
                                    <td>{{ $item->year }}</td>
                                    <td>{{ $item->car_type }}</td>
                                    <td>{{ $item->daily_rent_price }}</td>
                                    <td>{{ $item->availability ? 'Available' : 'Not Available' }}</td>
                                    <td><img height="60" src="{{ url($item->image) }}" /></td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <div>
                                                <a href="{{ route('cars.show', $item->id) }}"
                                                    class="btn btn-info">Details</a>
                                            </div>
                                            <div>
                                                <a href="{{ route('cars.edit', $item->id) }}" class="btn btn-info">Edit</a>
                                            </div>
                                            <form action="{{ route('cars.destroy', $item->id) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn btn-danger">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
