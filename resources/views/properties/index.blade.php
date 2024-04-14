@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Properties</h2>

    {{-- Display success and error messages --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="row">
        @forelse ($properties as $property)
            <div class="col-md-4 mb-3">
                <div class="card h-100">
                    {{-- Use the accessor for the photo URL --}}
                    <img src="{{ $property->photo ? Storage::url($property->photo) : asset('images/placeholder-image.png') }}" class="card-img-top img-fluid" alt="{{ $property->title }}" style="object-fit: cover; height: 200px;">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $property->title }}</h5>
                        <p class="card-text"><strong>Location:</strong> {{ $property->location }}</p>
                        <p class="card-text"><strong>Price:</strong> ${{ number_format($property->price, 2) }}</p>
                        <p class="card-text"><strong>Rooms:</strong> {{ $property->no_of_rooms }}</p>
                        <p class="card-text"><strong>Baths:</strong> {{ $property->no_of_bathrooms }}</p>
                        <a href="{{ route('properties.show', $property->id) }}" class="btn btn-primary mt-auto">View Property</a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col">
                <p>No properties found.</p>
            </div>
        @endforelse
    </div>
</div>
@endsection
