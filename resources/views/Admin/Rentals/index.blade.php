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
                        <h2>Rentals List</h2>
                        <div>
                            <a href="{{ route('rentals.create') }}" class="btn btn-success">Create Rentals</a>
                        </div>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Customer Name</th>
                                <th scope="col">Car Details</th>
                                <th scope="col">Rental Start Date and End Date</th>
                                <th scope="col">Total Cost</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($Rentals as $item)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $item->user->name }}</td>
                                    <td>
                                        Name: {{ $item->car->name }}
                                        Brand: {{ $item->car->brand }}
                                    </td>
                                    <td>{{ $item->start_date }} - {{ $item->end_date }}</td>
                                    <td>{{ $item->total_cost }}</td>
                                    <td>
                                        @if ($item->status == 'Ongoing')
                                            <span class="bg-warning p-1 rounded">Ongoing</span>
                                        @elseif($item->status == 'Completed')
                                            <span class="bg-success p-1 rounded">Completed</span>
                                        @elseif($item->status == 'Canceled')
                                            <span class="bg-danger p-1 rounded">Canceled</span>
                                        @else
                                            <span class="bg-secondary p-1 rounded">{{ $item->status }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <div>
                                                <a href="{{ route('rentals.show', $item->id) }}"
                                                    class="btn btn-info">Details</a>
                                            </div>
                                            <div>
                                                <a href="{{ route('rentals.edit', $item->id) }}"
                                                    class="btn btn-info">Edit</a>
                                            </div>
                                            <form action="{{ route('rentals.destroy', $item->id) }}" method="POST">
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
