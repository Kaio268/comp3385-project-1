@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card mb-4">
        <div class="row g-0">
            <div class="col-md-6">
                {{-- Image --}}
                <img src="{{ $property->photo ? Storage::url($property->photo) : asset('images/placeholder.png') }}" class="img-fluid rounded-start" alt="{{ $property->title }}" style="object-fit: cover; height: 300px; width: 100%;">
            </div>
            <div class="col-md-6">
                <div class="card-body">
                    {{-- Title and Price --}}
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h3 class="card-title">{{ $property->title }}</h3>
                        <span class="badge bg-primary rounded-pill">{{ $property->type }}</span>
                        <h4 class="text-success"><strong>${{ number_format($property->price, 2) }}</strong></h4>
                    </div>
                    
                    {{-- Description --}}
                    <p class="card-text">{{ $property->description }}</p>
                    
                    {{-- Property Details --}}
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><i class="bi bi-house-door-fill"></i> {{ $property->no_of_rooms }} Bedrooms</li>
                        <li class="list-group-item"><i class="bi bi-droplet-fill"></i> {{ $property->no_of_bathrooms }} Bathrooms</li>
                        <li class="list-group-item"><i class="bi bi-geo-alt-fill"></i> {{ $property->location }}</li>
                    </ul>
                    
                    {{-- Realtor Email --}}
                    <div class="card-body">
                        <a href="mailto:realtor@example.com" class="card-link btn btn-primary">Email Realtor</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
