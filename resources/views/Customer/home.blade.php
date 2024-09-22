@extends('layouts.app')

@section('content')
    <style>
        footer.bg-dark.text-light.py-4 {
            display: none;
        }
    </style>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <h2>Rentals List</h2>
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
                            @forelse ($rentel as $item)
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
                                            <form action="{{ route('customer.cancelRent', $item->id) }}" method="POST">
                                                @method('POST')
                                                @csrf
                                                @if ($item->status == 'Ongoing' || $item->status == 'Completed' || $item->status == 'Canceled')
                                                    <p>Can't Action</p>
                                                @else
                                                    <input type="hidden" name="id" value="{{ $item->id }}" />
                                                    <button class="btn btn-danger">Cancel</button>
                                                @endif
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">No Rent Found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
