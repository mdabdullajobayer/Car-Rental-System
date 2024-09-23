@extends('layouts.app')
@section('content')
    <!-- Featured Cars Section -->
    <div class="container mt-5">
        <h1>{{ $data->title }}</h1>
        <p>
            {{ $data->description }}
        </p>
    </div>
@endsection
